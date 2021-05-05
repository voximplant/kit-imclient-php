<?php

namespace VoximplantKit;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use http\Exception\InvalidArgumentException;
use GuzzleHttp\Client;

class VoximplantKitClient
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var Resources\AccountApi
     */
    private $account;

    /**
     * @var Resources\CallsApi
     */
    private $calls;

    /**
     * @var Resources\CampaignsApi
     */
    private $campaigns;

    /**
     * @var Resources\HelperApi
     */
    private $helper;

    /**
     * @var Resources\NumbersApi
     */
    private $numbers;

    /**
     * @var Resources\AccountApi
     */
    private $scenarios;

    /**
     * @var Resources\HistoryApi
     */
    private $history;

    /**
     * @var Resources\ReportApi
     */
    private $report;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        Configuration $config = null,
        ClientInterface $client = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->account = new Resources\AccountApi($this);
        $this->campaigns = new Resources\CampaignsApi($this);
        $this->calls = new Resources\CallsApi($this);
        $this->helper = new Resources\HelperApi($this);
        $this->numbers = new Resources\NumbersApi($this);
        $this->scenarios = new Resources\ScenariosApi($this);
        $this->history = new Resources\HistoryApi($this);
        $this->report = new Resources\ReportApi($this);
    }


    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return HeaderSelector
     */
    public function getHeaderSelector(): HeaderSelector
    {
        return $this->headerSelector;
    }

    /**
     * @param VoximplantKitRequest $request
     * @return array
     * @throws ApiException
     */
    public function sync(VoximplantKitRequest $request)
    {
        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($request->getResponseType() === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($request->getResponseType(), ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $request->getResponseType(), []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        $request->getResponseType(),
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 0:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\VoximplantKit\Model\ErrorType',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }


    /**
     * @param VoximplantKitRequest $request
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function async(VoximplantKitRequest $request)
    {
        $returnType = $request->getResponseType();
        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    public function __get($name)
    {
        if (method_exists($this, $name)) {
            return $this->$name();
        }

        if (property_exists(get_class($this), $name)) {
            return $this->$name;
        }

        $apiName = str_replace('api', '', mb_strtolower($name));
        if (property_exists(get_class($this), $apiName)) {
            return $this->$apiName;
        }

        throw new InvalidArgumentException('Undefined property in object');
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}