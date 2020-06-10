<?php

namespace App\Repository\DataPersister;

use App\Entity\DataPersister\ClientDataPersister;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClientDataPersister|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientDataPersister|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientDataPersister[]    findAll()
 * @method ClientDataPersister[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientDataPersisterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientDataPersister::class);
    }

    // /**
    //  * @return ClientDataPersister[] Returns an array of ClientDataPersister objects
    //  */
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
    public function findOneBySomeField($value): ?ClientDataPersister
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
