<?php
namespace App\Exception;

use App\Exception\Interface\ResetPasswordExceptionInterface;
use App\Exception\Interface\VerifyEmailExceptionInterface;

final class InvalidResetPasswordTokenException extends \Exception implements ResetPasswordExceptionInterface
{
    public function getReason(): string
    {
        return 'The reset password link is invalid. Please try to reset your password again.';
    }
}