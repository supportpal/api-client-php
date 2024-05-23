<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Helper\StringHelper;
use SupportPal\ApiClient\Transformer\AttributeAwareTransformer;
use SupportPal\ApiClient\Transformer\IntToBooleanTransformer;
use SupportPal\ApiClient\Transformer\StringTrimTransformer;
use SupportPal\ApiClient\Transformer\Transformer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Attribute\SerializedName;
use TypeError;

use function array_push;
use function count;
use function get_class;
use function implode;
use function is_string;
use function property_exists;

abstract class BaseModel implements Model
{
    use StringHelper;

    public function __construct(
        /** @var array<mixed>|null */
        #[SerializedName('pivot')]
        public readonly ?array $pivot = null,
    ) {
        //
    }
}
