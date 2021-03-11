<?php

namespace App\Service\TMDB_API_Service;

use Exception;
use Symfony\Component\HttpClient\HttpClient;


class TMDB_API {

    /** @required */
    private $api_key;
    /** @required */
    private $path;
    
    public function __construct(string $api_key, string $path)
    {
        $this->setApi_Key($api_key);
        $this->setPath($path);
        $this->client = HttpClient::create(['http_version' => '2.0']);
    }

    public function setApi_Key($api_key): self
    {
        $this->api_key = $api_key;

        return $this;
    }

    public function getApi_key(): string
    {
        return $this->api_key;
    }

    public function setPath($path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getTrendingsMovies(string $media_types, string $time_window): array{
        #Verify Parameters
        $response = $this->getTrendingsResponse($media_types, $time_window);
        $content = $response->toArray();

        return $content['results'];
    
    }
    public function getTrendingsResponse(string $media_types, string $time_window) {
        #Verify Parameters
        if (in_array($media_types, array("movie", "tv", "person")) == false || in_array($time_window, array("day", "week")) == false) {
            throw new Exception('You should not pass other parameters than the specified ones !');
        }

        $url = $this->path . 'trending/'. $media_types . '/'. $time_window .'?api_key=' . $this->api_key;
        $response = $this->client->request('GET', $url);

        return $response;
    }
}
