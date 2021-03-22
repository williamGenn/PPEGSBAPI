<?php

namespace App\Repository;

use App\Entity\LABO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LABO|null find($id, $lockMode = null, $lockVersion = null)
 * @method LABO|null findOneBy(array $criteria, array $orderBy = null)
 * @method LABO[]    findAll()
 * @method LABO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LABORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, labo::class);
    }

    // /**
    //  * @return LABO[] Returns an array of LABO objects
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
    public function findOneBySomeField($value): ?LABO
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
