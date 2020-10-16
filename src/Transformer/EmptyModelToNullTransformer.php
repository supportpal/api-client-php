<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Transformer;

use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SettingsModel;
use TypeError;

use function get_class_methods;
use function substr;

class EmptyModelToNullTransformer implements Transformer
{
    /**
     * @inheritDoc
     */
    public function canTransform($value): bool
    {
        return $value instanceof Model && ! $value instanceof SettingsModel;
    }

    /**
     * @inheritDoc
     */
    public function transform($value)
    {
        foreach (get_class_methods($value) as $method) {
            try {
                if (substr($method, 0, 3) === 'get' && $value->{$method}()) {
                    return $value;
                }
            } catch (TypeError $typeError) {
                /**
                 * non-nullable field not initiated
                 */
                continue;
            }
        }

        return null;
    }
}
