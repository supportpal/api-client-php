<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * This data class defines the self model data attributes
 * Class self
 * @package SupportPal\ApiClient\Model
 */
class CoreSettings extends BaseModel implements Model
{
    /**
     * @var string
     * @SerializedName("admin_folder")
     */
    private $adminFolder;

    /**
     * @var string
     * @SerializedName("date_format")
     */
    private $dateFormat;

    /**
     * @var string
     * @SerializedName("default_country")
     */
    private $defaultCountry;
    /**
     * @var string
     * @SerializedName("default_frontend_language")
     */
    private $defaultFrontendLanguage;
    /**
     * @var string
     * @SerializedName("default_operator_language")
     */
    private $defaultOperatorLanguage;
    /**
     * @var string
     * @SerializedName("default_timezone")
     */
    private $defaultTimezone;
    /**
     * @var string
     * @SerializedName("enable_ssl")
     */
    private $enableSsl;

    /**
     * @var string
     * @SerializedName("frontend_language")
     */
    private $frontendLanguage;
    /**
     * @var string
     * @SerializedName("is_installed")
     */
    private $isInstalled;
    /**
     * @var string
     * @SerializedName("language_frontend_toggle")
     */
    private $languageFrontendToggle;
    /**
     * @var string
     * @SerializedName("language_operator_toggle")
     */
    private $languageOperatorToggle;
    /**
     * @var string
     * @SerializedName("maintenance_mode")
     */
    private $maintenanceMode;
    /**
     * @var string
     * @SerializedName("operator_language")
     */
    private $operatorLanguage;
    /**
     * @var string
     * @SerializedName("operator_template")
     */
    private $operatorTemplate;
    /**
     * @var string
     * @SerializedName("simpleauth_key")
     */
    private $simpleauthKey;

    /**
     * @var string
     * @SerializedName("time_format")
     */
    private $timeFormat;

    /**
     * @var string
     * @SerializedName("simpleauth_operators")
     */
    private $simpleauthOperators;
    /**
     * @var string
     * @SerializedName("debug_mode")
     */
    private $debugMode;
    /**
     * @var string
     * @SerializedName("pretty_urls")
     */
    private $prettyUrls;

    /**
     * @var string
     * @SerializedName("default_brand")
     */
    private $defaultBrand;
    /**
     * @var string
     * @SerializedName("attachment_size")
     */
    private $attachmentSize;

    /**
     * @var string
     * @SerializedName("captcha_type")
     */
    private $captchaType;

    /**
     * @var string
     * @SerializedName("upgrade_time")
     */
    private $upgradeTime;
    /**
     * @var string
     * @SerializedName("last_email_log_id")
     */
    private $lastEmailLogId;
    /**
     * @var string
     * @SerializedName("installed_version")
     */
    private $installedVersion;
    /**
     * @var string
     * @SerializedName("install_time")
     */
    private $installTime;
    /**
     * @var string
     * @SerializedName("include_operator_name")
     */
    private $includeOperatorName;
    /**
     * @var string
     * @SerializedName("include_department_name")
     */
    private $includeDepartmentName;
    /**
     * @var string
     * @SerializedName("email_method")
     */
    private $emailMethod;
    /**
     * @var string
     * @SerializedName("smtp_host")
     */
    private $smtpHost;

    /**
     * @var string
     * @SerializedName("smtp_port")
     */
    private $smtpPort;

    /**
     * @var string
     * @SerializedName("smtp_encryption")
     */
    private $smtpEncryption;
    /**
     * @var string
     * @SerializedName("smtp_requires_auth")
     */
    private $smtpRequiresAuth;
    /**
     * @var string
     * @SerializedName("smtp_username")
     */
    private $smtpUsername;
    /**
     * @var string
     * @SerializedName("smtp_password")
     */
    private $smtpPassword;

    /**
     * @var string
     * @SerializedName("include_locale_in_uri")
     */
    private $includeLocaleInUri;
    /**
     * @var string
     * @SerializedName("recaptcha_site_key")
     */
    private $recaptchaSiteKey;
    /**
     * @var string
     * @SerializedName("recaptcha_secret_key")
     */
    private $recaptchaSecretKey;

    /**
     * @return string
     */
    public function getAdminFolder(): string
    {
        return $this->adminFolder;
    }

