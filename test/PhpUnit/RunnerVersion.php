<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\PhpUnit;

use PHPUnit\Runner\Version;
use SupportPal\ApiClient\Tests\PhpUnit\v8\TestCompatibilityTrait as PhpUnit8CompatibilityTrait;
use SupportPal\ApiClient\Tests\PhpUnit\v9\TestCompatibilityTrait as PhpUnit9CompatibilityTrait;

use function explode;

final class RunnerVersion
{
    public static function getMajor(): int
    {
        return (int) explode('.', Version::id())[0];
    }

    public static function getCompatibilityTrait(): string
    {
        $version = self::getMajor();
        if ($version <= 8) {
            return PhpUnit8CompatibilityTrait::class;
        }

        return PhpUnit9CompatibilityTrait::class;
    }
}
