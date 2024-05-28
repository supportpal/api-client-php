<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\User;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait UserGroupApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $parameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getGroups(array $parameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_USERGROUP, $parameters);
    }

    /**
     * @param int $userGroupId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getGroup(int $userGroupId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(
            ApiDictionary::USER_USERGROUP . '/' . $userGroupId,
            []
        );
    }
}
