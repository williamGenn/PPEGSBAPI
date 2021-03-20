<?php

namespace App\Repository;

use App\Entity\SPECIALITE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SPECIALITE|null find($id, $lockMode = null, $lockVersion = null)
 * @method SPECIALITE|null findOneBy(array $criteria, array $orderBy = null)
 * @method SPECIALITE[]    findAll()
 * @method SPECIALITE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SPECIALITERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SPECIALITE::class);
    }

    // /**
    //  * @return SPECIALITE[] Returns an array of SPECIALITE objects
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
    public function findOneBySomeField($value): ?SPECIALITE
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
