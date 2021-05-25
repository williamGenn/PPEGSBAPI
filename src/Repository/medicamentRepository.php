<?php

namespace App\Repository;

use App\Entity\medicament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method medicament|null find($id, $lockMode = null, $lockVersion = null)
 * @method medicament|null findOneBy(array $criteria, array $orderBy = null)
 * @method medicament[]    findAll()
 * @method medicament[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class medicamentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, medicament::class);
    }

    // /**
    //  * @return medicament[] Returns an array of medicament objects
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
    public function findOneBySomeField($value): ?medicament
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findById($arr)
    {
      if ($arr == null) {
        return null;
      }
      $offre_arr = array();
      foreach ($arr as &$value) {
        $a = $this->findOneById($value);
        if ($a != null) {
          $offre_arr[] = $a;
        }
      }
      return $offre_arr;
    }
    public function findOneById($value): ?medicament
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
