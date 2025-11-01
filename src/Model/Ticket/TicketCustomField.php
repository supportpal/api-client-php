<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Ticket;

use SupportPal\ApiClient\Model\Shared\CustomField;

use function array_merge;

/**
 * @property int $purge
 * @property int $ticket_id
 * @property Department[] $departments
 * @property TicketCustomFieldTranslation[] $translations
 */
class TicketCustomField extends CustomField
{
    /**
     * @param mixed[] $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->casts = array_merge($this->casts, [
            'purge'        => 'int',
            'ticket_id'    => 'int',
            'departments'  => 'array:' . Department::class,
            'translations' => 'array:' . TicketCustomFieldTranslation::class
        ]);

        parent::__construct($attributes);
    }
}
