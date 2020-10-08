<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

class PriorityData
{
    public const PRIORITY_DATA = [
        'id' => 1,
        'name' => 'Low',
        'colour' => '#3498db',
        'order' => 1,
        'created_at' => 1597245387,
        'updated_at' => 1597245387,
        'icon' => '<div class="sp-inline-block sp-h-5 sp-w-5 sp-text-xs sp-text-center sp-font-bold sp-align-middle sp-whitespace-no-wrap" style="background-color => #3498db; color => #fff; line-height => 1.25rem;" title="Low">1</div>',
        'icon_without_tooltip' => '<div class="sp-inline-block sp-h-5 sp-w-5 sp-text-xs sp-text-center sp-font-bold sp-align-middle sp-whitespace-no-wrap" style="background-color => #3498db; color => #fff; line-height => 1.25rem;">1</div>',
        'departments' => [DepartmentData::DEPARTMENT_DATA]
    ];

    const GET_PRIORITIES_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'count' => 1,
        'data' => [self::PRIORITY_DATA]
    ];

    const GET_PRIORITY_SUCCESSFUL_RESPONSE = [
        'status' => 'success',
        'message' => null,
        'data' => self::PRIORITY_DATA
    ];
}
