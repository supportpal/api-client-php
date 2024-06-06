<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Model;

class UpdateMessage extends Model
{
    /** @var array<string, string> */
    protected array $casts = ['text' => 'string'];
}
