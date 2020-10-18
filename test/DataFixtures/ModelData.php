<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures;

use SupportPal\ApiClient\Model\Model;

interface ModelData
{
    /**
     * @return array<mixed>
     */
    public function getArrayData(): array;

    /**
     * @return array<mixed>
     */
    public function getDataWithObjects(): array;

    /**
     * @return Model
     */
    public function getFilledInstance(): Model;

    /**
     * @return string
     */
    public function getModel(): string;
}
