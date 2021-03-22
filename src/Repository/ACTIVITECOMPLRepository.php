<?php

namespace App\Repository;

use App\Entity\activitecompl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ACTIVITECOMPL|null find($id, $lockMode = null, $lockVersion = null)
 * @method ACTIVITECOMPL|null findOneBy(array $criteria, array $orderBy = null)
 * @method ACTIVITECOMPL[]    findAll()
 * @method ACTIVITECOMPL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ACTIVITECOMPLRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, activitecompl::class);
    }

    // /**
    //  * @return ACTIVITECOMPL[] Returns an array of ACTIVITECOMPL objects
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
    public function findOneBySomeField($value): ?ACTIVITECOMPL
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
