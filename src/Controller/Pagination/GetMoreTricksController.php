<?php

namespace App\Controller\Pagination;

use App\Entity\Trick;
use App\Repository\TrickRepository;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class GetMoreTricksController extends AbstractController
{
    #[Route(path: '/more-tricks/{page}', name: 'app_more_tricks')]
    public function getMoreTricks(TrickRepository $trickRepository, SerializerInterface $serializer, int $page): JsonResponse
    {
        $moreTricks = $trickRepository->findBy([],['creationDate' => 'ASC'], 10, ($page * 10));
        $data = $serializer->normalize($moreTricks, 'json', ['groups' => 'tricksPagination']);
        return $this->json(['tricks' => $data,
                            'isLoggedIn' => $this->isGranted('IS_AUTHENTICATED_FULLY'),
                            'numberOfTricksReturned' => sizeof($moreTricks)]);
    }
}