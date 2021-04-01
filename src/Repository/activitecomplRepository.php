<?php

namespace App\Repository;

use App\Entity\activitecompl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method activitecompl|null find($id, $lockMode = null, $lockVersion = null)
 * @method activitecompl|null findOneBy(array $criteria, array $orderBy = null)
 * @method activitecompl[]    findAll()
 * @method activitecompl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class activitecomplRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, activitecompl::class);
    }

    // /**
    //  * @return activitecompl[] Returns an array of activitecompl objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?activitecompl
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
