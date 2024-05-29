<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Api;

use Psr\Http\Message\ResponseInterface;
use SupportPal\ApiClient\Exception\InvalidArgumentException;
use SupportPal\ApiClient\Model\Collection;
use SupportPal\ApiClient\Model\Model;

use function json_decode;

abstract class Api
{
    /**
     * @param ResponseInterface $response
     * @return array<mixed>
     */
    protected function decodeBody(ResponseInterface $response): array
    {
        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param Model[] $models
     * @throws InvalidArgumentException
     */
    public function createCollection(int $count, array $models): Collection
    {
        return new Collection($count, $models);
    }
}
