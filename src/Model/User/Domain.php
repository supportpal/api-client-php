<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User;

use SupportPal\ApiClient\Model\Model;

class Domain extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'id'              => 'int',
        'organisation_id' => 'int',
        'domain'          => 'string',
    ];
}
