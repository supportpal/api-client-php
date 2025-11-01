<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Core\Upload;
use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property string $upload_hash
 * @property int $ticket_id
 * @property int $message_id
 * @property string $original_name
 * @property int $created_at
 * @property int $updated_at
 * @property string $operator_url
 * @property string $frontend_url
 * @property string $direct_operator_url
 * @property string $direct_frontend_url
 * @property Upload $upload
 * @property Ticket $ticket
 */
class Attachment extends Model
{
    /** @var array<string, string> */
    protected $casts = [
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
