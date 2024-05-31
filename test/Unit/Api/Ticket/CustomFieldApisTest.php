<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\TicketCustomField;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;

class CustomFieldApisTest extends BaseTicketApiTest
{
    /** @var int */
    private $testId = 1;

    public function testGetCustomFields(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new TicketCustomFieldData)->getAllResponse(),
            TicketCustomField::class
        );

        $this->apiClient
            ->getCustomFields([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $customFields = $this->api->getCustomFields([]);
        self::assertEquals($output, $customFields);
    }

    public function testGetCustomField(): void
    {
        [$output, $response] = $this->makeCommonExpectations(
            (new TicketCustomFieldData)->getResponse(),
            TicketCustomField::class
        );

        $this->apiClient
            ->getCustomField($this->testId)
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $ticketCustomFields = $this->api->getCustomField($this->testId);
        self::assertEquals($output, $ticketCustomFields);
    }
}
