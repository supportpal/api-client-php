<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Shared\CustomField;
use SupportPal\ApiClient\Model\Ticket\TicketCustomField;

use function array_map;

trait CustomFields
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getCustomFields(array $queryParameters = []): Collection
    {
        $response = $this->getApiClient()->getCustomFields($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createTicketCustomFieldModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getCustomField(int $id): CustomField
    {
        $response = $this->getApiClient()->getCustomField($id);

        return $this->createTicketCustomFieldModel($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createTicketCustomFieldModel(array $data): TicketCustomField
    {
        return new TicketCustomField($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
