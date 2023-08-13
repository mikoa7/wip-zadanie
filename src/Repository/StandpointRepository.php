<?php

namespace App\Repository;

use App\Entity\Standpoint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Standpoint>
 *
 * @method Standpoint|null find($id, $lockMode = null, $lockVersion = null)
 * @method Standpoint|null findOneBy(array $criteria, array $orderBy = null)
 * @method Standpoint[]    findAll()
 * @method Standpoint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StandpointRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Standpoint::class);
    }

//    /**
//     * @return Standpoint[] Returns an array of Standpoint objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Standpoint
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
