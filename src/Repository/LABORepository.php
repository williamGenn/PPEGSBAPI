<?php

namespace App\Repository;

use App\Entity\labo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method labo|null find($id, $lockMode = null, $lockVersion = null)
 * @method labo|null findOneBy(array $criteria, array $orderBy = null)
 * @method labo[]    findAll()
 * @method labo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class laboRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, labo::class);
    }

    // /**
    //  * @return labo[] Returns an array of labo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?labo
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
