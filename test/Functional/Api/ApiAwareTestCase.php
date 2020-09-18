<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional\Api;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\SupportPal;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

trait ApiAwareTestCase
{
    /**
     * @param Response $response
     */
    abstract protected function prepareUnsuccessfulApiRequest(Response $response): void;

    /**
     * @param Response $response
     */
    abstract protected function appendRequestResponse(Response $response): void;

    /**
     * @return SupportPal
     */
    abstract protected function getSupportPal(): SupportPal;

    /**
     * @return DecoderInterface
     */
    abstract protected function getDecoder(): DecoderInterface;

    /**
     * @return EncoderInterface
     */
    abstract protected function getEncoder(): EncoderInterface;

    /**
     * @return string
     */
    abstract protected function getFormatType(): string;
}
