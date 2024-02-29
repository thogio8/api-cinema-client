<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiFilms
{
    private HttpClientInterface $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getFilms() : array{
        $rep = $this->httpClient->request(
            'GET',
            'http://127.0.0.1:8000/api/films'
        );
        return $rep->toArray();
    }
}