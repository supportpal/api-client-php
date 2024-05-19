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
    private ?string $operatorTemplate;

    #[SerializedName('default_language')]
    private string $defaultLanguage;

    #[SerializedName('favicon')]
    private ?string $favicon;

    #[SerializedName('favicon_dark_mode')]
    private ?string $faviconDarkMode;

    #[SerializedName('smtp_username')]
    private ?string $smtpUsername;

    #[SerializedName('default_country')]
    private string $defaultCountry;

    #[SerializedName('frontend_template_mode')]
    private ?int $frontendTemplateMode;

    #[SerializedName('operator_icon')]
    private ?string $operatorIcon;

    #[SerializedName('enabled')]
    private bool $enabled;

    #[SerializedName('email_method')]
    private string $emailMethod;

    #[SerializedName('system_url')]
    private string $systemUrl;

    #[SerializedName('smtp_port')]
    private ?int $smtpPort;

    #[SerializedName('name')]
    private string $name;

    #[SerializedName('smtp_password')]
    private ?string $smtpPassword;

    #[SerializedName('smtp_requires_auth')]
    private ?bool $smtpRequiresAuth;

    #[SerializedName('enable_ssl')]
    private ?int $enableSsl;

    #[SerializedName('frontend_logo_dark_mode')]
    private ?string $frontendLogoDarkMode;

    #[SerializedName('default_email')]
    private string $defaultEmail;

    #[SerializedName('brand_colour')]
    private ?string $brandColour;

    #[SerializedName('created_at')]
    private int $createdAt;

    #[SerializedName('frontend_template')]
    private string $frontendTemplate;

    #[SerializedName('website_url')]
    private ?string $websiteUrl;

    #[SerializedName('smtp_host')]
    private ?string $smtpHost;

    #[SerializedName('date_format')]
    private string $dateFormat;

    #[SerializedName('time_format')]
    private string $timeFormat;

    #[SerializedName('frontend_logo')]
    private ?string $frontendLogo;

    #[SerializedName('global_email_header')]
    private string $globalEmailHeader;

    #[SerializedName('global_email_footer')]
    private string $globalEmailFooter;

    #[SerializedName('smtp_encryption')]
    private ?string $smtpEncryption;

    #[SerializedName('default_timezone')]
    private string $defaultTimezone;

    #[SerializedName('id')]
    private int $id;

    #[SerializedName('language_toggle')]
    private int $languageToggle;

    #[SerializedName('operator_template_mode')]
    private ?int $operatorTemplateMode;

    #[SerializedName('updated_at')]
    private int $updatedAt;

    /** @var BrandTranslation[]|null */
    #[SerializedName('translations')]
    private ?array $translations;

    #[SerializedName('smtp_auth_mech')]
    private ?string $smtpAuthMech;

    #[SerializedName('smtp_oauth')]
    private ?string $smtpOauth;

    public function getOperatorTemplate(): ?string
    {
        return $this->operatorTemplate;
    }

    public function setOperatorTemplate(?string $operatorTemplate): self
    {
        $this->operatorTemplate = $operatorTemplate;

        return $this;
    }

    public function getDefaultLanguage(): string
    {
        return $this->defaultLanguage;
    }

    public function setDefaultLanguage(string $defaultLanguage): self
    {
        $this->defaultLanguage = $defaultLanguage;

        return $this;
    }

    public function getFavicon(): ?string
    {
        return $this->favicon;
    }

    public function setFavicon(?string $favicon): self
    {
        $this->favicon = $favicon;

        return $this;
    }

    public function getFaviconDarkMode(): ?string
    {
        return $this->faviconDarkMode;
    }

    public function setFaviconDarkMode(?string $favicon): self
    {
        $this->faviconDarkMode = $favicon;

        return $this;
    }

    public function getSmtpUsername(): ?string
    {
        return $this->smtpUsername;
    }

    public function setSmtpUsername(?string $smtpUsername): self
    {
        $this->smtpUsername = $smtpUsername;

        return $this;
    }

    public function getDefaultCountry(): string
    {
        return $this->defaultCountry;
    }

    public function setDefaultCountry(string $defaultCountry): self
    {
        $this->defaultCountry = $defaultCountry;

        return $this;
    }

    public function getFrontendTemplateMode(): ?int
    {
        return $this->frontendTemplateMode;
    }

    public function setFrontendTemplateMode(?int $frontendTemplateMode): self
    {
        $this->frontendTemplateMode = $frontendTemplateMode;

        return $this;
    }

    public function getOperatorIcon(): ?string
    {
        return $this->operatorIcon;
    }

    public function setOperatorIcon(?string $operatorIcon): self
    {
        $this->operatorIcon = $operatorIcon;

        return $this;
    }

    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getEmailMethod(): string
    {
        return $this->emailMethod;
    }

    public function setEmailMethod(string $emailMethod): self
    {
        $this->emailMethod = $emailMethod;

        return $this;
    }

    public function getSystemUrl(): string
    {
        return $this->systemUrl;
    }

    public function setSystemUrl(string $systemUrl): self
    {
        $this->systemUrl = $systemUrl;

        return $this;
    }

    public function getSmtpPort(): ?int
    {
        return $this->smtpPort;
    }

    public function setSmtpPort(?int $smtpPort): self
    {
        $this->smtpPort = $smtpPort;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSmtpPassword(): ?string
    {
        return $this->smtpPassword;
    }

    public function setSmtpPassword(?string $smtpPassword): self
    {
        $this->smtpPassword = $smtpPassword;

        return $this;
    }

    public function getSmtpRequiresAuth(): ?bool
    {
        return $this->smtpRequiresAuth;
    }

    public function setSmtpRequiresAuth(?bool $smtpRequiresAuth): self
    {
        $this->smtpRequiresAuth = $smtpRequiresAuth;

        return $this;
    }

    public function getEnableSsl(): ?int
    {
        return $this->enableSsl;
    }

    public function setEnableSsl(?int $enableSsl): self
    {
        $this->enableSsl = $enableSsl;

        return $this;
    }

    public function getFrontendLogoDarkMode(): ?string
    {
        return $this->frontendLogoDarkMode;
    }

    public function setFrontendLogoDarkMode(?string $frontendLogoDarkMode): self
    {
        $this->frontendLogoDarkMode = $frontendLogoDarkMode;

        return $this;
    }

    public function getDefaultEmail(): string
    {
        return $this->defaultEmail;
    }

    public function setDefaultEmail(string $defaultEmail): self
    {
        $this->defaultEmail = $defaultEmail;

        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFrontendTemplate(): string
    {
        return $this->frontendTemplate;
    }

    public function setFrontendTemplate(string $frontendTemplate): self
    {
        $this->frontendTemplate = $frontendTemplate;

        return $this;
    }

    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl(?string $websiteUrl): self
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    public function getSmtpHost(): ?string
    {
        return $this->smtpHost;
    }

    public function setSmtpHost(?string $smtpHost): self
    {
        $this->smtpHost = $smtpHost;

        return $this;
    }

    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    public function setDateFormat(string $dateFormat): self
    {
        $this->dateFormat = $dateFormat;

        return $this;
    }

    public function getTimeFormat(): string
    {
        return $this->timeFormat;
    }

    public function setTimeFormat(string $timeFormat): self
    {
        $this->timeFormat = $timeFormat;

        return $this;
    }

    public function getFrontendLogo(): ?string
    {
        return $this->frontendLogo;
    }

    public function setFrontendLogo(?string $frontendLogo): self
    {
        $this->frontendLogo = $frontendLogo;

        return $this;
    }

    public function getGlobalEmailHeader(): string
    {
        return $this->globalEmailHeader;
    }

    public function setGlobalEmailHeader(string $globalEmailHeader): self
    {
        $this->globalEmailHeader = $globalEmailHeader;

        return $this;
    }

    public function getGlobalEmailFooter(): string
    {
        return $this->globalEmailFooter;
    }

    public function setGlobalEmailFooter(string $globalEmailFooter): self
    {
        $this->globalEmailFooter = $globalEmailFooter;

        return $this;
    }

    public function getSmtpEncryption(): ?string
    {
        return $this->smtpEncryption;
    }

    public function setSmtpEncryption(?string $smtpEncryption): self
    {
        $this->smtpEncryption = $smtpEncryption;

        return $this;
    }

    public function getDefaultTimezone(): string
    {
        return $this->defaultTimezone;
    }

    public function setDefaultTimezone(string $defaultTimezone): self
    {
        $this->defaultTimezone = $defaultTimezone;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getLanguageToggle(): int
    {
        return $this->languageToggle;
    }

    public function setLanguageToggle(int $languageToggle): self
    {
        $this->languageToggle = $languageToggle;

        return $this;
    }

    public function getOperatorTemplateMode(): ?int
    {
        return $this->operatorTemplateMode;
    }

    public function setOperatorTemplateMode(?int $operatorTemplateMode): self
    {
        $this->operatorTemplateMode = $operatorTemplateMode;

        return $this;
    }

    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getBrandColour(): ?string
    {
        return $this->brandColour;
    }

    public function setBrandColour(?string $brandColour): Brand
    {
        $this->brandColour = $brandColour;

        return $this;
    }

    /**
     * @return BrandTranslation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param BrandTranslation[]|null $translations
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }

    public function getSmtpAuthMech(): ?string
    {
        return $this->smtpAuthMech;
    }

    public function setSmtpAuthMech(?string $smtpAuthMech): self
    {
        $this->smtpAuthMech = $smtpAuthMech;

        return $this;
    }

    public function getSmtpOauth(): ?string
    {
        return $this->smtpOauth;
    }

    public function setSmtpOauth(?string $smtpOauth): self
    {
        $this->smtpOauth = $smtpOauth;

        return $this;
    }
}
