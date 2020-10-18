<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\Department;

use SupportPal\ApiClient\Model\BaseTranslation;
use Symfony\Component\Serializer\Annotation\SerializedName;

class DepartmentTranslation extends BaseTranslation
{
    /**
     * @var string
     * @SerializedName("name")
     */
    private $name;

    /**
     * @var string|null
     * @SerializedName("description")
     */
    private $description;

    /**
     * @var int
     * @SerializedName("department_id")
     */
    private $departmentId;

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
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    /**
     * @param int $departmentId
     * @return self
     */
    public function setDepartmentId(int $departmentId): self
    {
        $this->departmentId = $departmentId;

        return $this;
    }
}
