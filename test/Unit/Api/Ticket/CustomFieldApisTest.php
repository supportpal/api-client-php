<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Unit\Api\Ticket;

use SupportPal\ApiClient\Model\Ticket\CustomField;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\CustomFieldData;
use SupportPal\ApiClient\Tests\Unit\ApiTest;

/**
 * Class CustomFieldApisTest
 * @package SupportPal\ApiClient\Tests\Unit\Api\Ticket
 * @covers \SupportPal\ApiClient\Api\Ticket\CustomFieldApis
 * @covers \SupportPal\ApiClient\Api
 */
class CustomFieldApisTest extends ApiTest
{
    public function testGetCustomField(): void
    {
        [$expectedOutput, $response] = $this->makeCommonExpectations(
            CustomFieldData::GET_CUSTOMFIELDS_SUCCESSFUL_RESPONSE_DATA,
            CustomField::class
        );

        $this
            ->apiClient
            ->getTicketCustomFields([])
            ->shouldBeCalled()
            ->willReturn($response->reveal());

        $customFields = $this->api->getTicketCustomFields([]);
        self::assertSame($expectedOutput, $customFields);
    }
}
