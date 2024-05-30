<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use SupportPal\ApiClient\Api\SelfService\Articles;
use SupportPal\ApiClient\Api\SelfService\Categories;
use SupportPal\ApiClient\Api\SelfService\Comments;
use SupportPal\ApiClient\Api\SelfService\Settings;
use SupportPal\ApiClient\Api\SelfService\Tags;
use SupportPal\ApiClient\Api\SelfService\Types;
use SupportPal\ApiClient\Http\SelfServiceClient;

class SelfServiceApi extends Api
{
    use Articles;
    use Categories;
    use Comments;
    use Settings;
    use Tags;
    use Types;

    public function __construct(protected readonly SelfServiceClient $apiClient)
    {
    }

    protected function getApiClient(): SelfServiceClient
    {
        return $this->apiClient;
    }
}
