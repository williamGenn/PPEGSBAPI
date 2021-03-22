<?php

namespace App\Repository;

use App\Entity\typeIndividu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TYPEINDIVIDU|null find($id, $lockMode = null, $lockVersion = null)
 * @method TYPEINDIVIDU|null findOneBy(array $criteria, array $orderBy = null)
 * @method TYPEINDIVIDU[]    findAll()
 * @method TYPEINDIVIDU[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TYPEINDIVIDURepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, typeIndividu::class);
    }

    // /**
    //  * @return TYPEINDIVIDU[] Returns an array of TYPEINDIVIDU objects
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
    public function findOneBySomeField($value): ?TYPEINDIVIDU
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
