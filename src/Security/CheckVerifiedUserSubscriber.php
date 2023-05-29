<?php
namespace App\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Event\CheckPassportEvent;

class CheckVerifiedUserSubscriber implements EventSubscriberInterface
{
    public function onCheckPassport(CheckPassportEvent $event)
    {
        $user = $event->getPassport()->getUser();
        if (!$user->IsVerified()) {
            throw new CustomUserMessageAuthenticationException(
                'Please verify your account before logging in.'
            );
        }
    }
    public static function getSubscribedEvents(): array
    {
        return [
            CheckPassportEvent::class => ['onCheckPassport', -10],
        ];
    }
}