<?php
namespace App\Exception\Interface;

interface VerifyEmailExceptionInterface extends \Throwable
{
    public function getReason(): string;
}