    /**
     * @param string $adminFolder
     * @return self
     */
    public function setAdminFolder(string $adminFolder): self
    {
        $this->adminFolder = $adminFolder;
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
     * @return string
     */
    public function getDefaultFrontendLanguage(): string
    {
        return $this->defaultFrontendLanguage;
    }

    /**
     * @param string $defaultFrontendLanguage
     * @return self
     */
    public function setDefaultFrontendLanguage(string $defaultFrontendLanguage): self
    {
        $this->defaultFrontendLanguage = $defaultFrontendLanguage;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultOperatorLanguage(): string
    {
        return $this->defaultOperatorLanguage;
    }

    /**
     * @param string $defaultOperatorLanguage
     * @return self
     */
    public function setDefaultOperatorLanguage(string $defaultOperatorLanguage): self
    {
        $this->defaultOperatorLanguage = $defaultOperatorLanguage;
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
     * @return string
     */
    public function getEnableSsl(): string
    {
        return $this->enableSsl;
    }

    /**
     * @param string $enableSsl
     * @return self
     */
    public function setEnableSsl(string $enableSsl): self
    {
        $this->enableSsl = $enableSsl;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrontendLanguage(): string
    {
        return $this->frontendLanguage;
    }

    /**
     * @param string $frontendLanguage
     * @return self
     */
    public function setFrontendLanguage(string $frontendLanguage): self
    {
        $this->frontendLanguage = $frontendLanguage;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsInstalled(): string
    {
        return $this->isInstalled;
    }

    /**
     * @param string $isInstalled
     * @return self
     */
    public function setIsInstalled(string $isInstalled): self
    {
        $this->isInstalled = $isInstalled;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageFrontendToggle(): string
    {
        return $this->languageFrontendToggle;
    }

    /**
     * @param string $languageFrontendToggle
     * @return self
     */
    public function setLanguageFrontendToggle(string $languageFrontendToggle): self
    {
        $this->languageFrontendToggle = $languageFrontendToggle;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageOperatorToggle(): string
    {
        return $this->languageOperatorToggle;
    }

    /**
     * @param string $languageOperatorToggle
     * @return self
     */
    public function setLanguageOperatorToggle(string $languageOperatorToggle): self
    {
        $this->languageOperatorToggle = $languageOperatorToggle;
        return $this;
    }

    /**
     * @return string
     */
    public function getMaintenanceMode(): string
    {
        return $this->maintenanceMode;
    }

    /**
     * @param string $maintenanceMode
     * @return self
     */
    public function setMaintenanceMode(string $maintenanceMode): self
    {
        $this->maintenanceMode = $maintenanceMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperatorLanguage(): string
    {
        return $this->operatorLanguage;
    }

    /**
     * @param string $operatorLanguage
     * @return self
     */
    public function setOperatorLanguage(string $operatorLanguage): self
    {
        $this->operatorLanguage = $operatorLanguage;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperatorTemplate(): string
    {
        return $this->operatorTemplate;
    }

    /**
     * @param string $operatorTemplate
     * @return self
     */
    public function setOperatorTemplate(string $operatorTemplate): self
    {
        $this->operatorTemplate = $operatorTemplate;
        return $this;
    }

    /**
     * @return string
     */
    public function getSimpleauthKey(): string
    {
        return $this->simpleauthKey;
    }

    /**
     * @param string $simpleauthKey
     * @return $this
     */
    public function setSimpleauthKey(string $simpleauthKey): self
    {
        $this->simpleauthKey = $simpleauthKey;
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
     * @return string
     */
    public function getSimpleauthOperators(): string
    {
        return $this->simpleauthOperators;
    }

    /**
     * @param string $simpleauthOperators
     * @return self
     */
    public function setSimpleauthOperators(string $simpleauthOperators): self
    {
        $this->simpleauthOperators = $simpleauthOperators;
        return $this;
    }

    /**
     * @return string
     */
    public function getDebugMode(): string
    {
        return $this->debugMode;
    }

    /**
     * @param string $debugMode
     * @return self
     */
    public function setDebugMode(string $debugMode): self
    {
        $this->debugMode = $debugMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrettyUrls(): string
    {
        return $this->prettyUrls;
    }

    /**
     * @param string $prettyUrls
     * @return self
     */
    public function setPrettyUrls(string $prettyUrls): self
    {
        $this->prettyUrls = $prettyUrls;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultBrand(): string
    {
        return $this->defaultBrand;
    }

    /**
     * @param string $defaultBrand
     * @return self
     */
    public function setDefaultBrand(string $defaultBrand): self
    {
        $this->defaultBrand = $defaultBrand;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttachmentSize(): string
    {
        return $this->attachmentSize;
    }

    /**
     * @param string $attachmentSize
     * @return self
     */
    public function setAttachmentSize(string $attachmentSize): self
    {
        $this->attachmentSize = $attachmentSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaptchaType(): string
    {
        return $this->captchaType;
    }

    /**
     * @param string $captchaType
     * @return self
     */
    public function setCaptchaType(string $captchaType): self
    {
        $this->captchaType = $captchaType;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpgradeTime(): string
    {
        return $this->upgradeTime;
    }

    /**
     * @param string $upgradeTime
     * @return self
     */
    public function setUpgradeTime(string $upgradeTime): self
    {
        $this->upgradeTime = $upgradeTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastEmailLogId(): string
    {
        return $this->lastEmailLogId;
    }

    /**
     * @param string $lastEmailLogId
     * @return self
     */
    public function setLastEmailLogId(string $lastEmailLogId): self
    {
        $this->lastEmailLogId = $lastEmailLogId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInstalledVersion(): string
    {
        return $this->installedVersion;
    }

    /**
     * @param string $installedVersion
     * @return self
     */
    public function setInstalledVersion(string $installedVersion): self
    {
        $this->installedVersion = $installedVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getInstallTime(): string
    {
        return $this->installTime;
    }

    /**
     * @param string $installTime
     * @return self
     */
    public function setInstallTime(string $installTime): self
    {
        $this->installTime = $installTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getIncludeOperatorName(): string
    {
        return $this->includeOperatorName;
    }

    /**
     * @param string $includeOperatorName
     * @return self
     */
    public function setIncludeOperatorName(string $includeOperatorName): self
    {
        $this->includeOperatorName = $includeOperatorName;
        return $this;
    }

    /**
     * @return string
     */
    public function getIncludeDepartmentName(): string
    {
        return $this->includeDepartmentName;
    }

    /**
     * @param string $includeDepartmentName
     * @return self
     */
    public function setIncludeDepartmentName(string $includeDepartmentName): self
    {
        $this->includeDepartmentName = $includeDepartmentName;
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
    public function getSmtpHost(): string
    {
        return $this->smtpHost;
    }

    /**
     * @param string $smtpHost
     * @return self
     */
    public function setSmtpHost(string $smtpHost): self
    {
        $this->smtpHost = $smtpHost;
        return $this;
    }

    /**
     * @return string
     */
    public function getSmtpPort(): string
    {
        return $this->smtpPort;
    }

    /**
     * @param string $smtpPort
     * @return self
     */
    public function setSmtpPort(string $smtpPort): self
    {
        $this->smtpPort = $smtpPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getSmtpEncryption(): string
    {
        return $this->smtpEncryption;
    }

    /**
     * @param string $smtpEncryption
     * @return self
     */
    public function setSmtpEncryption(string $smtpEncryption): self
    {
        $this->smtpEncryption = $smtpEncryption;
        return $this;
    }

    /**
     * @return string
     */
    public function getSmtpRequiresAuth(): string
    {
        return $this->smtpRequiresAuth;
    }

    /**
     * @param string $smtpRequiresAuth
     * @return self
     */
    public function setSmtpRequiresAuth(string $smtpRequiresAuth): self
    {
        $this->smtpRequiresAuth = $smtpRequiresAuth;
        return $this;
    }

    /**
     * @return string
     */
    public function getSmtpUsername(): string
    {
        return $this->smtpUsername;
    }

    /**
     * @param string $smtpUsername
     * @return self
     */
    public function setSmtpUsername(string $smtpUsername): self
    {
        $this->smtpUsername = $smtpUsername;
        return $this;
    }

    /**
     * @return string
     */
    public function getSmtpPassword(): string
    {
        return $this->smtpPassword;
    }

    /**
     * @param string $smtpPassword
     * @return self
     */
    public function setSmtpPassword(string $smtpPassword): self
    {
        $this->smtpPassword = $smtpPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getIncludeLocaleInUri(): string
    {
        return $this->includeLocaleInUri;
    }

    /**
     * @param string $includeLocaleInUri
     * @return self
     */
    public function setIncludeLocaleInUri(string $includeLocaleInUri): self
    {
        $this->includeLocaleInUri = $includeLocaleInUri;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecaptchaSiteKey(): string
    {
        return $this->recaptchaSiteKey;
    }

    /**
     * @param string $recaptchaSiteKey
     * @return self
     */
    public function setRecaptchaSiteKey(string $recaptchaSiteKey): self
    {
        $this->recaptchaSiteKey = $recaptchaSiteKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecaptchaSecretKey(): string
    {
        return $this->recaptchaSecretKey;
    }

    /**
     * @param string $recaptchaSecretKey
     * @return self
     */
    public function setRecaptchaSecretKey(string $recaptchaSecretKey): self
    {
        $this->recaptchaSecretKey = $recaptchaSecretKey;
        return $this;
    }

    /**
     * @inheritDoc
     */
    protected function getRequiredFields(): array
    {
        return self::REQUIRED_FIELDS;
    }
}
