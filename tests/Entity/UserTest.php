<?php

namespace App\Tests\Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase 
{
    public function testValidEntity(){
        $user = (new User())
            ->setEmail('bot@symfony.com')
            ->setRoles([])
            ->setPassword('0000');

        self::bootKernel();
        $error = self::$container->get('validator')->validate($user);
        $this->assertCount(0, $error);
    }
}