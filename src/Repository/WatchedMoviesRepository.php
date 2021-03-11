<?php

namespace App\Repository;

use App\Entity\WatchedMovies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WatchedMovies|null find($id, $lockMode = null, $lockVersion = null)
 * @method WatchedMovies|null findOneBy(array $criteria, array $orderBy = null)
 * @method WatchedMovies[]    findAll()
 * @method WatchedMovies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WatchedMoviesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WatchedMovies::class);
    }

    // /**
    //  * @return WatchedMovies[] Returns an array of WatchedMovies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WatchedMovies
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
