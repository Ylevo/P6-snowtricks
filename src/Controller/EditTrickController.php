<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Form\TrickFormType;
use App\Repository\MediaRepository;
use App\Repository\MediaTypeRepository;
use App\Service\ImageUploader;
use App\Service\Thumbnailer;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class EditTrickController extends AbstractController
{
    #[Route(path: '/edit-trick/{slug}', name: 'app_trick_edit')]
    public function editTrick(Trick $trick,
                             Request $request,
                             EntityManagerInterface $entityManager,
                             MediaRepository $mediaRepository,
                             MediaTypeRepository $mediaTypeRepository,
                             ImageUploader $imageUploader): Response
    {
        $form = $this->createForm(TrickFormType::class, $trick);
        try{
            dump($trick->getImageMedias());
        }
        catch (Exception $e)
        {
            return dump($trick);
        }
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

            $imageMediasListFromForm = $form->get('imageMedias');
            $imageMedias = $trick->getImageMedias();
            for ($i = 0; $i < sizeof($imageMediasListFromForm); $i++) {
                $newImage = $imageMediasListFromForm[$i]->get('image')->getData();
                try {
                    $fileName = $imageUploader->upload($newImage);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Uploading one of the files has failed.');
                    return $this->redirectToRoute('app_trick_show', ['slug' => $trick->getSlug()]);
                }
                $imageMedias[$i]->setUrl($fileName);
                $imageMedias[$i]->setType($mediaTypeRepository->findOneBy(['name' => 'image']));
                $trick->addMedia($imageMedias[$i]);
            }
            foreach ($trick->getVideoMedias() as $videoMedia) {
                $trick->addMedia($videoMedia);
            }

            $this->addFlash('success', 'Modifications to "'.$trick->getName().'" successfully saved.');

            $entityManager->persist($trick);
            $entityManager->flush();

            return $this->redirectToRoute('app_trick_show', ['slug' => $trick->getSlug()]);
        }

        return $this->render('layouts/create_edit_trick.html.twig', [
            'form' => $form->createView(),
            'trick' => $trick
        ]);
    }
}