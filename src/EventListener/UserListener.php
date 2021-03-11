<?php

namespace Application\BackendBundle\EventListener;

use App\Entity\User;
use App\Entity\WatchedMovies;
use Doctrine\ORM\Event\LifecycleEventArgs;


class UserEntityListener
{

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof User) {
            $watchedMovies = new WatchedMovies;
            $entity->setWatchedMovies($watchedMovies);
        }
    }
}