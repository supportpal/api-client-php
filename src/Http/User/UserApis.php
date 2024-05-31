<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\User;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait UserApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getUsers(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_USER, $queryParameters);
    }

    /**
     * @param int $userId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getUser(int $userId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_USER . '/' .  $userId, []);
    }

    /**
     * @param int $userId
     * @param array<mixed> $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function putUser(int $userId, array $body): ResponseInterface
    {
        $request = $this->getRequest()->create(
            'PUT',
            ApiDictionary::USER_USER . '/' . $userId,
            [],
            $body
        );

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function postUser(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create(
            'POST',
            ApiDictionary::USER_USER,
            [],
            $body
        );

        return $this->sendRequest($request);
    }
}
