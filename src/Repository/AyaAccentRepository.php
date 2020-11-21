<?php

namespace App\Repository;

use App\Entity\AyaAccent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AyaAccent|null find($id, $lockMode = null, $lockVersion = null)
 * @method AyaAccent|null findOneBy(array $criteria, array $orderBy = null)
 * @method AyaAccent[]    findAll()
 * @method AyaAccent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AyaAccentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AyaAccent::class);
    }

    // /**
    //  * @return AyaAccent[] Returns an array of AyaAccent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AyaAccent
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
