<?php

namespace App\Repository;

use App\Entity\Joueur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Joueur>
 *
 * @method Joueur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Joueur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Joueur[]    findAll()
 * @method Joueur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoueurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Joueur::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Joueur $entity, bool $flush = true): void
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
    public function remove(Joueur $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

     /**
      * @return Joueur[] Returns an array of Joueur objects
      */
    public function findPasEncoreJoueurDuJour()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT j.id FROM joueur j
            WHERE j.id NOT IN 
                  (SELECT joueur_id FROM joueur_du_jour)
            ORDER BY RAND()
            LIMIT 1;
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchOne();
    }

    /**
     * @return Joueur[] Returns an array of Joueur objects
     */
    public function findRandomJoueur()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT  j.id FROM joueur j
            ORDER BY RAND()
            LIMIT 1;
            ';
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchOne();
    }

    /**
     */
    public function findJoueursEssais($text)
    {
        return $this->createQueryBuilder('j')
            ->where('CONCAT(j.nom, \' \', j.prenom) LIKE :text')
            ->setParameter('text', '%'.$text.'%')
            ->getQuery()
            ->getArrayResult()
            ;
    }

    /*
    public function findOneBySomeField($value): ?Joueur
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
