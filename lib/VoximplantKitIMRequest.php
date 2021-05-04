<?php

namespace VoximplantKitIM;

/**
 * Class VoximplantKitRequest
 * @package Smartcalls\client
 */
class VoximplantKitIMRequest extends \GuzzleHttp\Psr7\Request
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