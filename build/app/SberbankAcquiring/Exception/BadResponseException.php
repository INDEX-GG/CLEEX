<?php

declare(strict_types=1);

namespace App\SberbankAcquiring\Exception;

/**
 */
class BadResponseException extends SberbankAcquiringException
{
    /**
     * @var string
     */
    private $response;

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(string $response): void
    {
        $this->response = $response;
    }
}
