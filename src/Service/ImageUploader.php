<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class ImageUploader
{
    public function __construct(
        private SluggerInterface $slugger,
        private Thumbnailer $thumbnailer,
        private string $imgFolder
    ) {
    }

    public function upload(UploadedFile $image): string
    {
        $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();
        $movedImage = $image->move(
            $this->getImgFolder(),
            $newFilename
        );
        $this->thumbnailer->generateThumbnail($movedImage->getRealPath(), $newFilename);

        return $newFilename;
    }

    public function getImgFolder(): string
    {
        return $this->imgFolder;
    }
}