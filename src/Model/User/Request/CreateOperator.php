<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use Propaganistas\LaravelPhone\PhoneNumber;
use SupportPal\ApiClient\Model\Model;

use function array_unique;

/**
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property array $phone
 * @property string $country
 * @property string $language_code
 * @property string $timezone
 * @property int $active
 * @property array $groups
 * @property array $depts
 */
class CreateOperator extends Model
{
    /** @var array<string, string> */
    protected $casts = [
        'firstname'     => 'string',
        'lastname'      => 'string',
        'email'         => 'string',
        'password'      => 'string',
        'phone'         => 'array',
        'country'       => 'string',
        'language_code' => 'string',
        'timezone'      => 'string',
        'active'        => 'int',
        'groups'        => 'array',
        'depts'         => 'array',
    ];

    public function setPhoneNumber(string $number, ?string $country = null): self
    {
        $phoneNumbers = $this->getAttribute('phone') ?? [];
        $phoneNumbers[] = (new PhoneNumber($number, $country))->formatE164();

        $this->setAttribute('phone', array_unique($phoneNumbers));

        return $this;
    }

    public function addToGroup(int $groupId): self
    {
        $groups = $this->getAttribute('group') ?? [];
        $groups[] = $groupId;

        $this->setAttribute('group', array_unique($groups));

        return $this;
    }

    public function assignToDepartment(int $departmentId): self
    {
        $departments = $this->getAttribute('depts') ?? [];
        $departments[] = $departmentId;

        $this->setAttribute('depts', array_unique($departments));

        return $this;
    }
}
