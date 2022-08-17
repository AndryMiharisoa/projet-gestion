<?php

namespace App\Repository;

use App\Entity\Typographie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typographie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typographie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typographie[]    findAll()
 * @method Typographie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypographieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typographie::class);
    }

    // /**
    //  * @return Typographie[] Returns an array of Typographie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typographie
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
