<?php

namespace App\Repository;

use App\Entity\TblNewsLetter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TblNewsLetter|null find($id, $lockMode = null, $lockVersion = null)
 * @method TblNewsLetter|null findOneBy(array $criteria, array $orderBy = null)
 * @method TblNewsLetter[]    findAll()
 * @method TblNewsLetter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TblNewsLetterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TblNewsLetter::class);
    }

    // /**
    //  * @return TblNewsLetter[] Returns an array of TblNewsLetter objects
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
    public function findOneBySomeField($value): ?TblNewsLetter
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
