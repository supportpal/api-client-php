<?php declare(strict_types = 1);

namespace SupportPal\ApiClient\Cache;

use Kevinrob\GuzzleCache\Strategy\Delegate\RequestMatcherInterface;
use Psr\Http\Message\RequestInterface;

class CacheableRequestMatcher implements RequestMatcherInterface
{
    /**
     * @var array<string, string>
     */
    private $cachableApis;

    /**
     * CacheableRequestMatcher constructor.
     * @param array<string, string> $cachableApis
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
        foreach ($this->cachableApis as $path => $method) {
            if ($request->getUri()->getPath() === $path && $request->getMethod() === $method) {
                return true;
            }
        }

        return false;
    }
}
