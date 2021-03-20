<?php

namespace App\Repository;

use App\Entity\POSSEDER;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method POSSEDER|null find($id, $lockMode = null, $lockVersion = null)
 * @method POSSEDER|null findOneBy(array $criteria, array $orderBy = null)
 * @method POSSEDER[]    findAll()
 * @method POSSEDER[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class POSSEDERRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, POSSEDER::class);
    }

    // /**
    //  * @return POSSEDER[] Returns an array of POSSEDER objects
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
    public function findOneBySomeField($value): ?POSSEDER
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
