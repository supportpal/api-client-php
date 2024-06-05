<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Cache;

use Exception;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Strategy\CacheStrategyInterface;
use SupportPal\ApiClient\Cache\ApiCacheMap;
use SupportPal\ApiClient\Cache\CacheStrategyConfigurator;
use SupportPal\ApiClient\Http\Client;
use SupportPal\ApiClient\Http\CoreClient;
use SupportPal\ApiClient\Http\SelfServiceClient;
use SupportPal\ApiClient\Http\TicketClient;
use SupportPal\ApiClient\Http\UserClient;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\Core\BrandData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\IpBanData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\LanguageData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\SettingsData as CoreSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\SpamRuleData;
use SupportPal\ApiClient\Tests\DataFixtures\Core\WhitelistedIpData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData as TicketSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\DataFixtures\User\GroupData;
use SupportPal\ApiClient\Tests\DataFixtures\User\SettingsData as UserSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

use function call_user_func_array;
use function json_encode;
use function sleep;
use function sys_get_temp_dir;

class CacheableApisTest extends ContainerAwareBaseTestCase
{
    protected const BASE_API_PATH = '/api/';

    /**
     * @param string $endpoint
     * @param array<mixed> $data
     * @param array<mixed> $parameters
     * @param class-string $apiClientClass
     * @throws Exception
     * @dataProvider provideCacheableApiCalls
     */
    public function testGetCacheableApiTestCacheHit(
        string $endpoint,
        array $data,
        array $parameters,
        string $apiClientClass
    ): void {
        /** @var Client $apiClient */
        $apiClient = $this->getContainer()->get($apiClientClass);

        $this->mockResponses($data);
        [$response1, $response2] = $this->sendRequests($apiClient, $endpoint, $parameters);


        self::assertEquals(
            CacheMiddleware::HEADER_CACHE_MISS,
            $response1->getHeaderLine(CacheMiddleware::HEADER_CACHE_INFO)
        );

        self::assertEquals(
            CacheMiddleware::HEADER_CACHE_HIT,
            $response2->getHeaderLine(CacheMiddleware::HEADER_CACHE_INFO)
        );
    }

    /**
     * @param string $endpoint
     * @param array<mixed> $data
     * @param array<mixed> $parameters
     * @param class-string $apiClientClass
     * @throws Exception
     * @dataProvider provideCacheableApiCalls
     */
    public function testGetCacheableApiTestCacheMiss(
        string $endpoint,
        array $data,
        array $parameters,
        string $apiClientClass
    ): void {
        /** @var Client $apiClient */
        $apiClient = $this->getContainer()->get($apiClientClass);

        $response = new Response(200, [], (string) json_encode($data));
        $response2 = new Response(200, [], (string) json_encode($data));
        $response3 = new Response(200, [], (string) json_encode($data));

        $this->mockRequestHandler->append($response);
        $this->mockRequestHandler->append($response2);
        $this->mockRequestHandler->append($response3);

        /** @var callable $callable */
        $callable = [$apiClient, $endpoint];
        $response1 = call_user_func_array($callable, $parameters);
        $response2 = call_user_func_array($callable, $parameters);
        sleep(2);
        $response3 = call_user_func_array($callable, $parameters);

        self::assertEquals(
            CacheMiddleware::HEADER_CACHE_MISS,
            $response1->getHeaderLine(CacheMiddleware::HEADER_CACHE_INFO)
        );

        self::assertEquals(
            CacheMiddleware::HEADER_CACHE_HIT,
            $response2->getHeaderLine(CacheMiddleware::HEADER_CACHE_INFO)
        );

        self::assertEquals(
            CacheMiddleware::HEADER_CACHE_MISS,
            $response3->getHeaderLine(CacheMiddleware::HEADER_CACHE_INFO)
        );
    }

