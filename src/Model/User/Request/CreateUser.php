<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use Illuminate\Support\Str;
use Propaganistas\LaravelPhone\PhoneNumber;
use SupportPal\ApiClient\Model\Model;

use function array_unique;
use function trim;

class CreateUser extends Model
{
    /** @var array<string, string> */
    protected array $casts = [
        'brand_id'                   => 'int',
        'firstname'                  => 'string',
        'lastname'                   => 'string',
        'email'                      => 'string',
        'additional_email'           => 'array',
        'password'                   => 'string',
        'send_email'                 => 'bool',
        'phone'                      => 'array',
        'country'                    => 'string',
        'language_code'              => 'string',
        'timezone'                   => 'string',
        'email_verified'             => 'bool',
        'active'                     => 'int',
        'organisation'               => 'string',
        'organisation_id'            => 'int',
        'organisation_access_level'  => 'int',
        'organisation_notifications' => 'int',
        'customfield'                => 'array',
        'groups'                     => 'array',
    ];

    public function setAdditionalEmail(string $email): self
    {
        $emails = $this->getAttribute('additional_email') ?? [];
        $emails[] = Str::lower(trim($email));

        $this->setAttribute('additional_email', array_unique($emails));

        return $this;
    }

    public function setPhoneNumber(string $number, ?string $country = null): self
    {
        $phoneNumbers = $this->getAttribute('phone') ?? [];
        $phoneNumbers[] = (new PhoneNumber($number, $country))->formatE164();

        $this->setAttribute('phone', array_unique($phoneNumbers));

        return $this;
    }

    public function setCustomFieldValue(int $fieldId, mixed $value): self
    {
        $customFields = $this->getAttribute('customfield') ?? [];
        $customFields[$fieldId] = $value;

        $this->setAttribute('customfield', $customFields);

        return $this;
    }

    public function addToGroup(int $groupId): self
    {
        $groups = $this->getAttribute('group') ?? [];
        $groups[] = $groupId;

        $this->setAttribute('group', array_unique($groups));

        return $this;
    }
}
