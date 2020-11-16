<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Tests\Cache;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Strategy\CacheStrategyInterface;
use SupportPal\ApiClient\ApiClient;
use SupportPal\ApiClient\ApiClient\CoreApiClient;
use SupportPal\ApiClient\ApiClient\SelfServiceApiClient;
use SupportPal\ApiClient\ApiClient\TicketApiClient;
use SupportPal\ApiClient\ApiClient\UserApiClient;
use SupportPal\ApiClient\Cache\ApiCacheMap;
use SupportPal\ApiClient\Cache\CacheStrategyConfigurator;
use SupportPal\ApiClient\Dictionary\ApiDictionary;
use SupportPal\ApiClient\Tests\ContainerAwareBaseTestCase;
use SupportPal\ApiClient\Tests\DataFixtures\Core\CoreSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\ArticleData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CategoryData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\CommentData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\SettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TagData;
use SupportPal\ApiClient\Tests\DataFixtures\SelfService\TypeData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\AttachmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\ChannelSettingsData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\DepartmentData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\MessageData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\PriorityData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\StatusData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketCustomFieldData;
use SupportPal\ApiClient\Tests\DataFixtures\Ticket\TicketData;
use SupportPal\ApiClient\Tests\DataFixtures\User\UserData;

use function call_user_func_array;
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
        /** @var ApiClient $apiClient */
        $apiClient = $this->getContainer()->get($apiClientClass);

        $response = new Response(200, [], (string) $this->getEncoder()->encode($data, $this->getFormatType()));
        $response2 = new Response(200, [], (string) $this->getEncoder()->encode($data, $this->getFormatType()));

        $this->mockRequestHandler->append($response);
        $this->mockRequestHandler->append($response2);

        /** @var callable $callable */
        $callable = [$apiClient, $endpoint];
        $response1 = call_user_func_array($callable, $parameters);
        $response2 = call_user_func_array($callable, $parameters);


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
        /** @var ApiClient $apiClient */
        $apiClient = $this->getContainer()->get($apiClientClass);

        $response = new Response(200, [], (string) $this->getEncoder()->encode($data, $this->getFormatType()));
        $response2 = new Response(200, [], (string) $this->getEncoder()->encode($data, $this->getFormatType()));

        $this->mockRequestHandler->append($response);
        $this->mockRequestHandler->append($response2);

        /** @var callable $callable */
        $callable = [$apiClient, $endpoint];
        $response1 = call_user_func_array($callable, $parameters);
        sleep(1);
        $response2 = call_user_func_array($callable, $parameters);


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
     * @dataProvider provideNonCacheableApis
     */
    public function testNonCacheableApisAlwaysMiss(
        string $endpoint,
        array $data,
        array $parameters,
        string $apiClientClass
    ): void {
        /** @var ApiClient $apiClient */
        $apiClient = $this->getContainer()->get($apiClientClass);

        $response = new Response(200, [], (string) $this->getEncoder()->encode($data, $this->getFormatType()));
        $response2 = new Response(200, [], (string) $this->getEncoder()->encode($data, $this->getFormatType()));

        $this->mockRequestHandler->append($response);
        $this->mockRequestHandler->append($response2);

        /** @var callable $callable */
        $callable = [$apiClient, $endpoint];
        $response1 = call_user_func_array($callable, $parameters);
        $response2 = call_user_func_array($callable, $parameters);


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
        sleep(1);
    }

    /**
     * @return iterable<mixed>
     */
    public function provideCacheableApiCalls(): iterable
    {
        $typeData = new TypeData;
        $commentData = new CommentData;
        $settingsData = new SettingsData;
        $categoryData = new CategoryData;
        $articleData = new ArticleData;
        $tagData = new TagData;

        yield ['getSettings' ,(new CoreSettingsData)->getResponse(), [], CoreApiClient::class];
        yield ['getCategories' ,$categoryData->getAllResponse(), [[]], SelfServiceApiClient::class];
        yield ['getCategory' ,$categoryData->getResponse(), [1], SelfServiceApiClient::class];
        yield ['getArticle' ,$articleData->getResponse(), [1, []], SelfServiceApiClient::class];
        yield ['getTag' ,$tagData->getResponse(), [1], SelfServiceApiClient::class];
        yield ['getArticles' ,$articleData->getAllResponse(), [[]], SelfServiceApiClient::class];
        yield ['getSettings' ,$settingsData->getResponse(), [], SelfServiceApiClient::class];
        yield ['getComments' ,$commentData->getAllResponse(), [[]], SelfServiceApiClient::class];
        yield ['getTypes' ,$typeData->getAllResponse(), [[]], SelfServiceApiClient::class];
    }

    /**
     * @return iterable<mixed>
     */
    public function provideNonCacheableApis(): iterable
    {
        $departmentData = new DepartmentData;
        $settingsData = new \SupportPal\ApiClient\Tests\DataFixtures\Ticket\SettingsData;
        $channelSettingsData = new ChannelSettingsData;
        $ticketCustomFieldData = new TicketCustomFieldData;
        $priorityData = new PriorityData;
        $statusData = new StatusData;
        $attachmentData = new AttachmentData;
        $ticketData = new TicketData;
        $messageData = new MessageData;
        $userData = new UserData;

        yield ['getDepartments', $departmentData->getAllResponse(), [[]], TicketApiClient::class];
        yield ['getDepartment', $departmentData->getResponse(), [1], TicketApiClient::class];
        yield ['getSettings', $settingsData->getResponse(), [], TicketApiClient::class];
        yield ['getChannelSettings', $channelSettingsData->getResponse(), ['web'], TicketApiClient::class];
        yield ['getCustomFields', $ticketCustomFieldData->getAllResponse(), [[]], TicketApiClient::class];
        yield ['getPriorities', $priorityData->getAllResponse(), [[]], TicketApiClient::class];
        yield ['getPriority', $statusData->getResponse(), [1], TicketApiClient::class];
        yield ['getStatuses', $statusData->getAllResponse(), [[]], TicketApiClient::class];
        yield ['getStatus', $statusData->getResponse(), [1], TicketApiClient::class];
        yield ['getAttachments', $attachmentData->getAllResponse(), [[]], TicketApiClient::class];
        yield ['getAttachment', $attachmentData->getResponse(), [1], TicketApiClient::class];
        yield ['getTickets', $ticketData->getAllResponse(), [[]], TicketApiClient::class];
        yield ['getTicket', $ticketData->getResponse(), [1], TicketApiClient::class];
        yield ['getMessage', $messageData->getResponse(), [1], TicketApiClient::class];
        yield ['getMessages', $messageData->getAllResponse(), [[]], TicketApiClient::class];
        yield ['getUsers', $userData->getAllResponse(), [[]], UserApiClient::class];
    }

    /**
     * @inheritDoc
     */
    protected function getGuzzleClient(): Client
    {
        /**
         * replace GuzzleClient with MockClient
         */
        $this->mockRequestHandler = new MockHandler;
        $handlerStack = HandlerStack::create($this->mockRequestHandler);
        $handlerStack->push(new CacheMiddleware($this->buildCacheStrategy(sys_get_temp_dir())));

        return new Client(['handler' => $handlerStack]);
    }

    /**
     * @param string $cacheDir
     * @return CacheStrategyInterface
     */
    private function buildCacheStrategy(string $cacheDir): CacheStrategyInterface
    {
        $apiCacheMap = new class extends ApiCacheMap {
            protected const CACHE_MAP = [
                1 => [
                    ApiDictionary::CORE_SETTINGS,
                    ApiDictionary::SELF_SERVICE_SETTINGS,
                    ApiDictionary::SELF_SERVICE_ARTICLE,
                    ApiDictionary::SELF_SERVICE_ARTICLE_TYPE,
                    ApiDictionary::SELF_SERVICE_CATEGORY,
                    ApiDictionary::SELF_SERVICE_TAG,
                    ApiDictionary::SELF_SERVICE_ARTICLE_SEARCH,
                    ApiDictionary::SELF_SERVICE_COMMENT,
                ],
            ];
        };

        return (new CacheStrategyConfigurator($apiCacheMap))
            ->buildCacheStrategy($cacheDir, self::BASE_API_PATH);
    }
}
