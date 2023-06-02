<?php

namespace App\Service;

use App\Entity\Trick;
use App\Repository\MediaRepository;
use App\Repository\MediaTypeRepository;
use App\Repository\TrickRepository;
use App\Service\ImageUploader;
use \Symfony\Component\Form\FormInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class TrickService {

    public function __construct(private MediaTypeRepository $mediaTypeRepository,
                                private ImageUploader $imageUploader,
                                private TrickRepository $trickRepository,
                                private SluggerInterface $slugger
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

    public function slugify(Trick $trick, int $limit = 15) : void
    {
        $name = $trick->getName();
        $trickId = $trick->getId() ?? -1;

        if ($limit) {
            $name = mb_substr($name, 0, $limit, "utf-8");
        }

        $tempSlug = $this->slugger->slug($name)->lower();
        $suffix = 1;
        $slugged = $tempSlug;
        while ($this->trickRepository->checkIfSlugAlreadyExists($slugged, $trickId))
        {
            $slugged = $tempSlug . '-' . $suffix;
            $suffix++;
        }

        $trick->setSlug($slugged);
    }
}