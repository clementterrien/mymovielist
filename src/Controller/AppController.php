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
        $results = $service->getTrendings('movie', 'week');
        dd($results);
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController'
        ]);
    }
}
