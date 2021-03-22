<?php

namespace App\Repository;

use App\Entity\DOSAGE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DOSAGE|null find($id, $lockMode = null, $lockVersion = null)
 * @method DOSAGE|null findOneBy(array $criteria, array $orderBy = null)
 * @method DOSAGE[]    findAll()
 * @method DOSAGE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DOSAGERepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, dosage::class);
    }

    // /**
    //  * @return DOSAGE[] Returns an array of DOSAGE objects
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
    public function findOneBySomeField($value): ?DOSAGE
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
