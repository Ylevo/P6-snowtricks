<?php
namespace App\Service;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;

class Thumbnailer
{
    private const MAX_WIDTH = 250;
    private const MAX_HEIGHT = 250;

    private $imagine;

    public function __construct(private string $thumbnailFolder
    ) {
        $this->imagine = new Imagine();
    }

    public function generateThumbnail(string $file, string $fileName): void
    {
        list($iwidth, $iheight) = getimagesize($file);
        $ratio = $iwidth / $iheight;
        $width = self::MAX_WIDTH;
        $height = self::MAX_HEIGHT;
        if ($width / $height > $ratio) {
            $width = $height * $ratio;
        } else {
            $height = $width / $ratio;
        }

        $image = $this->imagine->open($file);
        $image->resize(new Box($width, $height))->save($this->thumbnailFolder . DIRECTORY_SEPARATOR . $fileName);
    }
}