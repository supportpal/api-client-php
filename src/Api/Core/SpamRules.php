<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Core;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Core\Request\CreateSpamRule;
use SupportPal\ApiClient\Model\Core\Request\UpdateSpamRule;
use SupportPal\ApiClient\Model\Core\SpamRule;

use function array_map;

trait SpamRules
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getSpamRules(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getSpamRules($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createSpamRuleModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getSpamRule(int $id): SpamRule
    {
        $response = $this->getApiClient()->getSpamRule($id);

        return $this->createSpamRuleModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function createSpamRule(CreateSpamRule $data): SpamRule
    {
        $response = $this->getApiClient()->postSpamRule($data->toArray());

        return $this->createSpamRuleModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function updateSpamRule(int $id, UpdateSpamRule $data): SpamRule
    {
        $response = $this->getApiClient()->putSpamRule($id, $data->toArray());

        return $this->createSpamRuleModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteSpamRule(int $id): bool
    {
        $response = $this->getApiClient()->deleteSpamRule($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createSpamRuleModel(array $data): SpamRule
    {
        return new SpamRule($data);
    }

    abstract protected function getApiClient(): CoreClient;
}
