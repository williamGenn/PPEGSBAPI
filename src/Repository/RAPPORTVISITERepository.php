<?php

namespace App\Repository;

use App\Entity\rapportVisite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method rapportVisite|null find($id, $lockMode = null, $lockVersion = null)
 * @method rapportVisite|null findOneBy(array $criteria, array $orderBy = null)
 * @method rapportVisite[]    findAll()
 * @method rapportVisite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class rapportVisiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, rapportVisite::class);
    }

    // /**
    //  * @return rapportVisite[] Returns an array of rapportVisite objects
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
    public function findOneBySomeField($value): ?rapportVisite
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
