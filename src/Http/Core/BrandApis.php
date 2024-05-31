<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Http\Core;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Http\ApiClientAware;

trait BrandApis
{
    use ApiClientAware;

    /**
     * @param array<mixed> $queryParameters
     * @throws HttpResponseException
     */
    public function getBrands(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_BRAND, $queryParameters);
    }

    /**
     * @throws HttpResponseException
     */
    public function getBrand(int $id): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_BRAND . '/' . $id, []);
    }
}
