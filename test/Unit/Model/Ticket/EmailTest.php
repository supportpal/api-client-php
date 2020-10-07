<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Model\Ticket;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\Ticket\Email;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\EmailData;
use SupportPal\ApiClient\Tests\Unit\Model\BaseModelTestCase;

/**
 * Class EmailTest
 * @package SupportPal\ApiClient\Tests\Unit\Model\Ticket
 * @covers \SupportPal\ApiClient\Model\Ticket\Email
 */
class EmailTest extends BaseModelTestCase
{
    /**
     * @inheritDoc
     */
    protected function getModelData(): array
    {
        return EmailData::EMAIL_DATA;
    }

    /**
     * @inheritDoc
     */
    protected function getModel(): Model
    {
        return new Email;
    }
}
