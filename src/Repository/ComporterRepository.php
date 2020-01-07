<?php

namespace App\Repository;

use App\Entity\Comporter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Comporter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comporter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comporter[]    findAll()
 * @method Comporter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComporterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comporter::class);
    }

    // /**
    //  * @return Comporter[] Returns an array of Comporter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Comporter
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
