<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Transformer;

use Error;
use SupportPal\ApiClient\Model\Model;
use SupportPal\ApiClient\Model\SettingsModel;
use TypeError;

use function get_class_methods;
use function sprintf;
use function str_contains;
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
                 * non-nullable field not initiated (i.e Error: Typed property not initialized)
                 */
                continue;
            } catch (Error $error) {
                if (str_contains($error->getMessage(), sprintf('must not be accessed before initialization'))) {
                    continue;
                }

                throw $error;
            }
        }

        return null;
    }
}
