<?php

namespace App\Security;

use App\Entity\User;
use App\Exception\ExpiredLinkException;
use App\Exception\InvalidLinkException;
use App\Exception\WrongEmailVerifyException;
use App\Repository\UserRepository;
use App\Service\TokenGenerator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpKernel\UriSigner;

class EmailVerifier
{
    public function __construct(
        private MailerInterface $mailer,
        private EntityManagerInterface $entityManager,
        private UserRepository $userRepository,
        private TokenGenerator $tokenGenerator,
        private UrlGeneratorInterface $router,
        private UriSigner $uriSigner
    ) {
    }

    public function sendEmailConfirmation(string $verifyEmailRouteName, UserInterface $user, TemplatedEmail $email): void
    {
        $expiresAt = time() + 3600;
        $token = $this->tokenGenerator->createVerifEmailToken($user->getId(), $user->getEmail());
        $uri = $this->router->generate($verifyEmailRouteName, [
            'id' => $user->getId(),
            'expires' => $expiresAt,
            'token' => $token ], UrlGeneratorInterface::ABSOLUTE_URL);

        $signedUrl = $this->uriSigner->sign($uri);

        $context = $email->getContext();
        $context['signedUrl'] = $signedUrl;

        $email->context($context);

        $this->mailer->send($email);
    }

    public function handleEmailConfirmation(Request $request): User
    {
        $user = $this->userRepository->find($request->query->get('id'));
        if (!$user) {
            throw new WrongEmailVerifyException();
        }

        if (!$this->uriSigner->check($request->getUri())) {
            throw new InvalidLinkException();
        }

        if ($request->query->get('expires') <= time()) {
            throw new ExpiredLinkException();
        }

        $knownToken = $this->tokenGenerator->createVerifEmailToken($user->getId(), $user->getEmail());
        $emailToken = $request->query->get('token');

        if (!hash_equals($knownToken, $emailToken)) {
            throw new WrongEmailVerifyException();
        }

        $user->setIsVerified(true);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}
