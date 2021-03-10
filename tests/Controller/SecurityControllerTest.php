<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends WebTestCase
{
    public function testRegisterPage()
    {
        $client = static::createClient();
        $client->request($method = 'GET', $url = 'register');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
}
