<?php

namespace App\Repository;

use App\Entity\Aya;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aya|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aya|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aya[]    findAll()
 * @method Aya[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AyaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aya::class);
    }

    // /**
    //  * @return Aya[] Returns an array of Aya objects
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
    public function findOneBySomeField($value): ?Aya
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
