<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Core;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Core\Request\CreateWhitelistedIp;
use SupportPal\ApiClient\Model\Core\Request\UpdateWhitelistedIp;
use SupportPal\ApiClient\Model\Core\WhitelistedIp;

use function array_map;

trait IpWhitelist
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getWhitelistedIps(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getWhitelistedIps($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createWhitelistedIpModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getWhitelistedIp(int $id): WhitelistedIp
    {
        $response = $this->getApiClient()->getWhitelistedIp($id);

        return $this->createWhitelistedIpModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function createWhitelistedIp(CreateWhitelistedIp $data): WhitelistedIp
    {
        $response = $this->getApiClient()->postWhitelistedIp($data->toArray());

        return $this->createWhitelistedIpModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function updateWhitelistedIp(int $id, UpdateWhitelistedIp $data): WhitelistedIp
    {
        $response = $this->getApiClient()->putWhitelistedIp($id, $data->toArray());

        return $this->createWhitelistedIpModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteWhitelistedIp(int $id): bool
    {
        $response = $this->getApiClient()->deleteWhitelistedIp($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createWhitelistedIpModel(array $data): WhitelistedIp
    {
        return new WhitelistedIp($data);
    }

    abstract protected function getApiClient(): CoreClient;
}
