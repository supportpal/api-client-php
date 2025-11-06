<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\Core\Brand;
use SupportPal\ApiClient\Model\Model;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $purified_description
 * @property int $type
 * @property int|null $depends_on_field_id
 * @property int|null $depends_on_option_id
 * @property int|null $order
 * @property int $required
 * @property int $public
 * @property int $encrypted
 * @property int $locked
 * @property string|null $regex
 * @property string|null $regex_error_message
 * @property int $created_at
 * @property int $updated_at
 * @property Option[] $options
 * @property Brand[] $brands
 */
abstract class CustomField extends Model
{
    public const TYPE_BOOLEAN = 0;

    public const TYPE_CHECKBOX = 1;

    public const TYPE_CHECKLIST = 2;

    public const TYPE_DATE = 3;

    public const TYPE_MULTIPLE = 4;

    public const TYPE_OPTIONS = 5;

    public const TYPE_PASSWORD = 6;

    public const TYPE_RADIO = 7;

    public const TYPE_TEXT = 8;

    public const TYPE_TEXTAREA = 9;

    public const TYPE_RATING = 10;

    /** @var array<string, string> */
    protected $casts = [
        'id'                   => 'int',
        'name'                 => 'string',
        'description'          => 'string',
        'purified_description' => 'string',
        'type'                 => 'int',
        'depends_on_field_id'  => 'int',
        'depends_on_option_id' => 'int',
        'order'                => 'int',
        'required'             => 'int',
        'public'               => 'int',
        'encrypted'            => 'int',
        'locked'               => 'int',
        'regex'                => 'string',
        'regex_error_message'  => 'string',
        'created_at'           => 'int',
        'updated_at'           => 'int',
        'options'              => 'array:' . Option::class,
        'brands'               => 'array:' . Brand::class,
    ];
}
