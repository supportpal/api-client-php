<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Dictionary;

/**
 * This class includes the names of all the supported endpoints
 * Class APIDictionary
 * @package SupportPal\ApiClient\Dictionary
 */
final class ApiDictionary
{
    /**
     * Core Apis
     */
    public const CORE_SETTINGS = 'core/settings';

    /**
     * Self Service APIs
     */
    public const SELF_SERVICE_COMMENT = 'selfservice/comment';

    public const SELF_SERVICE_ARTICLE_TYPE = 'selfservice/type';

    public const SELF_SERVICE_ARTICLE = 'selfservice/article';

    public const SELF_SERVICE_ARTICLE_SEARCH = self::SELF_SERVICE_ARTICLE . '/search';

    public const SELF_SERVICE_SETTINGS = 'selfservice/settings';

    public const SELF_SERVICE_CATEGORY = 'selfservice/category';

    public const SELF_SERVICE_TAG = 'selfservice/tag';

    /**
     * User Apis
     */
    public const USER_USER = 'user/user';

    /**
     * Ticket Apis
     */
    public const TICKET_DEPARTMENT = 'ticket/department';

    public const TICKET_SETTINGS = 'ticket/settings';

    public const TICKET_CHANNEL_SETTINGS = 'ticket/channel/%s/settings';

    public const TICKET_CUSTOMFIELD = 'ticket/customfield';
}
