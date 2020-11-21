<?php

namespace App\Repository;

use App\Entity\PartSoura;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartSoura|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartSoura|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartSoura[]    findAll()
 * @method PartSoura[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartSouraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartSoura::class);
    }

    // /**
    //  * @return PartSoura[] Returns an array of PartSoura objects
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
    public function findOneBySomeField($value): ?PartSoura
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
