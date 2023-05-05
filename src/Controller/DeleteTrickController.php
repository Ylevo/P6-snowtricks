<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentFormType;
use App\Service\TrickService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DeleteTrickController extends AbstractController
{
    #[Route(path: '/delete-trick/{slug}', name: 'app_trick_delete')]
    public function show(Request $request,
                         EntityManagerInterface $entityManager,
                         Trick $trick): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $trickName = $trick->getName();
        $entityManager->remove($trick);
        $entityManager->flush();
        $this->addFlash('success', 'Trick "'.$trickName.'" has been deleted.');

        return $this->redirectToRoute('app_home');
    }
}