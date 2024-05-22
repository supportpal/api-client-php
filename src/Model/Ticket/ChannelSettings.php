<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Model;

class ChannelSettings extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'unauthenticated_users' => 'string',
        'show_captcha'          => 'string',
        'append_ip_address'     => 'string',
        'show_related_articles' => 'string',
    ];
}
