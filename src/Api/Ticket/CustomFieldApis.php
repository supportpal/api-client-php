<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Shared\CustomField;
use SupportPal\ApiClient\Model\Ticket\TicketCustomField;

use function array_map;

trait CustomFieldApis
{
    use ApiAware;

    /**
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getCustomFields(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getCustomFields($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createTicketCustomField'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $customFieldId
     * @return CustomField
     * @throws HttpResponseException
     */
    public function getCustomField(int $customFieldId): CustomField
    {
        $response = $this->getApiClient()->getCustomField($customFieldId);

        return $this->createTicketCustomField($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @return TicketCustomField
     */
    private function createTicketCustomField(array $data): TicketCustomField
    {
        /** @var TicketCustomField $model */
        $model = $this->getModelCollectionFactory()->create(TicketCustomField::class, $data);

        return $model;
    }

    abstract protected function getApiClient(): TicketApiClient;
}
