<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Tests\Integration\Factory;

use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Exception\MissingRequiredFieldsException;
use SupportPal\ApiClient\Factory\ModelCollectionFactory;
use SupportPal\ApiClient\Model\Comment;
use SupportPal\ApiClient\Model\CoreSettings;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\CommentData;

class ModelCollectionFactoryTest extends ContainerAwareBaseTestCase
{

    /**
     * @var array<mixed>
     */
    private $commentData = CommentData::COMMENT_DATA;

    /**
     * @var ModelCollectionFactory
     */
    private $modelCollectionFactory;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var ModelCollectionFactory $modelCollection */
        $modelCollection = $this->getContainer()->get(ModelCollectionFactory::class);
        $this->modelCollectionFactory = $modelCollection;
    }

    /**
     * @param array<mixed> $data
     * @param string $model
     * @dataProvider provideValidModelData
     */
    public function testCreateValidModel(array $data, string $model): void
    {
        $model = $this->modelCollectionFactory->create($model, $data);
        foreach ($data as $key => $value) {
            self::assertSame($value, $model->{'get'.$this->snakeCaseToPascalCase($key)}());
        }
    }

    /**
     * @dataProvider provideDataWithInvalidTypes
     * @param array<mixed> $data
     * @param string $invalidKey
     */
    public function testCreateWithInvalidTypes(array $data, string $model, string $invalidKey): void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage($this->snakeCaseToCamelCase($invalidKey));
        $this->modelCollectionFactory->create($model, $data);
    }

    /**
     * @dataProvider provideDataWithMissingFields
     * @param array<mixed> $data
     * @param string $missingKey
     */
    public function testCreateWithMissingFields(array $data, string $model, string $missingKey): void
    {
        self::expectException(MissingRequiredFieldsException::class);
        self::expectExceptionMessage($missingKey);
        $this->modelCollectionFactory->create($model, $data);
    }


    /**
     * @return iterable<mixed>
     */
    public function provideValidModelData(): iterable
    {
        yield [
            $this->commentData,
            Comment::class
        ];

        yield [
            [
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
            ],
            CoreSettings::class
        ];
    }

    /**
     * @return iterable<mixed>
     */
    public function provideDataWithInvalidTypes(): iterable
    {
        $InvalidCommentData = [
            'text' => new \stdClass,
            'article_id' => 'text',
            'type_id' => 'text',
            'parent_id' => 'text',
            'status' => 'text',
            'notify_reply' => null
        ];
        foreach ($InvalidCommentData as $key => $value) {
            $commentDataCopy = $this->commentData;
            $commentDataCopy[$key] = $value;
            yield [$commentDataCopy, Comment::class, $key];
        }
    }

    /**
     * @return iterable<mixed>
     */
    public function provideDataWithMissingFields(): iterable
    {
        foreach (Comment::REQUIRED_FIELDS as $required) {
            $commentData = $this->commentData;
            unset($commentData[$required]);
            yield [$commentData, Comment::class, $required];
        }
    }
}
