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

class TrickController extends AbstractController
{
    #[Route(path: '/trick/{slug}', name: 'app_trick_show')]
    public function show(Request $request,
                         EntityManagerInterface $entityManager,
                         Trick $trick): Response
    {
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            $comment = new Comment();

            $form = $this->createForm(CommentFormType::class, $comment);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

                $comment->setUser($this->getUser());
                $trick->addComment($comment);

                $entityManager->persist($comment);
                $entityManager->persist($trick);
                $entityManager->flush();

                $this->addFlash('success', 'New comment successfully added.');
                return $this->redirectToRoute('app_trick_show', ['slug' => $trick->getSlug()]);
            }

            return $this->render('layouts/trick.html.twig',
                ['trick' => $trick, 'form' => $form]);
        }
        return $this->render('layouts/trick.html.twig',
            ['trick' => $trick]);
    }
}