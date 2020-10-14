<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Ticket\Message;

trait MessageApis
{
    use ApiAware;

    /**
     * @param int $ticketId
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getTicketMessages(int $ticketId, array $queryParameters = []): Collection
    {
        $queryParameters['ticket_id'] = $ticketId;
        $response = $this->getApiClient()->getTicketMessages($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createMessage'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $messageId
     * @return Message
     * @throws HttpResponseException
     */
    public function getTicketMessage(int $messageId): Message
    {
        $response = $this->getApiClient()->getTicketMessage($messageId);

        return $this->createMessage($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     * @return Message
     */
    private function createMessage(array $data): Message
    {
        /** @var Message $model */
        $model = $this->getModelCollectionFactory()->create(Message::class, $data);

        return $model;
    }
}
