<?php

namespace App\Repository\PhpBin;

use App\Entity\PhpBin\consoleMakeEntityAsc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method consoleMakeEntityAsc|null find($id, $lockMode = null, $lockVersion = null)
 * @method consoleMakeEntityAsc|null findOneBy(array $criteria, array $orderBy = null)
 * @method consoleMakeEntityAsc[]    findAll()
 * @method consoleMakeEntityAsc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class consoleMakeEntityAscRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, consoleMakeEntityAsc::class);
    }

//    /**
//     * @return consoleMakeEntityAsc[] Returns an array of consoleMakeEntityAsc objects
//     */
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
    public function findOneBySomeField($value): ?consoleMakeEntityAsc
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
