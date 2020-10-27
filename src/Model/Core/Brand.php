<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Core;

use SupportPal\ApiClient\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

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

    /**
     * @var string|null
     * @SerializedName("operator_template")
     */
    private $operatorTemplate;

    /**
     * @var string
     * @SerializedName("default_language")
     */
    private $defaultLanguage;

    /**
     * @var string|null
     * @SerializedName("favicon")
     */
    private $favicon;

    /**
     * @var string|null
     * @SerializedName("smtp_username")
     */
    private $smtpUsername;

    /**
     * @var string
     * @SerializedName("default_country")
     */
    private $defaultCountry;

    /**
     * @var bool
     * @SerializedName("frontend_template_mode")
     */
    private $frontendTemplateMode;

    /**
     * @var string|null
     * @SerializedName("operator_icon")
     */
    private $operatorIcon;

    /**
     * @var bool
     * @SerializedName("enabled")
     */
    private $enabled;

    /**
     * @var string
     * @SerializedName("email_method")
     */
    private $emailMethod;

    /**
     * @var string
     * @SerializedName("system_url")
     */
    private $systemUrl;

    /**
     * @var int|null
     * @SerializedName("smtp_port")
     */
    private $smtpPort;

    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var string|null
     * @SerializedName("smtp_password")
     */
    private $smtpPassword;

    /**
     * @var bool|null
     * @SerializedName("smtp_requires_auth")
     */
    private $smtpRequiresAuth;

    /**
     * @var bool|null
     * @SerializedName("enable_ssl")
     */
    private $enableSsl;

    /**
     * @var string|null
     * @SerializedName("frontend_logo_dark_mode")
     */
    private $frontendLogoDarkMode;

    /**
     * @var string
     * @SerializedName("default_email")
     */
    private $defaultEmail;

    /**
     * @var string|null
     * @SerializedName("brand_colour")
     */
    private $brandColour;

    /**
     * @var int
     * @SerializedName("created_at")
     */
    private $createdAt;

    /**
     * @var string
     * @SerializedName("frontend_template")
     */
    private $frontendTemplate;

    /**
     * @var string|null
     * @SerializedName("website_url")
     */
    private $websiteUrl;

    /**
     * @var string|null
     * @SerializedName("smtp_host")
     */
    private $smtpHost;

    /**
     * @var string
     * @SerializedName("date_format")
     */
    private $dateFormat;

    /**
     * @var string
     * @SerializedName("time_format")
     */
    private $timeFormat;

    /**
     * @var string|null
     * @SerializedName("frontend_logo")
     */
    private $frontendLogo;

    /**
     * @var string
     * @SerializedName("global_email_header")
     */
    private $globalEmailHeader;

    /**
     * @var string
     * @SerializedName("global_email_footer")
     */
    private $globalEmailFooter;

    /**
     * @var string|null
     * @SerializedName("smtp_encryption")
     */
    private $smtpEncryption;

    /**
     * @var string
     * @SerializedName("default_timezone")
     */
    private $defaultTimezone;

    /**
     * @var int|null
     * @SerializedName("id")
     */
    private $id;

    /**
     * @var int
     * @SerializedName("language_toggle")
     */
    private $languageToggle;

    /**
     * @var bool
     * @SerializedName("operator_template_mode")
     */
    private $operatorTemplateMode;

    /**
     * @var int
     * @SerializedName("updated_at")
     */
    private $updatedAt;

    /**
     * @var BrandTranslation[]|null
     * @SerializedName("translations")
     */
    private $translations;

    /**
     * @return string|null
     */
    public function getOperatorTemplate(): ?string
    {
        return $this->operatorTemplate;
    }

    /**
     * @param string|null $operatorTemplate
     * @return self
     */
    public function setOperatorTemplate(?string $operatorTemplate): self
    {
        $this->operatorTemplate = $operatorTemplate;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultLanguage(): string
    {
        return $this->defaultLanguage;
    }

    /**
     * @param string $defaultLanguage
     * @return self
     */
    public function setDefaultLanguage(string $defaultLanguage): self
    {
        $this->defaultLanguage = $defaultLanguage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFavicon(): ?string
    {
        return $this->favicon;
    }

    /**
     * @param string|null $favicon
     * @return self
     */
    public function setFavicon(?string $favicon): self
    {
        $this->favicon = $favicon;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSmtpUsername(): ?string
    {
        return $this->smtpUsername;
    }

    /**
     * @param string|null $smtpUsername
     * @return self
     */
    public function setSmtpUsername(?string $smtpUsername): self
    {
        $this->smtpUsername = $smtpUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultCountry(): string
    {
        return $this->defaultCountry;
    }

    /**
     * @param string $defaultCountry
     * @return self
     */
    public function setDefaultCountry(string $defaultCountry): self
    {
        $this->defaultCountry = $defaultCountry;

        return $this;
    }

    /**
     * @return bool
     */
    public function getFrontendTemplateMode(): bool
    {
        return $this->frontendTemplateMode;
    }

    /**
     * @param bool $frontendTemplateMode
     * @return self
     */
    public function setFrontendTemplateMode(bool $frontendTemplateMode): self
    {
        $this->frontendTemplateMode = $frontendTemplateMode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOperatorIcon(): ?string
    {
        return $this->operatorIcon;
    }

    /**
     * @param string|null $operatorIcon
     * @return self
     */
    public function setOperatorIcon(?string $operatorIcon): self
    {
        $this->operatorIcon = $operatorIcon;

        return $this;
    }

    /**
     * @return bool
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return self
     */
    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailMethod(): string
    {
        return $this->emailMethod;
    }

    /**
     * @param string $emailMethod
     * @return self
     */
    public function setEmailMethod(string $emailMethod): self
    {
        $this->emailMethod = $emailMethod;

        return $this;
    }

    /**
     * @return string
     */
    public function getSystemUrl(): string
    {
        return $this->systemUrl;
    }

    /**
     * @param string $systemUrl
     * @return self
     */
    public function setSystemUrl(string $systemUrl): self
    {
        $this->systemUrl = $systemUrl;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSmtpPort(): ?int
    {
        return $this->smtpPort;
    }

    /**
     * @param int|null $smtpPort
     * @return self
     */
    public function setSmtpPort(?int $smtpPort): self
    {
        $this->smtpPort = $smtpPort;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSmtpPassword(): ?string
    {
        return $this->smtpPassword;
    }

    /**
     * @param string|null $smtpPassword
     * @return self
     */
    public function setSmtpPassword(?string $smtpPassword): self
    {
        $this->smtpPassword = $smtpPassword;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSmtpRequiresAuth(): ?bool
    {
        return $this->smtpRequiresAuth;
    }

    /**
     * @param bool|null $smtpRequiresAuth
     * @return self
     */
    public function setSmtpRequiresAuth(?bool $smtpRequiresAuth): self
    {
        $this->smtpRequiresAuth = $smtpRequiresAuth;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEnableSsl(): ?bool
    {
        return $this->enableSsl;
    }

    /**
     * @param bool|null $enableSsl
     * @return self
     */
    public function setEnableSsl(?bool $enableSsl): self
    {
        $this->enableSsl = $enableSsl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFrontendLogoDarkMode(): ?string
    {
        return $this->frontendLogoDarkMode;
    }

    /**
     * @param string|null $frontendLogoDarkMode
     * @return self
     */
    public function setFrontendLogoDarkMode(?string $frontendLogoDarkMode): self
    {
        $this->frontendLogoDarkMode = $frontendLogoDarkMode;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultEmail(): string
    {
        return $this->defaultEmail;
    }

    /**
     * @param string $defaultEmail
     * @return self
     */
    public function setDefaultEmail(string $defaultEmail): self
    {
        $this->defaultEmail = $defaultEmail;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     * @return self
     */
    public function setCreatedAt(int $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getFrontendTemplate(): string
    {
        return $this->frontendTemplate;
    }

    /**
     * @param string $frontendTemplate
     * @return self
     */
    public function setFrontendTemplate(string $frontendTemplate): self
    {
        $this->frontendTemplate = $frontendTemplate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    /**
     * @param string|null $websiteUrl
     * @return self
     */
    public function setWebsiteUrl(?string $websiteUrl): self
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSmtpHost(): ?string
    {
        return $this->smtpHost;
    }

    /**
     * @param string|null $smtpHost
     * @return self
     */
    public function setSmtpHost(?string $smtpHost): self
    {
        $this->smtpHost = $smtpHost;

        return $this;
    }

    /**
     * @return string
     */
    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    /**
     * @param string $dateFormat
     * @return self
     */
    public function setDateFormat(string $dateFormat): self
    {
        $this->dateFormat = $dateFormat;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeFormat(): string
    {
        return $this->timeFormat;
    }

    /**
     * @param string $timeFormat
     * @return self
     */
    public function setTimeFormat(string $timeFormat): self
    {
        $this->timeFormat = $timeFormat;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFrontendLogo(): ?string
    {
        return $this->frontendLogo;
    }

    /**
     * @param string|null $frontendLogo
     * @return self
     */
    public function setFrontendLogo(?string $frontendLogo): self
    {
        $this->frontendLogo = $frontendLogo;

        return $this;
    }

    /**
     * @return string
     */
    public function getGlobalEmailHeader(): string
    {
        return $this->globalEmailHeader;
    }

    /**
     * @param string $globalEmailHeader
     * @return self
     */
    public function setGlobalEmailHeader(string $globalEmailHeader): self
    {
        $this->globalEmailHeader = $globalEmailHeader;

        return $this;
    }

    /**
     * @return string
     */
    public function getGlobalEmailFooter(): string
    {
        return $this->globalEmailFooter;
    }

    /**
     * @param string $globalEmailFooter
     * @return self
     */
    public function setGlobalEmailFooter(string $globalEmailFooter): self
    {
        $this->globalEmailFooter = $globalEmailFooter;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSmtpEncryption(): ?string
    {
        return $this->smtpEncryption;
    }

    /**
     * @param string|null $smtpEncryption
     * @return self
     */
    public function setSmtpEncryption(?string $smtpEncryption): self
    {
        $this->smtpEncryption = $smtpEncryption;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultTimezone(): string
    {
        return $this->defaultTimezone;
    }

    /**
     * @param string $defaultTimezone
     * @return self
     */
    public function setDefaultTimezone(string $defaultTimezone): self
    {
        $this->defaultTimezone = $defaultTimezone;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getLanguageToggle(): int
    {
        return $this->languageToggle;
    }

    /**
     * @param int $languageToggle
     * @return self
     */
    public function setLanguageToggle(int $languageToggle): self
    {
        $this->languageToggle = $languageToggle;

        return $this;
    }

    /**
     * @return bool
     */
    public function getOperatorTemplateMode(): bool
    {
        return $this->operatorTemplateMode;
    }

    /**
     * @param bool $operatorTemplateMode
     * @return self
     */
    public function setOperatorTemplateMode(bool $operatorTemplateMode): self
    {
        $this->operatorTemplateMode = $operatorTemplateMode;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpdatedAt(): int
    {
        return $this->updatedAt;
    }

    /**
     * @param int $updatedAt
     * @return self
     */
    public function setUpdatedAt(int $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBrandColour(): ?string
    {
        return $this->brandColour;
    }

    /**
     * @param string|null $brandColour
     * @return Brand
     */
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
     * @return self
     */
    public function setTranslations(?array $translations): self
    {
        $this->translations = $translations;

        return $this;
    }
}