    /**
     * @param string $endpoint
     * @param array<mixed> $data
     * @param array<mixed> $parameters
     * @param class-string $apiClientClass
     * @throws Exception
     * @dataProvider provideNonCacheableApis
     */
    public function testNonCacheableApisAlwaysMiss(
        string $endpoint,
        array $data,
        array $parameters,
        string $apiClientClass
    ): void {
        /** @var Client $apiClient */
        $apiClient = $this->getContainer()->get($apiClientClass);
        $this->mockResponses($data);
        [$response1, $response2] = $this->sendRequests($apiClient, $endpoint, $parameters);

        self::assertEquals(
            CacheMiddleware::HEADER_CACHE_MISS,
            $response1->getHeaderLine(CacheMiddleware::HEADER_CACHE_INFO)
        );

        self::assertEquals(
            CacheMiddleware::HEADER_CACHE_MISS,
            $response2->getHeaderLine(CacheMiddleware::HEADER_CACHE_INFO)
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        /**
         * A sleep period to invalidate cache after the teardown of every test.
         * This eliminates the possibility of instability with subsequent tests
         */
        sleep(2);
    }

    /**
     * @return iterable<mixed>
     */
    public function provideCacheableApiCalls(): iterable
    {
        /** Core Apis */
        $brandData = new BrandData;
        $ipBanData = new IpBanData;
        $whitelistedIpData = new WhitelistedIpData;
        $languageData = new LanguageData;
        $spamRuleData = new SpamRuleData;

        yield ['getSettings', (new CoreSettingsData)->getResponse(), [], CoreClient::class];
        yield ['getBrand', $brandData->getResponse(), [1], CoreClient::class];
        yield ['getBrands', $brandData->getAllResponse(), [[]], CoreClient::class];
        yield ['getIpBan', $ipBanData->getResponse(), [1], CoreClient::class];
        yield ['getIpBans', $ipBanData->getAllResponse(), [[]], CoreClient::class];
        yield ['getWhitelistedIp', $whitelistedIpData->getResponse(), [1], CoreClient::class];
        yield ['getWhitelistedIps', $whitelistedIpData->getAllResponse(), [[]], CoreClient::class];
        yield ['getLanguages', $languageData->getAllResponse(), [[]], CoreClient::class];
        yield ['getSpamRule', $spamRuleData->getResponse(), [1], CoreClient::class];

        /** SelfService Apis */
        $typeData = new TypeData;
        $selfServiceSettingsData = new SettingsData;
        $categoryData = new CategoryData;
        $articleData = new ArticleData;
        $tagData = new TagData;

        yield ['getCategory', $categoryData->getResponse(), [1], SelfServiceClient::class];
        yield ['getCategories', $categoryData->getAllResponse(), [[]], SelfServiceClient::class];
        yield ['getArticle', $articleData->getResponse(), [1, []], SelfServiceClient::class];
        yield ['getArticlesByTerm', $articleData->getAllResponse(), [['test']], SelfServiceClient::class];
        yield ['getArticles', $articleData->getAllResponse(), [[]], SelfServiceClient::class];
        yield ['getRelatedArticles', $articleData->getAllResponse(), [[1, 'test', []]], SelfServiceClient::class];
        yield ['getTag', $tagData->getResponse(), [1], SelfServiceClient::class];
        yield ['getTags', $tagData->getAllResponse(), [[]], SelfServiceClient::class];
        yield ['getSettings', $selfServiceSettingsData->getResponse(), [], SelfServiceClient::class];
        yield ['getType', $typeData->getResponse(), [1], SelfServiceClient::class];
        yield ['getTypes', $typeData->getAllResponse(), [[]], SelfServiceClient::class];

        $departmentData = new DepartmentData;
        $ticketCustomFieldData = new TicketCustomFieldData;
        $priorityData = new PriorityData;
        $statusData = new StatusData;
        $ticketSettingsData = new TicketSettingsData;

        /** Ticket Apis */
        yield ['getDepartments', $departmentData->getAllResponse(), [[]], TicketClient::class];
        yield ['getDepartment', $departmentData->getResponse(), [1], TicketClient::class];
        yield ['getCustomFields', $ticketCustomFieldData->getAllResponse(), [[]], TicketClient::class];
        yield ['getCustomField', $ticketCustomFieldData->getResponse(), [1], TicketClient::class];
        yield ['getPriorities', $priorityData->getAllResponse(), [[]], TicketClient::class];
        yield ['getPriority', $statusData->getResponse(), [1], TicketClient::class];
        yield ['getStatuses', $statusData->getAllResponse(), [[]], TicketClient::class];
        yield ['getStatus', $statusData->getResponse(), [1], TicketClient::class];
        yield ['getSettings', $ticketSettingsData->getResponse(), [], TicketClient::class];

        /** User Apis */
        $userGroupsData = new GroupData;
        $customFieldData = new UserCustomFieldData;
        $userSettingsData = new UserSettingsData;

        yield ['getGroups', $userGroupsData->getAllResponse(), [[]], UserClient::class];
        yield ['getGroup', $userGroupsData->getAllResponse(), [1], UserClient::class];
        yield ['getCustomFields', $customFieldData->getAllResponse(), [[]], UserClient::class];
        yield ['getCustomField', $customFieldData->getResponse(), [1], UserClient::class];
        yield ['getSettings', $userSettingsData->getResponse(), [], UserClient::class];
    }

    /**
     * @return iterable<mixed>
     */
    public function provideNonCacheableApis(): iterable
    {
        $attachmentData = new AttachmentData;
        $ticketData = new TicketData;
        $messageData = new MessageData;

        /** SelfService Apis */
        $commentData = new CommentData;

        yield [ 'getComment', $commentData->getResponse(), [1], SelfServiceClient::class];
        yield [ 'getComments', $commentData->getAllResponse(), [[]], SelfServiceClient::class];

        /** Ticket Apis */
        yield [ 'getAttachments', $attachmentData->getAllResponse(), [[]], TicketClient::class];
        yield [ 'getAttachment', $attachmentData->getResponse(), [1], TicketClient::class];
        yield [ 'getTickets', $ticketData->getAllResponse(), [[]], TicketClient::class];
        yield [ 'getTicket', $ticketData->getResponse(), [1], TicketClient::class];
        yield [ 'getMessage', $messageData->getResponse(), [1], TicketClient::class];
        yield [ 'getMessages', $messageData->getAllResponse(), [[]], TicketClient::class];

        /** User Apis */
        $userData = new UserData;

        yield [ 'getUsers', $userData->getAllResponse(), [[]], UserClient::class];
    }

    /**
     * @inheritDoc
     */
    protected function getGuzzleClient(): GuzzleClient
    {
        /**
         * replace GuzzleClient with MockClient
         */
        $this->mockRequestHandler = new MockHandler;
        $handlerStack = HandlerStack::create($this->mockRequestHandler);
        $handlerStack->push(new CacheMiddleware($this->buildCacheStrategy(sys_get_temp_dir())));

        return new GuzzleClient(['handler' => $handlerStack]);
    }

    /**
     * @param string $cacheDir
     * @return CacheStrategyInterface
     */
    private function buildCacheStrategy(string $cacheDir): CacheStrategyInterface
    {
        $apiCacheMap = new class extends ApiCacheMap {
            protected const CACHE_MAP = [
                1 => ApiCacheMap::CACHE_MAP[ApiCacheMap::DEFAULT_CACHE_TTL],
            ];
        };

        return (new CacheStrategyConfigurator($apiCacheMap))
            ->buildCacheStrategy($cacheDir, self::BASE_API_PATH);
    }

    /**
     * @param array<mixed> $data
     * @throws Exception
     */
    protected function mockResponses(array $data): void
    {
        $response = new Response(200, [], (string) json_encode($data));
        $response2 = new Response(200, [], (string) json_encode($data));

        $this->mockRequestHandler->append($response);
        $this->mockRequestHandler->append($response2);
    }

    /**
     * @param Client $apiClient
     * @param string $endpoint
     * @param array<mixed> $parameters
     * @return Response[]
     */
    protected function sendRequests(Client $apiClient, string $endpoint, array $parameters): array
    {
        /** @var callable $callable */
        $callable = [$apiClient, $endpoint];
        $response1 = call_user_func_array($callable, $parameters);
        $response2 = call_user_func_array($callable, $parameters);

        return [$response1, $response2];
    }
}
