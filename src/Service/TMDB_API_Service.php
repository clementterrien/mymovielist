<?php

namespace App\Service\TMDB_API_Service;


class TMDB_API {
    
    private $api_key;
    
    public function __construct(string $api_key)
    {
        $this->setApi_Key($api_key);
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
}
