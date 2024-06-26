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

    public const CORE_LANGUAGE = 'core/language';

    public const CORE_SETTINGS = 'core/settings';

    public const CORE_SPAM_RULE = 'core/spamrule';

    /**
     * Self Service APIs
     */
    public const SELF_SERVICE_ARTICLE = 'selfservice/article';

    public const SELF_SERVICE_ARTICLE_SEARCH = self::SELF_SERVICE_ARTICLE . '/search';

    public const SELF_SERVICE_ARTICLE_RELATED = self::SELF_SERVICE_ARTICLE . '/related';

    public const SELF_SERVICE_ATTACHMENT = 'selfservice/attachment';

    public const SELF_SERVICE_ATTACHMENT_DOWNLOAD = self::SELF_SERVICE_ATTACHMENT . '/%d/download';

    public const SELF_SERVICE_CATEGORY = 'selfservice/category';

    public const SELF_SERVICE_COMMENT = 'selfservice/comment';

    public const SELF_SERVICE_SETTINGS = 'selfservice/settings';

    public const SELF_SERVICE_TAG = 'selfservice/tag';

    public const SELF_SERVICE_ARTICLE_TYPE = 'selfservice/type';

    /**
     * User Apis
     */

    public const USER_OPERATOR = 'user/operator';

    public const USER_OPERATORGROUP = 'user/operatorgroup';

    public const USER_ORGANISATION = 'user/organisation';

    public const USER_ORGANISATION_CUSTOMFIELD = 'user/organisationcustomfield';

    public const USER_SETTINGS = 'user/settings';

    public const USER_USER = 'user/user';

    public const USER_CUSTOMFIELD = 'user/customfield';

    public const USER_USERGROUP = 'user/usergroup';

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

    public const TICKET_ATTACHMENT_DOWNLOAD = self::TICKET_ATTACHMENT . '/%d/download';

    public const TICKET_TICKET = 'ticket/ticket';

    public const TICKET_MESSAGE = 'ticket/message';
}
