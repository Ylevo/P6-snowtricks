<?php

namespace App\Controller\Pagination;

use App\Entity\Trick;
use App\Repository\CommentRepository;
use App\Repository\TrickRepository;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Serializer\SerializerInterface;

class GetMoreCommentsController extends AbstractController
{
    #[Route(path: '/more-comments/{slug}/{page}', name: 'app_more_comments')]
    public function getMoreComments(CommentRepository $commentRepository, SerializerInterface $serializer, Trick $trick, int $page): JsonResponse
    {
        $moreComments = $commentRepository->findBy(['trick' => $trick],['creationDate' => 'DESC'], 5, ($page * 5));
        $data = $serializer->normalize($moreComments, 'json', ['groups' => 'commentsPagination']);
        return $this->json(['comments' => $data,
                            'numberOfCommentsReturned' => sizeof($moreComments)]);
    }
}