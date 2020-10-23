<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\ApiClient\User\CustomFieldApis;
use SupportPal\ApiClient\ApiClient\User\UserGroupApis;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Trait UserApis, includes all api calls related to user apis
 * @package SupportPal\ApiClient\ApiClient\Core
 */
class UserApiClient extends ApiClient
{
    use CustomFieldApis;
    use UserGroupApis;

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
    public function updateUser(int $userId, array $body): ResponseInterface
    {
        $request = $this->getRequestFactory()->create(
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
        $request = $this->getRequestFactory()->create(
            'POST',
            ApiDictionary::USER_USER,
            [],
            $body
        );

        return $this->sendRequest($request);
    }
}
