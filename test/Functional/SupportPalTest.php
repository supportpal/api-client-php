<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional;

use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;

class SupportPalTest extends ContainerAwareBaseTestCase
{
    use SelfServiceApisTestCase;
    use CoreApisTestCase;
}
