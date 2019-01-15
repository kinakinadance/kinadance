<?php

namespace App\Repository;

use App\Entity\TblCourse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TblCourse|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblCourse|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblCourse[]    findAll()
 * @method TblCourse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblCourseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TblCourse::class);
    }

    // /**
    //  * @return TblCourse[] Returns an array of TblCourse objects
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
    public function findOneBySomeField($value): ?TblCourse
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
