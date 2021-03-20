<?php

namespace App\Repository;

use App\Entity\Constitution;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Constitution|null find($id, $lockMode = null, $lockVersion = null)
 * @method Constitution|null findOneBy(array $criteria, array $orderBy = null)
 * @method Constitution[]    findAll()
 * @method Constitution[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConstitutionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Constitution::class);
    }

    // /**
    //  * @return Constitution[] Returns an array of Constitution objects
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
    public function findOneBySomeField($value): ?Constitution
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
