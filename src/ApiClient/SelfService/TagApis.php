<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\ApiClient\SelfService;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

trait TagApis
{
    use ApiClientAware;

    /**
     * @param int $tagId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getTag(int $tagId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::SELF_SERVICE_TAG . '/' . $tagId, []);
    }
}
