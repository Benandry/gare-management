<?php

namespace App\Repository;

use App\Entity\Driver;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Driver>
 */
class DriverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $entityManagerInterface)
    {
        parent::__construct($registry, Driver::class);
    }
    public function save(Driver $driver)
    {
        $this->getEntityManager()->persist($driver);
        $this->getEntityManager()->flush();
        return $driver;
    }

    public function remove(Driver $driver)
    {
        $this->getEntityManager()->remove($driver);
        $this->getEntityManager()->flush();
    }
    public function update()
    {
        $this->getEntityManager()->flush();
    }
    //    /**
    //     * @return Driver[] Returns an array of Driver objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Driver
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
