<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\CoreSettings;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

trait CoreApis
{

    /**
     * @var ApiClient
     */
    private $apiClient;

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    /**
     * @var DecoderInterface
     */
    private $decoder;

    /**
     * @var string
     */
    private $formatType;

    /**
     * This method fetches all core settings
     * @return CoreSettings
     * @throws \SupportPal\ApiClient\Exception\HttpResponseException
     */
    public function getCoreSettings(): CoreSettings
    {
        $response = $this->apiClient->getCoreSettings();
        $body = $this->decoder->decode((string) $response->getBody(), $this->formatType)['data'];
        /** @var CoreSettings $model */
        $model = $this->modelCollectionFactory->create(CoreSettings::class, $body);

        return $model;
    }
}
