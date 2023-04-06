<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Service\TrickService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class TrickController extends AbstractController
{
    #[Route(path: '/trick/{slug}', name: 'app_trick_show')]
    public function show(Trick $trick): Response
    {
        return $this->render('layouts/trick.html.twig',
            ['trick' => $trick]);
    }
}