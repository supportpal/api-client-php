<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Unit\Config;

use SupportPal\ApiClient\Config\RequestDefaults;
use SupportPal\ApiClient\Tests\TestCase;

class RequestDefaultsTest extends TestCase
{
    public function testCreateWithDefaults(): void
    {
        $requestDefaults = new RequestDefaults;
        self::assertSame([], $requestDefaults->getDefaultBodyContent());
        self::assertSame([], $requestDefaults->getDefaultParameters());
        self::assertSame(RequestDefaults::DEFAULT_OPTIONS, $requestDefaults->getDefaultRequestOptions());
    }

    public function testSetDefaultParameters(): void
    {
        $requestDefaults = new RequestDefaults;
        self::assertSame([], $requestDefaults->getDefaultParameters());
        $updatedParameters = ['test' => 'test'];
        $requestDefaults->setDefaultParameters($updatedParameters);
        self::assertSame(['test' => 'test'], $requestDefaults->getDefaultParameters());
    }

    public function testSetDefaultRequestOptions(): void
    {
        $requestDefaults = new RequestDefaults;
        self::assertSame(RequestDefaults::DEFAULT_OPTIONS, $requestDefaults->getDefaultRequestOptions());
        $updatedParameters = ['test' => 'test'];
        $requestDefaults->setDefaultRequestOptions($updatedParameters);
        self::assertSame(['test' => 'test'], $requestDefaults->getDefaultRequestOptions());
    }

    public function testSetDefaultBodyContent(): void
    {
        $requestDefaults = new RequestDefaults;
        self::assertSame([], $requestDefaults->getDefaultBodyContent());
        $updatedParameters = ['test' => 'test'];
        $requestDefaults->setDefaultBodyContent($updatedParameters);
        self::assertSame(['test' => 'test'], $requestDefaults->getDefaultBodyContent());
    }

    public function testAddRequestOption(): void
    {
        $requestDefaults = new RequestDefaults;
        self::assertSame(RequestDefaults::DEFAULT_OPTIONS, $requestDefaults->getDefaultRequestOptions());
        $requestDefaults->addRequestOption('test_key', 'test_value');
        self::assertSame('test_value', $requestDefaults->getDefaultRequestOptions()['test_key']);
    }

    public function testDisableAndEnableSslVerification(): void
    {
        $requestDefaults = new RequestDefaults;
        self::assertTrue($requestDefaults->getDefaultRequestOptions()['verify']);
        $requestDefaults->disableSslVerification();
        self::assertFalse($requestDefaults->getDefaultRequestOptions()['verify']);
        $requestDefaults->enableSslVerification();
        self::assertTrue($requestDefaults->getDefaultRequestOptions()['verify']);
    }

    public function testSetConnectTimeout(): void
    {
        $requestDefaults = new RequestDefaults;
        $currentTimeout = $requestDefaults->getDefaultRequestOptions()['connect_timeout'];
        $requestDefaults->setConnectTimeout($currentTimeout + 1);
        self::assertNotSame($currentTimeout, $requestDefaults->getDefaultRequestOptions()['connect_timeout']);
        self::assertSame($currentTimeout + 1, $requestDefaults->getDefaultRequestOptions()['connect_timeout']);
    }

    public function testSetTimeout(): void
    {
        $requestDefaults = new RequestDefaults;
        $currentTimeout = $requestDefaults->getDefaultRequestOptions()['timeout'];
        $requestDefaults->setTimeout($currentTimeout + 1);
        self::assertNotSame($currentTimeout, $requestDefaults->getDefaultRequestOptions()['timeout']);
        self::assertSame($currentTimeout + 1, $requestDefaults->getDefaultRequestOptions()['timeout']);
    }
}
