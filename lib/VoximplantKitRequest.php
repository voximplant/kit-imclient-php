<?php

namespace VoximplantKit;

/**
 * Class VoximplantKitRequest
 * @package Smartcalls\client
 */
class VoximplantKitRequest extends \GuzzleHttp\Psr7\Request
{
    /**
     * @var string
     */
    public $responseType;

    /**
     * @param string $responseType
     */
    public function setResponseType($responseType): void
    {
        $this->responseType = $responseType;
    }

    /**
     * @return string
     */
    public function getResponseType(): string
    {
        return $this->responseType;
    }
}