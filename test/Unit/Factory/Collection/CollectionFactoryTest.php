<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\SelfService;

use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Tests\CollectionFactoryTestCase;

class CollectionFactoryTest extends CollectionFactoryTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->collectionFactory = new CollectionFactory;
    }
}
