<?php
namespace App\Service;

class TokenGenerator
{

    public function __construct(private string $signingKey)
    {
    }

    public function createToken(string $userId, string $email): string
    {
        $encodedData = json_encode([$userId, $email]);

        return base64_encode(hash_hmac('sha256', $encodedData, $this->signingKey, true));
    }
}