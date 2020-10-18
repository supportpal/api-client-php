<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use Symfony\Component\Serializer\Annotation\SerializedName;

abstract class BaseTranslation extends BaseModel
{
    /**
     * @var string
     * @SerializedName("locale")
     */
    private $locale;

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return self
     */
    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }
}
