<?php

namespace App\Repository;

use App\Entity\medicament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MEDICAMENT|null find($id, $lockMode = null, $lockVersion = null)
 * @method MEDICAMENT|null findOneBy(array $criteria, array $orderBy = null)
 * @method MEDICAMENT[]    findAll()
 * @method MEDICAMENT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MEDICAMENTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, medicament::class);
    }

    // /**
    //  * @return MEDICAMENT[] Returns an array of MEDICAMENT objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MEDICAMENT
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
