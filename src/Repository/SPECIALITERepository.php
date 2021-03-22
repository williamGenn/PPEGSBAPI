<?php

namespace App\Repository;

use App\Entity\specialite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method specialite|null find($id, $lockMode = null, $lockVersion = null)
 * @method specialite|null findOneBy(array $criteria, array $orderBy = null)
 * @method specialite[]    findAll()
 * @method specialite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class specialiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, specialite::class);
    }

    // /**
    //  * @return specialite[] Returns an array of specialite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?specialite
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
