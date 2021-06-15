<?php

declare(strict_types=1);

namespace App\SberbankAcquiring\HttpClient;

use App\SberbankAcquiring\Exception\NetworkException;

/**
 * Simple HTTP client interface.
 *
 */
interface HttpClientInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    /**
     * Send an HTTP request.
     *
     * @throws NetworkException
     *
     * @return array A response
     */
    public function request(string $uri, string $method = self::METHOD_GET, array $headers = [], string $data = ''): array;
}
