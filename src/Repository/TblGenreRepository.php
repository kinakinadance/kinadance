<?php

namespace App\Repository;

use App\Entity\TblGenre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TblGenre|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblGenre|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblGenre[]    findAll()
 * @method TblGenre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblGenreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TblGenre::class);
    }

    // /**
    //  * @return TblGenre[] Returns an array of TblGenre objects
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
    public function findOneBySomeField($value): ?TblGenre
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
