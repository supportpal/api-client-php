<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Ticket\Priority;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class PriorityData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'Low',
        'colour' => '#3498db',
        'order' => 1,
        'created_at' => 1597245387,
        'updated_at' => 1597245387,
        'icon' => '<div class="sp-inline-block sp-h-5 sp-w-5 sp-text-xs sp-text-center sp-font-bold sp-align-middle sp-whitespace-no-wrap" style="background-color => #3498db; color => #fff; line-height => 1.25rem;" title="Low">1</div>',
        'icon_without_tooltip' => '<div class="sp-inline-block sp-h-5 sp-w-5 sp-text-xs sp-text-center sp-font-bold sp-align-middle sp-whitespace-no-wrap" style="background-color => #3498db; color => #fff; line-height => 1.25rem;">1</div>',
        'departments' => [DepartmentData::DATA,]
    ];

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     */
    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['departments'] = [DepartmentData::getFilledInstance(),];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Priority::class;
    }
}
