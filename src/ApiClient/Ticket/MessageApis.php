<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

trait MessageApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function postTicketMessage(array $body): ResponseInterface
    {
        $request = $this->getRequestFactory()->create(
            'POST',
            ApiDictionary::TICKET_MESSAGE,
            [],
            $body
        );

        return $this->sendRequest($request);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTicketMessages(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_MESSAGE, $queryParameters);
    }

    /**
     * @param int $messageId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTicketMessage(int $messageId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_MESSAGE . '/' .  $messageId, []);
    }
}
