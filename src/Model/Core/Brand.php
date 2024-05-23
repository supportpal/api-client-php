<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Brand extends BaseModel
{
    public function __construct(
        #[SerializedName('operator_template')]
        public readonly ?string $operatorTemplate,

        #[SerializedName('default_language')]
        public readonly string $defaultLanguage,

        #[SerializedName('favicon')]
        public readonly ?string $favicon,

        #[SerializedName('favicon_dark_mode')]
        public readonly ?string $faviconDarkMode,

        #[SerializedName('smtp_username')]
        public readonly ?string $smtpUsername,

        #[SerializedName('default_country')]
        public readonly string $defaultCountry,

        #[SerializedName('frontend_template_mode')]
        public readonly ?int $frontendTemplateMode,

        #[SerializedName('operator_icon')]
        public readonly ?string $operatorIcon,

        #[SerializedName('enabled')]
        public readonly bool $enabled,

        #[SerializedName('email_method')]
        public readonly string $emailMethod,

        #[SerializedName('system_url')]
        public readonly string $systemUrl,

        #[SerializedName('smtp_port')]
        public readonly ?int $smtpPort,

        #[SerializedName('name')]
        public readonly string $name,

        #[SerializedName('smtp_password')]
        public readonly ?string $smtpPassword,

        #[SerializedName('smtp_requires_auth')]
        public readonly ?bool $smtpRequiresAuth,

        #[SerializedName('enable_ssl')]
        public readonly ?int $enableSsl,

        #[SerializedName('frontend_logo_dark_mode')]
        public readonly ?string $frontendLogoDarkMode,

        #[SerializedName('default_email')]
        public readonly string $defaultEmail,

        #[SerializedName('brand_colour')]
        public readonly ?string $brandColour,

        #[SerializedName('created_at')]
        public readonly int $createdAt,

        #[SerializedName('frontend_template')]
        public readonly string $frontendTemplate,

        #[SerializedName('website_url')]
        public readonly ?string $websiteUrl,

        #[SerializedName('smtp_host')]
        public readonly ?string $smtpHost,

        #[SerializedName('date_format')]
        public readonly string $dateFormat,

        #[SerializedName('time_format')]
        public readonly string $timeFormat,

        #[SerializedName('frontend_logo')]
        public readonly ?string $frontendLogo,

        #[SerializedName('global_email_header')]
        public readonly string $globalEmailHeader,

        #[SerializedName('global_email_footer')]
        public readonly string $globalEmailFooter,

        #[SerializedName('smtp_encryption')]
        public readonly ?string $smtpEncryption,

        #[SerializedName('default_timezone')]
        public readonly string $defaultTimezone,

        #[SerializedName('id')]
        public readonly int $id,

        #[SerializedName('language_toggle')]
        public readonly int $languageToggle,

        #[SerializedName('operator_template_mode')]
        public readonly ?int $operatorTemplateMode,

        #[SerializedName('updated_at')]
        public readonly int $updatedAt,

        /** @var BrandTranslation[]|null */
        #[SerializedName('translations')]
        public readonly ?array $translations,

        #[SerializedName('smtp_auth_mech')]
        public readonly ?string $smtpAuthMech = null,

        #[SerializedName('smtp_oauth')]
        public readonly ?string $smtpOauth = null,

        $pivot = null,
    ) {
        parent::__construct($pivot);
    }
}
