<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\ApiClient\User;

use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\DataFixtures\User\OrganisationData;
use SupportPal\ApiClient\Tests\Unit\ApiClientTest;

use function json_encode;

class OrganisationApisTest extends ApiClientTest
{
    /** @var UserClient */
    protected $apiClient;

    /** @var int */
    private $testOrganisationId = 1;

    public function testGetOrganisations(): void
    {
        $queryParams = ['test' => 'value'];
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_ORGANISATION, $queryParams, []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new OrganisationData)->getAllResponse()),
            $request
        );
        $getOrganisationsResponse = $this->apiClient->getOrganisations($queryParams);
        self::assertSame($response->reveal(), $getOrganisationsResponse);
    }

    public function testHttpExceptionGetOrganisations(): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_ORGANISATION, $queryParams, []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getOrganisations($queryParams);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetOrganisations(int $statusCode, string $responseBody): void
    {
        $queryParams = ['test' => 'value'];
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('GET', ApiDictionary::USER_ORGANISATION, $queryParams, []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getOrganisations($queryParams);
    }

    public function testGetOrganisation(): void
    {
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_ORGANISATION . '/' . $this->testOrganisationId,
            [],
            []
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode((new OrganisationData)->getResponse()),
            $request
        );

        $getOrganisationTypeSuccessfulResponse = $this->apiClient->getOrganisation($this->testOrganisationId);
        self::assertSame($response->reveal(), $getOrganisationTypeSuccessfulResponse);
    }

    public function testHttpExceptionGetOrganisation(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_ORGANISATION . '/' . $this->testOrganisationId,
            [],
            []
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->getOrganisation($this->testOrganisationId);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulGetOrganisation(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'GET',
            ApiDictionary::USER_ORGANISATION . '/' . $this->testOrganisationId,
            [],
            []
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->getOrganisation($this->testOrganisationId);
    }

    public function testPostOrganisation(): void
    {
        $ticketData = new OrganisationData;
        $request = $this->requestCommonExpectations('POST', ApiDictionary::USER_ORGANISATION, [], []);
        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($ticketData->getResponse()),
            $request
        );

        $postOrganisationResponse = $this->apiClient->postOrganisation([]);
        self::assertSame($response->reveal(), $postOrganisationResponse);
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testPostUnsuccessfulOrganisation(int $statusCode, string $responseBody): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::USER_ORGANISATION, [], []);
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->postOrganisation([]);
    }

    public function testHttpExceptionPostOrganisation(): void
    {
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations('POST', ApiDictionary::USER_ORGANISATION, [], []);
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->postOrganisation([]);
    }

    public function testUpdateOrganisation(): void
    {
        $userData = new OrganisationData;
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::USER_ORGANISATION . '/' . $this->testOrganisationId,
            [],
            $userData->getArrayData()
        );

        $response = $this->sendRequestCommonExpectations(
            200,
            (string) json_encode($userData->getResponse()),
            $request
        );

        $updateOrganisationTypeSuccessfulResponse = $this->apiClient->putOrganisation($this->testOrganisationId, $userData->getArrayData());
        self::assertSame($response->reveal(), $updateOrganisationTypeSuccessfulResponse);
    }

    public function testHttpExceptionUpdateOrganisation(): void
    {
        $userData = new OrganisationData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::USER_ORGANISATION . '/' . $this->testOrganisationId,
            [],
            $userData->getArrayData()
        );
        $this->throwClientExceptionCommonExpectations($request);
        $this->apiClient->putOrganisation($this->testOrganisationId, $userData->getArrayData());
    }

    /**
     * @param int $statusCode
     * @param string $responseBody
     * @dataProvider provideUnsuccessfulTestCases
     */
    public function testUnsuccessfulUpdateOrganisation(int $statusCode, string $responseBody): void
    {
        $userData = new OrganisationData;
        self::expectException(HttpResponseException::class);
        $request = $this->requestCommonExpectations(
            'PUT',
            ApiDictionary::USER_ORGANISATION . '/' . $this->testOrganisationId,
            [],
            $userData->getArrayData()
        );
        $this->sendRequestCommonExpectations($statusCode, $responseBody, $request);
        $this->apiClient->putOrganisation($this->testOrganisationId, $userData->getArrayData());
    }

    /**
     * @return class-string
     */
    protected function getApiClientName(): string
    {
        return UserClient::class;
    }
}
