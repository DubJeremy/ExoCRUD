<?php

namespace App\Repository;

use App\Entity\IdCreature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IdCreature|null find($id, $lockMode = null, $lockVersion = null)
 * @method IdCreature|null findOneBy(array $criteria, array $orderBy = null)
 * @method IdCreature[]    findAll()
 * @method IdCreature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdCreatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IdCreature::class);
    }

    // /**
    //  * @return IdCreature[] Returns an array of IdCreature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IdCreature
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
