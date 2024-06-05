<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\User;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait OperatorGroupApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $parameters
     * @throws HttpResponseException
     */
    public function getOperatorGroups(array $parameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_OPERATORGROUP, $parameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getOperatorGroup(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::USER_OPERATORGROUP . '/' . $id, []);
    }
}
