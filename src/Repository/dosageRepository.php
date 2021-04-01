<?php

namespace App\Repository;

use App\Entity\dosage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method dosage|null find($id, $lockMode = null, $lockVersion = null)
 * @method dosage|null findOneBy(array $criteria, array $orderBy = null)
 * @method dosage[]    findAll()
 * @method dosage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class dosageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, dosage::class);
    }

    // /**
    //  * @return dosage[] Returns an array of dosage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?dosage
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
