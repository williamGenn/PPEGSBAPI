<?php

namespace App\Repository;

use App\Entity\famille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method famille|null find($id, $lockMode = null, $lockVersion = null)
 * @method famille|null findOneBy(array $criteria, array $orderBy = null)
 * @method famille[]    findAll()
 * @method famille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class familleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, famille::class);
    }

    // /**
    //  * @return famille[] Returns an array of famille objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?famille
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
