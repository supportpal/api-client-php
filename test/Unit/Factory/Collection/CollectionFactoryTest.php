<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Factory\Collection;

use SupportPal\ApiClient\Factory\Collection\CollectionFactory;
use SupportPal\ApiClient\Tests\CollectionFactoryTestCase;

/**
 * Class CollectionFactoryTest
 * @package SupportPal\ApiClient\Tests\Unit\Factory\Collection
 * @covers \SupportPal\ApiClient\Factory\Collection\CollectionFactory
 */
class CollectionFactoryTest extends CollectionFactoryTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->collectionFactory = new CollectionFactory;
    }
}
