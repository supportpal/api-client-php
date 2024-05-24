<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Shared;

use SupportPal\ApiClient\Model\BaseModel;
use SupportPal\ApiClient\Model\Core\Brand;
use Symfony\Component\Serializer\Attribute\SerializedName;

abstract class CustomField extends BaseModel
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

    public function __construct(
        #[SerializedName('regex_error_message')]
        public readonly string|null $regexErrorMessage,
        #[SerializedName('depends_on_field_id')]
        public readonly int|null $dependsOnFieldId,
        #[SerializedName('regex')]
        public readonly string|null $regex,
        #[SerializedName('locked')]
        public readonly bool $locked,
        #[SerializedName('updated_at')]
        public readonly int|null $updatedAt,
        #[SerializedName('created_at')]
        public readonly int|null $createdAt,
        #[SerializedName('depends_on_option_id')]
        public readonly int|null $dependsOnOptionId,
        #[SerializedName('id')]
        public readonly int $id,
        #[SerializedName('name')]
        public readonly string|null $name,
        #[SerializedName('required')]
        public readonly bool|null $required,
        #[SerializedName('public')]
        public readonly bool|null $public,
        #[SerializedName('order')]
        public readonly int|null $order,
        #[SerializedName('description')]
        public readonly string|null $description,
        #[SerializedName('type')]
        public readonly int|null $type,
        #[SerializedName('encrypted')]
        public readonly int|null $encrypted,
        /** @var Option[]|null */
        public readonly ?array $options,
        /** @var Brand[]|null */
        public readonly ?array $brands,
        #[SerializedName('field_id')]
        public readonly int|null $fieldId = null,
        #[SerializedName('value')]
        public readonly string|null $value = null,
        public readonly ?array $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
