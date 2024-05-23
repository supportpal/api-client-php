<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\DataFixtures;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Model;

abstract class BaseModelData implements ModelData
{
    public const DATA = [];

    public function getDataWithObjects(): array
    {
        return static::DATA;
    }

    /**
     * @inheritDoc
     */
    public function getArrayData(): array
    {
        return static::DATA;
    }

    /**
     * @inheritDoc
     * @throws InvalidArgumentException
     * @SuppressWarnings(PHPMD.MissingImport)
     */
    public function getFilledInstance(): Model
    {
        $class = static::getModel();

        return new $class(...static::getDataWithObjects());
    }

    /**
     * @return array<mixed>
     */
    public function getAllResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'count' => 1,
            'data' => [static::DATA],
        ];
    }

    /**
     * @return array<mixed>
     */
    public function getResponse(): array
    {
        return [
            'status' => 'success',
            'message' => null,
            'data' => static::DATA,
        ];
    }
}
