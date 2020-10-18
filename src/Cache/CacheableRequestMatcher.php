<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Cache;

use Kevinrob\GuzzleCache\Strategy\Delegate\RequestMatcherInterface;
use Psr\Http\Message\RequestInterface;

class CacheableRequestMatcher implements RequestMatcherInterface
{
    /** @var array<int, string> */
    private $cachableApis;

    /**
     * CacheableRequestMatcher constructor.
     * @param array<int, string> $cachableApis
     */
    public function __construct(array $cachableApis)
    {
        $this->cachableApis = $cachableApis;
    }

    /**
     * @inheritDoc
     */
    public function matches(RequestInterface $request)
    {
        foreach ($this->cachableApis as $path) {
            if ($request->getUri()->getPath() === $path && $request->getMethod() === 'GET') {
                return true;
            }
        }

        return false;
    }
}
