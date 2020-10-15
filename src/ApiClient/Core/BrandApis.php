<?php declare(strict_types=1);

namespace SupportPal\ApiClient\ApiClient\Core;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\ApiClient\ApiClientAware;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Exception\HttpResponseException;

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
