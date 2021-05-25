<?php

namespace App\Repository;

use App\Entity\Offre;
use App\Entity\medicament;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Offre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offre[]    findAll()
 * @method Offre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offre::class);
    }

    // /**
    //  * @return Offre[] Returns an array of Offre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Offre
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
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
        $offre_arr[] = $this->findOneById($value);
      }
      return $offre_arr;
    }

    public function findOrCreate($idOrArray, $doctrine) {
      if (is_array($idOrArray)) {
        return $this->create($idOrArray, $doctrine);
      }
      return $this->findOneBy($idOrArray);
    }

    public function create($array, $doctrine) {
      $off =  new Offre();
      $off->setQuantite((int)$array["Quantite"]);
      $meds = $doctrine->getRepository(medicament::class)->findById($array["Medicaments"]);
      $off->addMedicaments($meds);
    }

    public function findOrCreateSeveral($array, $doctrine) {
      $offres = array();
      foreach ($array as $value) {
        $a = $this->findOrCreate($value, $doctrine);
        if ($a != null) {
          $offres[] = $a;
        }
      }
    }

    public function findOneById($value): ?Offre
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
