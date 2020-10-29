<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api\Ticket;

use SupportPal\ApiClient\Api\ApiAware;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection\Collection;
use SupportPal\ApiClient\Model\Ticket\Message;
use SupportPal\ApiClient\Model\Ticket\Request\CreateMessage;
use Symfony\Component\PropertyAccess\Exception\UninitializedPropertyException;

use function array_map;

trait MessageApis
{
    use ApiAware;

    /**
     * @param CreateMessage $message
     * @return Message
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function postMessage(CreateMessage $message): Message
    {
        try {
            $messageArray = $this->getModelToArrayConverter()->convertOne($message);
        } catch (UninitializedPropertyException $exception) {
            throw new InvalidArgumentException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception->getPrevious()
            );
        }

        $response = $this->getApiClient()->postMessage($messageArray);

        return $this->createMessage($this->decodeBody($response)['data']);
    }

    /**
     * @param int $ticketId
     * @param array<mixed> $queryParameters
     * @return Collection
     * @throws HttpResponseException
     * @throws InvalidArgumentException
     */
    public function getMessages(int $ticketId, array $queryParameters = []): Collection
    {
        $queryParameters['ticket_id'] = $ticketId;
        $response = $this->getApiClient()->getMessages($queryParameters);
        $body = $this->decodeBody($response);
        $models = array_map([$this, 'createMessage'], $body['data']);

        return $this->getCollectionFactory()->create($body['count'], $models);
    }

    /**
     * @param int $messageId
     * @return Message
     * @throws HttpResponseException
     */
    public function getMessage(int $messageId): Message
    {
        $response = $this->getApiClient()->getMessage($messageId);

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

    abstract protected function getApiClient(): TicketApiClient;
}
