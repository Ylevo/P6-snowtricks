<?php

namespace App\Repository;

use App\Entity\ResetPasswordRequest;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ResetPasswordRequest>
 *
 * @method ResetPasswordRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResetPasswordRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResetPasswordRequest[]    findAll()
 * @method ResetPasswordRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResetPasswordRequestRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResetPasswordRequest::class);
    }

    public function save(ResetPasswordRequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ResetPasswordRequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function createResetPasswordRequest(User $user, \DateTimeInterface $expiresAt, string $selector, string $hashedToken): ResetPasswordRequest
    {
        return new ResetPasswordRequest($user, $expiresAt, $selector, $hashedToken);
    }

    public function persistResetPasswordRequest(ResetPasswordRequest $resetPasswordRequest): void
    {
        $this->getEntityManager()->persist($resetPasswordRequest);
        $this->getEntityManager()->flush();
    }

    public function checkIfResetAlreadyRequested(int $userId) : bool
    {
        return $this->findOneBy(['user' => $userId]) != null;
    }

    public function removeExpiredResetPasswordRequests(): void
    {
        $time = new \DateTimeImmutable('-1 hour');
        $query = $this->createQueryBuilder('t')
            ->delete()
            ->where('t.expiresAt <= :time')
            ->setParameter('time', $time)
            ->getQuery()
        ;

        $query->execute();
    }
}
