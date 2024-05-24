<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    /** @var string[] */
    protected $guarded = [];
}
