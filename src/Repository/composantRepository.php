<?php

namespace App\Repository;

use App\Entity\composant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method composant|null find($id, $lockMode = null, $lockVersion = null)
 * @method composant|null findOneBy(array $criteria, array $orderBy = null)
 * @method composant[]    findAll()
 * @method composant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class composantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, composant::class);
    }

    // /**
    //  * @return composant[] Returns an array of composant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?composant
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
