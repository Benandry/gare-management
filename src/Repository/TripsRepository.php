<?php

namespace App\Repository;

use App\Entity\Trips;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Trips>
 */
class TripsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $entityManagerInterface)
    {
        parent::__construct($registry, Trips::class);
    }
    public function save(Trips $trips)
    {
        $this->getEntityManager()->persist($trips);
        $this->getEntityManager()->flush();
        return $trips;
    }

    public function update(Trips $trips)
    {
        $this->getEntityManager()->flush();
    }

    public function remove(Trips $trips)
    {
        $this->getEntityManager()->remove($trips);
        $this->getEntityManager()->flush();
    }
    //    /**
    //     * @return Trips[] Returns an array of Trips objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Trips
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
