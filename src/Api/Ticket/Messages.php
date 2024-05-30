<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Ticket\Message;
use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;

use function array_map;

trait Messages
{
    /**
     * @param CreateMessage $message
     * @return Message
     * @throws HttpResponseException
     */
    public function postMessage(CreateMessage $message): Message
    {
        $response = $this->getApiClient()->postMessage($message->toArray());

        return $this->createMessage($this->decodeBody($response)['data']);
    }

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
        $models = array_map([$this, 'createMessage'], $body['data']);

        return $this->createCollection($body['count'], $models);
    }

    /**
     * @throws HttpResponseException
     */
    public function getMessage(int $messageId): Message
    {
        $response = $this->getApiClient()->getMessage($messageId);

        return $this->createMessage($this->decodeBody($response)['data']);
    }

    /**
     * @param array<mixed> $data
     */
    private function createMessage(array $data): Message
    {
        return new Message($data);
    }

    abstract protected function getApiClient(): TicketClient;
}
