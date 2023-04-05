<?php

namespace App\Controller;

use App\Service\TrickService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'app_home')]
    public function home(TrickService $trickService): Response
    {
        return $this->render('layouts/home.html.twig',
                            ['tricks' => $trickService->getTricks()]);
    }
}