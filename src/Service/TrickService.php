<?php

namespace App\Service;

use App\Entity\Trick;
use App\Repository\MediaRepository;
use App\Repository\MediaTypeRepository;
use App\Service\ImageUploader;
use \Symfony\Component\Form\FormInterface;

class TrickService {

    public function __construct(private MediaTypeRepository $mediaTypeRepository,
                                private ImageUploader $imageUploader
    ){
    }

    public function handleImageMedias(Trick $trick, FormInterface $imageMediasListFromForm) : void
    {
        $imageMedias = $trick->getImageMedias();
        $imageType = $this->mediaTypeRepository->findOneBy(['name' => 'image']);
        $sizeOfMediaList = sizeof($imageMediasListFromForm);
        for ($i = 0; $i < $sizeOfMediaList; $i++) {
            $newImage = $imageMediasListFromForm[$i]->get('image')->getData();
            $fileName = $this->imageUploader->upload($newImage);
            $imageMedias[$i]->setUrl($fileName);
            $imageMedias[$i]->setType($imageType);
            $trick->addMedia($imageMedias[$i]);
        }

    }

    public function handleVideoMedias(Trick $trick) : void
    {
        foreach ($trick->getVideoMedias() as $videoMedia) {
            $trick->addMedia($videoMedia);
        }
    }
}