<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures;

use SupportPal\ApiClient\Model\Model;

interface ModelData
{
    /**
     * @return array<mixed>
     */
    public static function getDataWithObjects(): array;

    /**
     * @return Model
     */
    public static function getFilledInstance(): Model;

    /**
     * @return string
     */
    public static function getModel(): string;
}
