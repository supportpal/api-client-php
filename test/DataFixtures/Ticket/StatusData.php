<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures\Ticket;

use SupportPal\ApiClient\Model\Ticket\Status;
use SupportPal\ApiClient\Tests\DataFixtures\BaseModelData;

class StatusData extends BaseModelData
{
    public const DATA = [
        'id' => 1,
        'name' => 'Open',
        'colour' => '#35a600',
        'auto_close' => 1,
        'order' => 1,
        'created_at' => 1597245387,
        'updated_at' => 1597245387,
        'icon' => '<div class="sp-inline-block sp-h-5 sp-w-5 sp-rounded-full sp-text-xs sp-text-center sp-font-bold sp-align-middle" style="background-color: #35a600; color: #fff; line-height: 1.25rem;" title="Open">O</div>',
        'icon_without_tooltip' => '<div class="sp-inline-block sp-h-5 sp-w-5 sp-rounded-full sp-text-xs sp-text-center sp-font-bold sp-align-middle" style="background-color: #35a600; color: #fff; line-height: 1.25rem;">O</div>',
        'translations' => [StatusTranslationData::DATA,]
    ];

    public static function getDataWithObjects(): array
    {
        $data = self::DATA;
        $data['translations'] = [StatusTranslationData::getFilledInstance(),];

        return $data;
    }

    /**
     * @inheritDoc
     */
    public static function getModel(): string
    {
        return Status::class;
    }
}
