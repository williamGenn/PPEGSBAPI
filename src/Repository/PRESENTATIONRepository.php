<?php

namespace App\Repository;

use App\Entity\PRESENTATION;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PRESENTATION|null find($id, $lockMode = null, $lockVersion = null)
 * @method PRESENTATION|null findOneBy(array $criteria, array $orderBy = null)
 * @method PRESENTATION[]    findAll()
 * @method PRESENTATION[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PRESENTATIONRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PRESENTATION::class);
    }

    // /**
    //  * @return PRESENTATION[] Returns an array of PRESENTATION objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PRESENTATION
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
