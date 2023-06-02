<?php
namespace App\Exception\Interface;

interface ResetPasswordExceptionInterface extends \Throwable
{
    public function getReason(): string;
}