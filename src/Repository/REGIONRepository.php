<?php

namespace App\Repository;

use App\Entity\region;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method region|null find($id, $lockMode = null, $lockVersion = null)
 * @method region|null findOneBy(array $criteria, array $orderBy = null)
 * @method region[]    findAll()
 * @method region[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class regionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, region::class);
    }

    // /**
    //  * @return region[] Returns an array of region objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?region
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
