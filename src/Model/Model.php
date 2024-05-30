<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

abstract class Model extends \Jenssegers\Model\Model
{
    /** @var string[] */
    protected array $guarded = [];
}
