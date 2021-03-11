<?php

namespace App\Controller;

use App\Service\TMDB_API_Service\TMDB_API;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(TMDB_API $service): Response
    {
        $trend_movies = $service->getTrendingsMovies('movie', 'week');
        
        foreach ($trend_movies as $trend) {
            dump($trend);
        }
        return $this->render('app/index.html.twig', [
            'trend_movies' => $trend_movies
        ]);
    }
}
