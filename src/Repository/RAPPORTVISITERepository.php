<?php

namespace App\Repository;

use App\Entity\RAPPORTVISITE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RAPPORTVISITE|null find($id, $lockMode = null, $lockVersion = null)
 * @method RAPPORTVISITE|null findOneBy(array $criteria, array $orderBy = null)
 * @method RAPPORTVISITE[]    findAll()
 * @method RAPPORTVISITE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RAPPORTVISITERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RAPPORTVISITE::class);
    }

    // /**
    //  * @return RAPPORTVISITE[] Returns an array of RAPPORTVISITE objects
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
    public function findOneBySomeField($value): ?RAPPORTVISITE
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
