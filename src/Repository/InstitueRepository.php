<?php

namespace App\Repository;

use App\Entity\Institue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Institue>
 *
 * @method Institue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Institue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Institue[]    findAll()
 * @method Institue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstitueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Institue::class);
    }

//    /**
//     * @return Institue[] Returns an array of Institue objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Institue
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
