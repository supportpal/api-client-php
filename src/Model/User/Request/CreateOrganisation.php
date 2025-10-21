<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use Illuminate\Support\Str;
use SupportPal\ApiClient\Model\Model;

use function array_unique;
use function trim;

class CreateOrganisation extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'brand_id'      => 'int',
        'name'          => 'string',
        'customfield'   => 'array',
        'country'       => 'string',
        'language_code' => 'string',
        'timezone'      => 'string',
        'notes'         => 'string',
        'domain'        => 'array',
        'access_level'  => 'array',
    ];

    public function setCustomFieldValue(int $fieldId, mixed $value): self
    {
        $customFields = $this->getAttribute('customfield') ?? [];
        $customFields[$fieldId] = $value;

        $this->setAttribute('customfield', $customFields);

        return $this;
    }

    public function setDomain(string $domain): self
    {
        $domains = $this->getAttribute('domain') ?? [];
        $domains[] = Str::lower(trim($domain));

        $this->setAttribute('domain', array_unique($domains));

        return $this;
    }

    public function addUser(int $userId, int $accessLevel = 1): self
    {
        $users = $this->getAttribute('access_level') ?? [];
        $users[$userId] = $accessLevel;

        $this->setAttribute('access_level', $users);

        return $this;
    }
}
