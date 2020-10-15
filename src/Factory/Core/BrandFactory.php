<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Factory\Core;

use SupportPal\ApiClient\Factory\BaseModelFactory;
use SupportPal\ApiClient\Model\Core\Brand;

class BrandFactory extends BaseModelFactory
{
    /**
     * @inheritDoc
     */
    public function getModel(): string
    {
        return Brand::class;
    }
}
