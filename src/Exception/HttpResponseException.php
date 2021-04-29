<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * Class HttpResponseException
 * @package SupportPal\ApiClient\Exception
 */
class HttpResponseException extends BaseException
{
    /** @var RequestInterface */
    private $request;

    /** @var ResponseInterface|null */
    private $response;

    /**
     * HttpResponseException constructor.
     * @param RequestInterface $request
     * @param ResponseInterface|null $response
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        RequestInterface $request,
        ?ResponseInterface $response = null,
        string $message = '',
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @return ResponseInterface|null
     */
    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
