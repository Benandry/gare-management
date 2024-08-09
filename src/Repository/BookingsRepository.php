<?php

namespace App\Repository;

use App\Entity\Bookings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bookings>
 */
class BookingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $entityManagerInterface)
    {
        parent::__construct($registry, Bookings::class);
    }

    public function save(Bookings $bookings)
    {
        $this->getEntityManager()->persist($bookings);
        $this->getEntityManager()->flush();
        return $bookings;
    }

    public function update(Bookings $bookings)
    {
        $this->getEntityManager()->flush();
        return $bookings;
    }

    public function remove(Bookings $bookings)
    {
        $this->getEntityManager()->remove($bookings);
        $this->getEntityManager()->flush();
    }

    //    /**
    //     * @return Bookings[] Returns an array of Bookings objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Bookings
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
