<?php

namespace App\Service\TMDB_API_Service;

use Exception;
use Symfony\Component\HttpClient\HttpClient;


class TMDB_API {
    
    private $api_key;
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

    public function getTrendings(string $media_types, string $time_window) {
        #Verify Parameters
        if (in_array($media_types, array("movie", "tv", "person")) == false || in_array($time_window, array("day", "week")) == false)
        {
            throw new Exception('You should not pass other parameters than the specified ones !');
        }

        $url = $this->path . 'trending/all/day?api_key=' . $this->api_key;
        $response = $this->client->request('GET', $url);
        $content = $response->toArray();
        $content = $content['results'];

        return $content;
    }

}
