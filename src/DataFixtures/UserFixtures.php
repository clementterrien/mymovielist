<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture 
{
    public function load(ObjectManager $manager){
        for ($i=0; $i < 10 ; $i++) { 
            $user = (new User())
                ->setEmail("user$i@domain.fr")
                ->setPassword("0000");
            $manager->persist($user);
        }
        $manager->flush();
    }    
}