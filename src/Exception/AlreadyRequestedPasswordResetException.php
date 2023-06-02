<?php
namespace App\Exception;

use App\Exception\Interface\ResetPasswordExceptionInterface;
use App\Exception\Interface\VerifyEmailExceptionInterface;

final class AlreadyRequestedPasswordResetException extends \Exception implements ResetPasswordExceptionInterface
{
    public function getReason(): string
    {
        return 'Message that will never be shown because why would you give that information?';
    }
}