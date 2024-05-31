<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Dictionary;

/**
 * This class includes the names of all the supported endpoints.
 * The defined APIs should only include the resource path without the API `/` prefix and postfix.
 */
final class ApiDictionary
{
    /**
     * Core Apis
     */

    public const CORE_BRAND = 'core/brand';

    public const CORE_IP_BAN = 'core/ipban';

    public const CORE_IP_WHITELIST = 'core/ipwhitelist';

    public const CORE_SETTINGS = 'core/settings';

    public const CORE_SPAM_RULES = 'core/spamrule';

    /**
     * Self Service APIs
     */
    public const SELF_SERVICE_COMMENT = 'selfservice/comment';

    public const SELF_SERVICE_ARTICLE_TYPE = 'selfservice/type';

    public const SELF_SERVICE_ARTICLE = 'selfservice/article';

    public const SELF_SERVICE_ARTICLE_SEARCH = self::SELF_SERVICE_ARTICLE . '/search';

    public const SELF_SERVICE_ARTICLE_RELATED = self::SELF_SERVICE_ARTICLE . '/related';

    public const SELF_SERVICE_SETTINGS = 'selfservice/settings';

    public const SELF_SERVICE_CATEGORY = 'selfservice/category';

    public const SELF_SERVICE_TAG = 'selfservice/tag';

    /**
     * User Apis
     */
    public const USER_USER = 'user/user';

    public const USER_USERGROUP = 'user/usergroup';

    public const USER_CUSTOMFIELD = 'user/customfield';

    /**
     * Ticket Apis
     */
    public const TICKET_DEPARTMENT = 'ticket/department';

    public const TICKET_SETTINGS = 'ticket/settings';

    public const TICKET_CHANNEL_SETTINGS = 'ticket/channel/%s/settings';

    public const TICKET_CUSTOMFIELD = 'ticket/customfield';

    public const TICKET_PRIORITY = 'ticket/priority';

    public const TICKET_STATUS = 'ticket/status';

    public const TICKET_ATTACHMENT = 'ticket/attachment';

    public const TICKET_ATTACHMENT_DOWNLOAD = 'ticket/attachment/%d/download';

    public const TICKET_TICKET = 'ticket/ticket';

    public const TICKET_MESSAGE = 'ticket/message';
}
