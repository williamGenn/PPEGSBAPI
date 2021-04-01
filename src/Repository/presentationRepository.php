<?php

namespace App\Repository;

use App\Entity\presentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method presentation|null find($id, $lockMode = null, $lockVersion = null)
 * @method presentation|null findOneBy(array $criteria, array $orderBy = null)
 * @method presentation[]    findAll()
 * @method presentation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class presentationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, presentation::class);
    }

    // /**
    //  * @return presentation[] Returns an array of presentation objects
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
    public function findOneBySomeField($value): ?presentation
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
