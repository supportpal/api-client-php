<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model;

use Symfony\Component\Serializer\Attribute\SerializedName;

abstract class BaseTranslation extends BaseModel
{
    #[SerializedName('locale')]
    private string $locale;

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }
}
