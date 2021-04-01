<?php

namespace App\Repository;

use App\Entity\typeIndividu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method typeIndividu|null find($id, $lockMode = null, $lockVersion = null)
 * @method typeIndividu|null findOneBy(array $criteria, array $orderBy = null)
 * @method typeIndividu[]    findAll()
 * @method typeIndividu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class typeIndividuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, typeIndividu::class);
    }

    // /**
    //  * @return typeIndividu[] Returns an array of typeIndividu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?typeIndividu
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
