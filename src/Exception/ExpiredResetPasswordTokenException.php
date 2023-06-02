<?php
namespace App\Exception;

use App\Exception\Interface\ResetPasswordExceptionInterface;
use App\Exception\Interface\VerifyEmailExceptionInterface;

final class ExpiredResetPasswordTokenException extends \Exception implements ResetPasswordExceptionInterface
{
    public function getReason(): string
    {
        return 'This link has expired. Please try to reset your password again.';
    }
}