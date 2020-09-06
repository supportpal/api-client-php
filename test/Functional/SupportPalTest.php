<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Functional;

use GuzzleHttp\Psr7\Response;
use SupportPal\ApiClient\Exception\HttpResponseException;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\ApiAwareBaseTestClass;

class SupportPalTest extends ApiAwareBaseTestClass
{

    private const SUCCESSFUL_RESPONSE_BODY = [
        'status' => 'success',
        'message' => null,
        'data' => [
            'admin_folder' => 'admin',
            'date_format' => 'd/m/Y',
            'default_country' => 'AF',
            'default_frontend_language' => 'en',
            'default_operator_language' => 'en',
            'default_timezone' => 'Europe/London',
            'enable_ssl' => '0',
            'frontend_language' => '1',
            'is_installed' => '1',
            'language_frontend_toggle' => '1',
            'language_operator_toggle' => '1',
            'maintenance_mode' => '0',
            'operator_language' => '1',
            'operator_template' => 'default',
            'simpleauth_key' => 'QkW6FbF5MXwEgbpoFlw2qSIZ1Mr3Q8of',
            'time_format' => 'g =>i A',
            'simpleauth_operators' => '1',
            'debug_mode' => '1',
            'pretty_urls' => '1',
            'default_brand' => '1',
            'attachment_size' => '10M',
            'captcha_type' => '1',
            'upgrade_time' => '1597245403',
            'last_email_log_id' => '',
            'installed_version' => '3.2.0',
            'install_time' => '1597245408',
            'include_operator_name' => '0',
            'include_department_name' => '0',
            'email_method' => 'mail',
            'smtp_host' => '',
            'smtp_port' => '',
            'smtp_encryption' => '',
            'smtp_requires_auth' => '',
            'smtp_username' => '',
            'smtp_password' => '',
            'include_locale_in_uri' => '1',
            'recaptcha_site_key' => '',
            'recaptcha_secret_key' => ''
        ]
    ];
        
    public function testSuccessfulGetCoreSettings(): void
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode(self::SUCCESSFUL_RESPONSE_BODY);
        $this->appendRequestResponse(new Response(200, [], $jsonSuccessfulBody));
        $coreSettings = $this->getSupportPal()->getApi()->getCoreSettings();
        self::assertInstanceOf(CoreSettings::class, $coreSettings);
        foreach (self::SUCCESSFUL_RESPONSE_BODY['data'] as $key => $value) {
            self::assertSame($value, $coreSettings->{'get'.$this->snakeCaseToPascalCase($key)}());
        }
    }

    /**
     * @param Response $response
     * @dataProvider provideUnsuccessfulResponseCases
     * @throws \Exception
     */
    public function testUnsuccessfulGetCoreSettings(Response $response): void
    {
        $this->appendRequestResponse($response);
        self::expectException(HttpResponseException::class);
        self::expectExceptionMessage(json_decode((string) $response->getBody(), true)['status']);
        $this->getSupportPal()->getApi()->getCoreSettings();
    }

    /**
     * @return iterable<array<string, Response>>
     */
    public function provideUnsuccessfulResponseCases(): iterable
    {
        /** @var string $jsonSuccessfulBody */
        $jsonSuccessfulBody = json_encode(self::SUCCESSFUL_RESPONSE_BODY);
        yield ['error 400 response' => new Response(400, [], $jsonSuccessfulBody)];
        yield ['error 401 response' => new Response(401, [], $jsonSuccessfulBody)];
        yield ['error 403 response' => new Response(403, [], $jsonSuccessfulBody)];
        yield ['error 404 response' => new Response(404, [], $jsonSuccessfulBody)];

        /** @var string $jsonErrorBody */
        $jsonErrorBody = json_encode($this->getResponseWithErrorInStatus());
        yield [
            'error status response' => new Response(200, [], $jsonErrorBody)
        ];
    }

    /**
     * @return array<mixed>
     */
    private function getResponseWithErrorInStatus(): array
    {
        $errorResponseArray = self::SUCCESSFUL_RESPONSE_BODY;
        $errorResponseArray['status'] = 'error';
        return $errorResponseArray;
    }
}
