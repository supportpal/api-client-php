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
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getMessages(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_MESSAGE, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getMessage(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::TICKET_MESSAGE . '/' .  $id, []);
    }

    /**
     * @param array<mixed> $body
     * @throws HttpResponseException
     */
    public function postMessage(array $body): ResponseInterface
    {
        $request = $this->getRequest()->create('POST', ApiDictionary::TICKET_MESSAGE, [], $body);

        return $this->sendRequest($request);
    }
}
