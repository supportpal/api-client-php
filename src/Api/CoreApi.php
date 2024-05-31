<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\Core\Brands;
use SupportPal\ApiClient\Api\Core\IpBans;
use SupportPal\ApiClient\Api\Core\IpWhitelist;
use SupportPal\ApiClient\Api\Core\Settings;
use SupportPal\ApiClient\Http\CoreClient;

class CoreApi extends Api
{
    use Brands;
    use IpBans;
    use IpWhitelist;
    use Settings;

    public function __construct(protected readonly CoreClient $apiClient)
    {
    }

    protected function getApiClient(): CoreClient
    {
        return $this->apiClient;
    }
}
