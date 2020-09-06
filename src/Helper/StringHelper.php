<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Helper;

trait StringHelper
{

    /**
     * @param string $key
     * @return string
     */
    protected function snakeCaseToCamelCase(string $key): string
    {
        return str_replace('_', '', lcfirst(ucwords($key, '_')));
    }

    /**
     * @param string $key
     * @return string
     */
    protected function snakeCaseToPascalCase(string $key): string
    {
        return str_replace('_', '', ucwords($key, '_'));
    }
}
