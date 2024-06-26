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
     * @throws HttpResponseException
     */
    public function getUserGroups(array $parameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_USERGROUP, $parameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getUserGroup(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_USERGROUP . '/' . $id, []);
    }
}
