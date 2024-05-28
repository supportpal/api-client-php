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
     * @param int $brandId
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getBrand(int $brandId): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_BRAND . '/' . $brandId, []);
    }

    /**
     * @param array<mixed> $queryParameters
     * @return ResponseInterface
     * @throws HttpResponseException
     */
    public function getBrands(array $queryParameters): ResponseInterface
    {
        return $this->prepareAndSendGetRequest(ApiDictionary::CORE_BRAND, $queryParameters);
    }
}
