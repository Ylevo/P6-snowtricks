<?php
namespace App\Service;

use App\Entity\Trick;
use App\Repository\TrickRepository;

class TrickService
{
    public function __construct(
        private TrickRepository $trickRepository,
    ) {
    }

    public function getTricks(int $offset = 0, int $limit = 15): array
    {
        return $this->trickRepository->findSome($offset, $limit);
    }
}