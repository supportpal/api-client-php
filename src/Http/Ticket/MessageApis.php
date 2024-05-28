<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Ticket;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait MessageApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $body
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function postMessage(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create(
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
    public function getMessages(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_MESSAGE, $queryParameters);
    }

    /**
     * @param int $messageId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getMessage(int $messageId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_MESSAGE . '/' .  $messageId, []);
    }
}
