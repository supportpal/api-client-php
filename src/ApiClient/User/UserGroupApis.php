<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient\User;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

trait UserGroupApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $parameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getUserGroups(array $parameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_USERGROUP, $parameters);
    }

    /**
     * @param int $userGroupId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getUserGroup(int $userGroupId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(
            ApiDictionary::USER_USERGROUP . '/' . $userGroupId,
            []
        );
    }
}
