<?php

namespace App\Exception;

use App\Exception\Interface\VerifyEmailExceptionInterface;

final class WrongEmailVerifyException extends \Exception implements VerifyEmailExceptionInterface
{
    public function getReason(): string
    {
        return 'The link to verify your email appears to be for a different account or email. Please request a new link.';
    }
}