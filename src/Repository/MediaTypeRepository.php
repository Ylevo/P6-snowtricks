<?php

namespace App\Repository;

use App\Entity\MediaType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MediaType>
 *
 * @method MediaType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaType[]    findAll()
 * @method MediaType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MediaType::class);
    }

    public function save(MediaType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MediaType $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
