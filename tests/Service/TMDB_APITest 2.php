<?php

namespace App\Tests\Service;

use App\Service\TMDB_API_Service\TMDB_API;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TMDB_API_Test extends WebTestCase {
    
    public function testTrendingsStatusCode() {

        $client = static::createClient();
        
        $container = self::$kernel->getContainer();
        $container = self::$container;
        
        $tmdb_api = self::$container->get('App\Service\TMDB_API_Service\TMDB_API');
        $response = $tmdb_api->getTrendingsResponse('movie', 'week');
        
        $this->assertEquals(200, $response->getStatusCode());
        // returns the real and unchanged service container
        // gets the special container that allows fetching private services

    }

    public function testTrendingMovies() {
        $client = static::createClient();
        
        $container = self::$kernel->getContainer();
        $container = self::$container;
        
        $tmdb_api = self::$container->get('App\Service\TMDB_API_Service\TMDB_API');
        $movies = $tmdb_api->getTrendingsMovies('movie', 'week');

        $this->assertIsArray($movies, 'TMDB::GetTrendingMovies should return an array.');
        $this->assertCount(20, $movies, 'TMDB::GetTrendingMovies should return an array of 20 elements.');
        
    }
}