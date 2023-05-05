<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'app_home')]
    public function home(TrickRepository $trickRepository): Response
    {
        return $this->render('layouts/home.html.twig',
                            ['tricks' => $trickRepository->findBy([], ['creationDate' => 'ASC'], 10)]);
    }
}