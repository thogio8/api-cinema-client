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
            'http://localhost:8000/api/films'
            //'http://172.16.213.1:8000/api/films'
        );
        return $rep->toArray();
    }

    public function getFilmById(int $id): array{
        $rep = $this->httpClient->request(
            'GET',
            'http://localhost:8000/api/films/'.$id
//            'http://172.16.213.1:8000/api/films/'.$id
        );
        return $rep->toArray();
    }
}