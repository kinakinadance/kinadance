<?php

namespace App\Repository;

use App\Entity\TblUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TblUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblUser[]    findAll()
 * @method TblUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TblUser::class);
    }

    // /**
    //  * @return TblUser[] Returns an array of TblUser objects
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
    public function findOneBySomeField($value): ?TblUser
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
