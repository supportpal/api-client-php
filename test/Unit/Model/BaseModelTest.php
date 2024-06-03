<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Model;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Tests\TestCase;

/**
 * @template T of Model
 */
abstract class BaseModelTest extends TestCase
{
    /** @var class-string<T> */
    protected string $modelClass;

    /** @var T */
    protected $model;

    public function setUp(): void
    {
        parent::setUp();

        $this->model = new $this->modelClass;
    }
}
