<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Api\TicketApi;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Model\Ticket\TicketCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class CustomFieldApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\CustomFieldApis
 * @covers \SupportPal\ApiClient\Api
 */
class CustomFieldApisTest extends ApiTest
{
    /** @var TicketApi */
    protected $api;

    /** @var int */
    private $testId = 1;

    public function testGetCustomFields(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new TicketCustomFieldData)->getAllResponse(),
            TicketCustomField::class
        );

        $this
            ->apiClient
            ->getCustomFields([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $customFields = $this->api->getCustomFields([]);
        self::assertSame($expectedOutput, $customFields);
    }

    public function testGetTicketCustomField(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            (new TicketCustomFieldData)->getResponse(),
            TicketCustomField::class
        );

        $this
            ->apiClient
            ->getCustomField($this->testId)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketCustomFields = $this->api->getCustomField($this->testId);
        self::assertSame($expectedOutput, $ticketCustomFields);
    }

    /**
     * @inheritDoc
     */
    protected function getApiName(): string
    {
        return TicketApi::class;
    }

    /**
     * @inheritDoc
     */
    protected function getApiClientName(): string
    {
        return TicketApiClient::class;
    }
}
