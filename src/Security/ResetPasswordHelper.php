<?php
namespace App\Security;

use App\Entity\User;
use App\Exception\AlreadyRequestedPasswordResetException;
use App\Exception\ExpiredResetPasswordTokenException;
use App\Exception\InvalidResetPasswordTokenException;
use App\Repository\ResetPasswordRequestRepository;
use App\Service\TokenGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;

class ResetPasswordHelper
{
    private const SELECTOR_LENGTH = 20;

    public function __construct(private TokenGenerator $tokenGenerator,
                                private ResetPasswordRequestRepository $resetPasswordRequestRepository)
    {}

    public function generateResetToken(User $user) : string
    {
        $this->resetPasswordRequestRepository->removeExpiredResetPasswordRequests();

        if ($this->resetPasswordRequestRepository->checkIfResetAlreadyRequested($user->getId()))
        {
            throw new AlreadyRequestedPasswordResetException();
        }

        $expiresAt = new \DateTimeImmutable('+1 hour');

        $tokenParts = $this->tokenGenerator->createResetPasswordToken($expiresAt, $user->getId());
        $passwordResetRequest = $this->resetPasswordRequestRepository->createResetPasswordRequest(
            $user,
            $expiresAt,
            $tokenParts['selector'],
            $tokenParts['hashedToken']
        );
        $this->resetPasswordRequestRepository->persistResetPasswordRequest($passwordResetRequest);

        return $tokenParts['selector'].$tokenParts['verifier'];
    }

    public function validateToken(string $token) : User
    {
        $this->resetPasswordRequestRepository->removeExpiredResetPasswordRequests();

        if (40 !== \strlen($token)) {
            throw new InvalidResetPasswordTokenException();
        }
        $selector = substr($token, 0, self::SELECTOR_LENGTH);

        $request = $this->resetPasswordRequestRepository->findOneBy(['selector' => $selector]);

        if (null === $request) {
            throw new InvalidResetPasswordTokenException();
        }

        if ($request->isExpired()) {
            $this->resetPasswordRequestRepository->remove($request, true);
            throw new ExpiredResetPasswordTokenException();
        }

        $user = $request->getUser();

        $hashedVerifierToken = $this->tokenGenerator->createResetPasswordToken(
            $request->getExpiresAt(),
            $user->getId(),
            substr($token, self::SELECTOR_LENGTH)
        );

        if (false === hash_equals($request->getHashedToken(), $hashedVerifierToken['hashedToken'])) {
            throw new InvalidResetPasswordTokenException();
        }

        return $user;
    }

    public function removeResetRequest(string $token): void
    {
        $selector = substr($token, 0, self::SELECTOR_LENGTH);
        $request = $this->resetPasswordRequestRepository->findOneBy(['selector' => $selector]);

        $this->resetPasswordRequestRepository->remove($request, true);
    }

}