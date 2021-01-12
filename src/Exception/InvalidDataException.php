<?php declare(strict_types=1);

namespace SupportPal\ApiClient\Exception;

use Throwable;

class InvalidDataException extends InvalidArgumentException
{
    /** @var array<mixed> */
    private $data;

    /**
     * InvalidDataException constructor.
     * @param array<mixed> $data
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(array $data, string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->data = $data;
    }

    /**
     * @return array<mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }
}
