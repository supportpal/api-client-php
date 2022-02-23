<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\PhpUnit;

use PHPUnit\Runner\Version;

final class RunnerVersion
{
    public static function getMajor(): int
    {
        return (int) explode('.', Version::id())[0];
    }
}
