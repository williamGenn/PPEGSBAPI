<?php

namespace App\Repository;

use App\Entity\SECTEUR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SECTEUR|null find($id, $lockMode = null, $lockVersion = null)
 * @method SECTEUR|null findOneBy(array $criteria, array $orderBy = null)
 * @method SECTEUR[]    findAll()
 * @method SECTEUR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SECTEURRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SECTEUR::class);
    }

    // /**
    //  * @return SECTEUR[] Returns an array of SECTEUR objects
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
    public function findOneBySomeField($value): ?SECTEUR
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
