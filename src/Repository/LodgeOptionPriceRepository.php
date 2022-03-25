<?php

namespace App\Repository;

use App\Entity\LodgeOptionPrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LodgeOptionPrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method LodgeOptionPrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method LodgeOptionPrice[]    findAll()
 * @method LodgeOptionPrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LodgeOptionPriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LodgeOptionPrice::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(LodgeOptionPrice $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(LodgeOptionPrice $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return LodgeOptionPrice[] Returns an array of LodgeOptionPrice objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LodgeOptionPrice
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
