<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Transformer;

use SupportPal\ApiClient\Helper\StringHelper;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\PropertyInfo\Type;

use function array_filter;
use function boolval;
use function in_array;
use function is_int;

class IntToBooleanTransformer implements AttributeAwareTransformer
{
    private const TYPE_BOOL = 'bool';

    /** @var PropertyTypeExtractorInterface */
    private $propertyTypeExtractor;

    public function __construct(PropertyTypeExtractorInterface $propertyTypeExtractor)
    {
        $this->propertyTypeExtractor = $propertyTypeExtractor;
    }

    /**
     * @inheritDoc
     */
    public function canTransform(string $attribute, string $class, $value): bool
    {
        return is_int($value)
            && in_array($value, [0, 1], true)
            && $this->isBoolAttribute($class, $attribute);
    }

    /**
     * @inheritDoc
     */
    public function transform($value)
    {
        return boolval($value);
    }

    /**
     * @param string $class
     * @param string $attribute
     * @return bool
     */
    protected function isBoolAttribute(string $class, string $attribute)
    {
        $boolFilteredType = array_filter(
            $this->propertyTypeExtractor->getTypes($class, $attribute),
            function (Type $type) {
                return $type->getBuiltinType() === self::TYPE_BOOL;
            }
        );

        return ! empty($boolFilteredType);
    }
}
