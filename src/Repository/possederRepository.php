<?php

namespace App\Repository;

use App\Entity\posseder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method posseder|null find($id, $lockMode = null, $lockVersion = null)
 * @method posseder|null findOneBy(array $criteria, array $orderBy = null)
 * @method posseder[]    findAll()
 * @method posseder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class possederRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, posseder::class);
    }

    // /**
    //  * @return posseder[] Returns an array of posseder objects
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
    public function findOneBySomeField($value): ?posseder
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
