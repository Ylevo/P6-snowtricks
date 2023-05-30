<?php

namespace App\Service;

use App\Entity\Trick;
use App\Repository\MediaRepository;
use App\Repository\MediaTypeRepository;
use App\Repository\TrickRepository;
use App\Service\ImageUploader;
use \Symfony\Component\Form\FormInterface;

class TrickService {

    public function __construct(private MediaTypeRepository $mediaTypeRepository,
                                private ImageUploader $imageUploader,
                                private TrickRepository $trickRepository
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
            $str = mb_substr($name, 0, $limit, "utf-8");
        }
        $slug = html_entity_decode($name, ENT_QUOTES, 'UTF-8');
        // replace non letter or digits by -
        $slug = preg_replace('~[^\\pL\d]+~u', '-', $slug);
        // trim
        $slug = trim($slug, '-');
        $slug = strtolower($slug);
        $suffix = 1;
        $slugged = $slug;
        while($this->trickRepository->checkIfSlugAlreadyExists($slugged, $trickId))
        {
            $slugged = $slug . '-' . $suffix;
            $suffix++;
        }

        $trick->setSlug($slugged);
    }
}