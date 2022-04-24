<?php

namespace App\Repository;

use App\Entity\JoueurDuJour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JoueurDuJour>
 *
 * @method JoueurDuJour|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoueurDuJour|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoueurDuJour[]    findAll()
 * @method JoueurDuJour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoueurDuJourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JoueurDuJour::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(JoueurDuJour $entity, bool $flush = true): void
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
    public function remove(JoueurDuJour $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return JoueurDuJour[] Returns an array of JoueurDuJour objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JoueurDuJour
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
