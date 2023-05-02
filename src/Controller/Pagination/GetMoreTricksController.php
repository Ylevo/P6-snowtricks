<?php

namespace App\Controller\Pagination;

use App\Entity\Trick;
use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class GetMoreTricksController extends AbstractController
{
    #[Route(path: '/more-tricks/{slug}/{page}', name: 'app_more_tricks')]
    public function getMoreTricks(TrickRepository $trickRepository, Trick $trick, int $page): JsonResponse
    {
        return new JsonResponse();
    }
}