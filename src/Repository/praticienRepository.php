<?php

namespace App\Repository;

use App\Entity\praticien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method praticien|null find($id, $lockMode = null, $lockVersion = null)
 * @method praticien|null findOneBy(array $criteria, array $orderBy = null)
 * @method praticien[]    findAll()
 * @method praticien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class praticienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, praticien::class);
    }

    // /**
    //  * @return praticien[] Returns an array of praticien objects
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
    public function findOneBySomeField($value): ?praticien
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findOneById($value): ?praticien
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
