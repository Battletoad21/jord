<?php

namespace App\Repository;

use App\Entity\Hike;
use App\Entity\HikeSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hike|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hike|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hike[]    findAll()
 * @method Hike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hike::class);
    }

    /**
     * @return Query
     */
    public function findSearchedHike(HikeSearch $search)
    {
        $query = $this->createQueryBuilder('p');
            if ($search->getDifficulty()){
                $query = $query
                    ->andWhere('p.difficulty = :difficulty')
                    ->setParameter('difficulty', $search->getDifficulty());
            }

            if ($search->getPostalCode()){
                $query = $query
                    ->andWhere('p.postal_code LIKE :postalCode')
                    ->setParameter('postalCode', '%'.$search->getPostalCode().'%');
            }

        return $query->getQuery()->execute();
    }

    // /**
    //  * @return Hike[] Returns an array of Hike objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hike
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
