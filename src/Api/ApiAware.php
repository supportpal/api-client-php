<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Converter\ModelToArrayConverter;
use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

/**
 * Contains all required method definitions and attribute dependencies in Api traits
 * Trait ApiAware
 * @package SupportPal\ApiClient\Api
 */
trait ApiAware
{
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
     * @return ModelToArrayConverter
     */
    abstract protected function getModelToArrayConverter(): ModelToArrayConverter;

    /**
     * @param ResponseInterface $response
     * @return array<mixed>
     */
    abstract protected function decodeBody(ResponseInterface $response): array;

    /**
     * @return CollectionFactory
     */
    abstract protected function getCollectionFactory(): CollectionFactory;
}
