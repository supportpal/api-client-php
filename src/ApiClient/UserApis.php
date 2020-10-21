<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\User\UserGroupApis;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

/**
 * Trait UserApis, includes all api calls related to user apis
 * @package SupportPal\ApiClient\ApiClient\Core
 */
trait UserApis
{
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
}
