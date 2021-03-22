<?php

namespace App\Repository;

use App\Entity\region;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method REGION|null find($id, $lockMode = null, $lockVersion = null)
 * @method REGION|null findOneBy(array $criteria, array $orderBy = null)
 * @method REGION[]    findAll()
 * @method REGION[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class REGIONRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, region::class);
    }

    // /**
    //  * @return REGION[] Returns an array of REGION objects
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
    public function findOneBySomeField($value): ?REGION
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
