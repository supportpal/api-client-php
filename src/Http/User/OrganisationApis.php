<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\User;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait OrganisationApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getOrganisations(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_ORGANISATION, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getOrganisation(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_ORGANISATION . '/' .  $id, []);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function putOrganisation(int $id, array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('PUT', ApiDictionary::USER_ORGANISATION . '/' . $id, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postOrganisation(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::USER_ORGANISATION, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteOrganisation(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create('DELETE', ApiDictionary::USER_ORGANISATION . '/' . $id);

        return $this->sendRequest($request);
    }
}
