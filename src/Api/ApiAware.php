<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Contains all required method definitions and attribute dependencies in Api traits
 * Trait ApiAware
 * @package SupportPal\ApiClient\Api
 */
trait ApiAware
{
    /**
     * @return ApiClient
     */
    abstract protected function getApiClient(): ApiClient;

    /**
     * @return ModelCollectionFactory
     */
    abstract protected function getModelCollectionFactory(): ModelCollectionFactory;

    /**
     * @return DecoderInterface
     */
    abstract protected function getDecoder(): DecoderInterface;

    /**
     * @return string
     */
    abstract protected function getFormatType(): string;

    /**
     * @return SerializerInterface
     */
    abstract protected function getSerializer(): SerializerInterface;

    /**
     * @param ResponseInterface $response
     * @return array<mixed>
     */
    abstract protected function decodeBody(ResponseInterface $response): array;
}
