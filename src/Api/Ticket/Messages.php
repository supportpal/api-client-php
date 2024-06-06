<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Ticket\Message;
use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;
use SupportPal\ApiClient\Model\Ticket\Request\UpdateMessage;

use function array_map;

trait Messages
{
    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getMessages(int $ticketId, array $queryParameters = []): Collection
    {
        $queryParameters['ticket_id'] = $ticketId;
        $response = $this->getApiClient()->getMessages($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createMessageModel'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getMessage(int $id): Message
    {
        $response = $this->getApiClient()->getMessage($id);

        return $this->createMessageModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function createMessage(CreateMessage $data): Message
    {
        $response = $this->getApiClient()->postMessage($data->toArray());

        return $this->createMessageModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function updateMessage(int $id, UpdateMessage $data): Message
    {
        $response = $this->getApiClient()->putMessage($id, $data->toArray());

        return $this->createMessageModel($this->decodeBody($response)['data']);
    }

    /**
     * @throws HttpResponseException
     */
    public function deleteMessage(int $id): bool
    {
        $response = $this->getApiClient()->deleteMessage($id);

        return $this->decodeBody($response)['status'] === 'success';
    }

    /**
     * @param array<mixed> $data
     */
    private function createMessageModel(array $data): Message
    {
        return new Message($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
