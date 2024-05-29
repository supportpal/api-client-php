<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Core\Upload;
use SupportPal\ApiClient\Model\Model;

class Attachment extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'id'            => 'int',
        'upload_hash'   => 'string',
        'ticket_id'     => 'int',
        'message_id'    => 'int',
        'original_name' => 'string',
        'created_at'    => 'int',
        'updated_at'    => 'int',
        'operator_url'  => 'string',
        'frontend_url'  => 'string',
        'direct_operator_url' => 'string',
        'direct_frontend_url' => 'string',
        'upload'        => Upload::class,
        'ticket'        => Ticket::class,
    ];
}
