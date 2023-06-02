<?php
namespace App\Service;

class TokenGenerator
{

    public function __construct(private string $signingKey)
    {
    }

    public function createVerifEmailToken(string $userId, string $email): string
    {
        $encodedData = json_encode([$userId, $email]);

        return $this->createHashedToken($encodedData);
    }

    public function createResetPasswordToken(\DateTimeInterface $expiresAt, $userId, string $verifier = null) : array
    {
        if (null === $verifier) {
            $verifier = $this->getRandomAlphaNumStr();
        }

        $selector = $this->getRandomAlphaNumStr();

        $encodedData = json_encode([$verifier, $userId, $expiresAt->getTimestamp()]);

        return [
            'selector' => $selector,
            'verifier' => $verifier,
            'hashedToken' => $this->createHashedToken($encodedData)]
        ;
    }

    public function createHashedToken(string $data) : string
    {
        return base64_encode(hash_hmac('sha256', $data, $this->signingKey, true));
    }

    public function getRandomAlphaNumStr(): string
    {
        $string = '';

        while (($len = \strlen($string)) < 20) {
            $size = 20 - $len;

            $bytes = random_bytes($size);

            $string .= substr(
                str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return $string;
    }
}