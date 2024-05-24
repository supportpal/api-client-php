<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Model\User\Request;

use SupportPal\ApiClient\Model\Model;

class CreateUser extends Model
{
    public const REQUIRED_FIELDS = ['email'];

    protected int|null $brandId;

    protected string|null $firstname;

    protected string|null $lastname;

    protected string $email;

    protected string|null $password;

    protected string|null $country;

    protected string|null $languageCode;

    protected string|null $timezone;

    protected bool|null $confirmed;

    protected int|null $active;

    protected string|null $organisation;

    protected int|null $organisationId;

    protected int|null $organisationAccessLevel;

    protected int|null $organisationNotifications;

    /** @var int[]|null */
    protected array|null $customfield;

    /** @var int[]|null */
    protected array|null $groups;
}
