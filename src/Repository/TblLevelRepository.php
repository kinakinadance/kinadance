<?php

namespace App\Repository;

use App\Entity\TblLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TblLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblLevel[]    findAll()
 * @method TblLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblLevelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TblLevel::class);
    }

    // /**
    //  * @return TblLevel[] Returns an array of TblLevel objects
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
    public function findOneBySomeField($value): ?TblLevel
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
