<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\Translation;

class OptionTranslation extends Translation
{
    /** @var array<string, string> */
    protected $casts = [
        'id'           => 'int',
        'value'        => 'string',
    ];
}
