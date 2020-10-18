<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Shared;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Shared\Option;
use SupportPal\ApiClient\Tests\DataFixtures\Shared\OptionData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class OptionTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Shared
 * @covers \SupportPal\ApiClient\Model\Shared\Option
 */
class OptionTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return (new OptionData)->getDataWithObjects();
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Option;
    }
}
