<?php
namespace App\Exception;

use App\Exception\Interface\VerifyEmailExceptionInterface;

final class ExpiredLinkException extends \Exception implements VerifyEmailExceptionInterface
{
    public function getReason(): string
    {
        return 'The link to verify your email has expired. Please request a new link.';
    }
}