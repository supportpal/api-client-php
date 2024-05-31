<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Core;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Core\IpBan;
use SupportPal\ApiClient\Model\Core\Request\CreateIpBan;
use SupportPal\ApiClient\Model\Core\Request\UpdateIpBan;

use function array_map;

trait IpBans
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getIpBans(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getIpBans($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createIpBanModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getIpBan(int $id): IpBan
    {
        $response = $this->getApiClient()->getIpBan($id);

        return $this->createIpBanModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function createIpBan(CreateIpBan $data): IpBan
    {
        $response = $this->getApiClient()->postIpBan($data->toArray());

        return $this->createIpBanModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function updateIpBan(int $id, UpdateIpBan $data): IpBan
    {
        $response = $this->getApiClient()->putIpBan($id, $data->toArray());

        return $this->createIpBanModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteIpBan(int $id): bool
    {
        $response = $this->getApiClient()->deleteIpBan($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createIpBanModel(array $data): IpBan
    {
        return new IpBan($data);
    }

    abstract protected function getApiClient(): CoreClient;
}
