<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, private EntityManagerInterface $entityManagerInterface)
    {
        parent::__construct($registry, Car::class);
    }

    public function save(Car $car)
    {
        $this->getEntityManager()->persist($car);
        $this->getEntityManager()->flush();
        return $car;
    }

    public function remove(Car $car)
    {
        $this->getEntityManager()->remove($car);
        $this->getEntityManager()->flush();
    }
    public function update()
    {
        $this->getEntityManager()->flush();
    }

    public function findAllWithDriver(int $limit = 10, int $offset = 0)
    {

        return $this->createQueryBuilder('c')
            ->leftJoin('c.driver', 'd') // Joins the Driver entity
            ->addSelect('d')
            ->getQuery()
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getResult();
    }

    //    /**
    //     * @return Car[] Returns an array of Car objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Car
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
