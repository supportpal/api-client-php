<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\PhpUnit;

// In order to manage different method signatures between PHPUnit versions, we
// dynamically load a compatibility trait dependent on the PHPUnit runner
// version.
if (! trait_exists(PhpUnitVersionDependentTestCompatibilityTrait::class, FALSE)) {
    class_alias('SupportPal\ApiClient\Tests\PhpUnit\v' . RunnerVersion::getMajor() . '\TestCompatibilityTrait', PhpUnitVersionDependentTestCompatibilityTrait::class);
}

trait PhpUnitCompatibilityTrait
{
    use PhpUnitVersionDependentTestCompatibilityTrait;
}