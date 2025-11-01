<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket\Request;

use SupportPal\ApiClient\Model\Model;

/**
 * @property string $text
 */
class UpdateMessage extends Model
{
    /** @var array<string, string> */
    protected $casts = ['text' => 'string'];
}
