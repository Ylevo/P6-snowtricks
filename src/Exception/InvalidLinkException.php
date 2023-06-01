<?php
namespace App\Exception;

use App\Exception\Interface\VerifyEmailExceptionInterface;

final class InvalidLinkException extends \Exception implements VerifyEmailExceptionInterface
{
    public function getReason(): string
    {
        return 'The link to verify your email is invalid. Please request a new link.';
    }
}