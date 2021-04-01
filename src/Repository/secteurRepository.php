<?php

namespace App\Repository;

use App\Entity\secteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method secteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method secteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method secteur[]    findAll()
 * @method secteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class secteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, secteur::class);
    }

    // /**
    //  * @return secteur[] Returns an array of secteur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?secteur
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
