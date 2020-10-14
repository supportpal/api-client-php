<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests;

use PHPUnit\Framework\TestCase;
use SupportPal\ApiClient\SupportPal;

class AppTestCase extends TestCase
{
    public function testApps()
    {
        $sp = new SupportPal(
            'localhost:8080/api/',
            'xp6BhmJU2WH6v22ATd=5cSDcz785yUte',
            ['whmcs' => 1],
            ['whmcs' => 1]
        );


        $sp->getApi()->getCoreSettings();
    }
}
