<?php

namespace App\Repository;

use App\Entity\TblCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TblCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblCategory[]    findAll()
 * @method TblCategory[]   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TblCategory::class);
    }

    // /**
    //  * @return TblCategory[] Returns an array of TblCategory objects
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
    public function findOneBySomeField($value): ?TblCategory
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
