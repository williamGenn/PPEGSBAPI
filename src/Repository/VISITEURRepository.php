<?php

namespace App\Repository;

use App\Entity\visiteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VISITEUR|null find($id, $lockMode = null, $lockVersion = null)
 * @method VISITEUR|null findOneBy(array $criteria, array $orderBy = null)
 * @method VISITEUR[]    findAll()
 * @method VISITEUR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VISITEURRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, visiteur::class);
    }

    // /**
    //  * @return VISITEUR[] Returns an array of VISITEUR objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VISITEUR
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
