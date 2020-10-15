<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Integration\Factory\Collection;

use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Tests\CollectionFactoryTestCase;

class CollectionFactoryTest extends CollectionFactoryTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        /** @var CollectionFactory $collectionFactory */
        $collectionFactory = $this->getContainer()->get(CollectionFactory::class);
        $this->collectionFactory = $collectionFactory;
    }
}
