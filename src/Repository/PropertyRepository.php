<?php

namespace App\Repository;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Property::class);
    }

    
    /**
     * @return Property[]
     */

    public function findAllVisible(): array
    {
        return $this->finVisibleQuery()
        
        ->getQuery()
        ->getResult();
    }

    /**
     * @return Property[]
     */


    public function findLatest(): array
    {
        return $this->findaVisibleQuery()
        
        ->setMaxResults(4)
        ->getQuery()
        ->getResult();
    }
    private function findaVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
        ->where('p.sold = false');
    }

}
