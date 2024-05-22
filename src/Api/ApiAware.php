<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;

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
     * @return CollectionFactory
     */
    abstract protected function getCollectionFactory(): CollectionFactory;
}
