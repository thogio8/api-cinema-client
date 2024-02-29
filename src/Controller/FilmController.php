<?php

namespace App\Controller;

use App\Services\ApiFilms;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FilmController extends AbstractController
{
    #[Route('/films', name: 'app_films', methods: ('GET'))]
    public function index(ApiFilms $apiFilms): Response
    {
        $films = $apiFilms->getFilms();
        return $this->render('film/index.html.twig', [
            'controller_name' => 'FilmController',
            'films' => $films
        ]);
    }
}
