<?php

namespace App\Controller;

use App\Services\ApiFilms;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FilmController extends AbstractController
{
    #[Route('/', name:"app_accueil", methods: ('GET'))]
    #[Route('/films', name: 'app_films', methods: ('GET'))]
    public function index(ApiFilms $apiFilms): Response
    {
        $films = $apiFilms->getFilms();
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
            'films' => $films
        ]);
    }

    #[Route('/films/{id}', name: 'app_films_show', methods: ('GET'))]
    public function show(ApiFilms $apiFilms, int $id): Response
    {
        $film = $apiFilms->getFilmById($id);
        return $this->render('film/show.html.twig', [
            'controller_name' => 'FilmController',
            'film' => $film
        ]);
    }
}
