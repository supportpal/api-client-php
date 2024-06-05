<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\User;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait OperatorApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getOperators(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_OPERATOR, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getOperator(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_OPERATOR . '/' .  $id, []);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function putOperator(int $id, array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('PUT', ApiDictionary::USER_OPERATOR . '/' . $id, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postOperator(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::USER_OPERATOR, [], $body);

        return $this->sendRequest($request);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteOperator(int $id): ResponseInterface
    {
        $request = $this->getRequest()->create('DELETE', ApiDictionary::USER_OPERATOR . '/' . $id);

        return $this->sendRequest($request);
    }
}
