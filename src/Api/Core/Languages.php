<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Core;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Core\Language;

use function array_map;

trait Languages
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getLanguages(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getLanguages($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createLanguageModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @param array<mixed> $data
     */
    private function createLanguageModel(array $data): Language
    {
        return new Language($data);
    }

    abstract protected function getApiClient(): CoreClient;
}
