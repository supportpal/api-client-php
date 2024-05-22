<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Brand extends BaseModel
{
    public const REQUIRED_FIELDS = [
        'default_language',
        'default_country',
        'frontend_template_mode',
        'enabled',
        'email_method',
        'system_url',
        'name',
        'default_email',
        'created_at',
        'frontend_template',
        'date_format',
        'time_format',
        'global_email_header',
        'global_email_footer',
        'default_timezone',
        'language_toggle',
        'operator_template_mode',
        'updated_at'
    ];

    #[SerializedName('operator_template')]
    protected ?string $operatorTemplate;

    #[SerializedName('default_language')]
    protected string $defaultLanguage;

    #[SerializedName('favicon')]
    protected ?string $favicon;

    #[SerializedName('favicon_dark_mode')]
    protected ?string $faviconDarkMode;

    #[SerializedName('smtp_username')]
    protected ?string $smtpUsername;

    #[SerializedName('default_country')]
    protected string $defaultCountry;

    #[SerializedName('frontend_template_mode')]
    protected ?int $frontendTemplateMode;

    #[SerializedName('operator_icon')]
    protected ?string $operatorIcon;

    #[SerializedName('enabled')]
    protected bool $enabled;

    #[SerializedName('email_method')]
    protected string $emailMethod;

    #[SerializedName('system_url')]
    protected string $systemUrl;

    #[SerializedName('smtp_port')]
    protected ?int $smtpPort;

    #[SerializedName('name')]
    protected string $name;

    #[SerializedName('smtp_password')]
    protected ?string $smtpPassword;

    #[SerializedName('smtp_requires_auth')]
    protected ?bool $smtpRequiresAuth;

    #[SerializedName('enable_ssl')]
    protected ?int $enableSsl;

    #[SerializedName('frontend_logo_dark_mode')]
    protected ?string $frontendLogoDarkMode;

    #[SerializedName('default_email')]
    protected string $defaultEmail;

    #[SerializedName('brand_colour')]
    protected ?string $brandColour;

    #[SerializedName('created_at')]
    protected int $createdAt;

    #[SerializedName('frontend_template')]
    protected string $frontendTemplate;

    #[SerializedName('website_url')]
    protected ?string $websiteUrl;

    #[SerializedName('smtp_host')]
    protected ?string $smtpHost;

    #[SerializedName('date_format')]
    protected string $dateFormat;

    #[SerializedName('time_format')]
    protected string $timeFormat;

    #[SerializedName('frontend_logo')]
    protected ?string $frontendLogo;

    #[SerializedName('global_email_header')]
    protected string $globalEmailHeader;

    #[SerializedName('global_email_footer')]
    protected string $globalEmailFooter;

    #[SerializedName('smtp_encryption')]
    protected ?string $smtpEncryption;

    #[SerializedName('default_timezone')]
    protected string $defaultTimezone;

    #[SerializedName('id')]
    protected int $id;

    #[SerializedName('language_toggle')]
    protected int $languageToggle;

    #[SerializedName('operator_template_mode')]
    protected ?int $operatorTemplateMode;

    #[SerializedName('updated_at')]
    protected int $updatedAt;

    /** @var BrandTranslation[]|null */
    #[SerializedName('translations')]
    protected ?array $translations;

    #[SerializedName('smtp_auth_mech')]
    protected ?string $smtpAuthMech = null;

    #[SerializedName('smtp_oauth')]
    protected ?string $smtpOauth = null;

    public function getOperatorTemplate(): ?string
    {
        return $this->operatorTemplate;
    }

    public function getDefaultLanguage(): string
    {
        return $this->defaultLanguage;
    }

    public function getFavicon(): ?string
    {
        return $this->favicon;
    }

    public function getFaviconDarkMode(): ?string
    {
        return $this->faviconDarkMode;
    }

    public function getSmtpUsername(): ?string
    {
        return $this->smtpUsername;
    }

    public function getDefaultCountry(): string
    {
        return $this->defaultCountry;
    }

    public function getFrontendTemplateMode(): ?int
    {
        return $this->frontendTemplateMode;
    }

    public function getOperatorIcon(): ?string
    {
        return $this->operatorIcon;
    }

    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function getEmailMethod(): string
    {
        return $this->emailMethod;
    }

    public function getSystemUrl(): string
    {
        return $this->systemUrl;
    }

    public function getSmtpPort(): ?int
    {
        return $this->smtpPort;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSmtpPassword(): ?string
    {
        return $this->smtpPassword;
    }

    public function getSmtpRequiresAuth(): ?bool
    {
        return $this->smtpRequiresAuth;
    }

    public function getEnableSsl(): ?int
    {
        return $this->enableSsl;
    }

    public function getFrontendLogoDarkMode(): ?string
    {
        return $this->frontendLogoDarkMode;
    }

    public function getDefaultEmail(): string
    {
        return $this->defaultEmail;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getFrontendTemplate(): string
    {
        return $this->frontendTemplate;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    public function getSmtpHost(): ?string
    {
        return $this->smtpHost;
    }

    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    public function getTimeFormat(): string
    {
        return $this->timeFormat;
    }

    public function getFrontendLogo(): ?string
    {
        return $this->frontendLogo;
    }

    public function getGlobalEmailHeader(): string
    {
        return $this->globalEmailHeader;
    }

    public function getGlobalEmailFooter(): string
    {
        return $this->globalEmailFooter;
    }

    public function getSmtpEncryption(): ?string
    {
        return $this->smtpEncryption;
    }

    public function getDefaultTimezone(): string
    {
        return $this->defaultTimezone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLanguageToggle(): int
    {
        return $this->languageToggle;
    }

    public function getOperatorTemplateMode(): ?int
    {
        return $this->operatorTemplateMode;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function getBrandColour(): ?string
    {
        return $this->brandColour;
    }

    /**
     * @return BrandTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    public function getSmtpAuthMech(): ?string
    {
        return $this->smtpAuthMech;
    }

    public function getSmtpOauth(): ?string
    {
        return $this->smtpOauth;
    }
}
