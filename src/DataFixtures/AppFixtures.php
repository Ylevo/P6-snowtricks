<?php

namespace App\DataFixtures;

use App\Factory\CommentFactory;
use App\Factory\MediaFactory;
use App\Factory\MediaTypeFactory;
use App\Factory\TrickCategoryFactory;
use App\Factory\TrickFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createSequence([
            ['email' => 'yoann.levrel@posteo.de'],
            ['email' => 'foobar@posteo.net']
        ]);

        MediaTypeFactory::createSequence([
                ['name' => 'youtube'],
                ['name' => 'vimeo'],
                ['name' => 'image']
        ]);

        TrickCategoryFactory::createSequence([
                ['name' => 'Grab'],
                ['name' => 'Rotation'],
                ['name' => 'Flip'],
                ['name' => 'Side']
        ]);

        MediaFactory::createSequence(
            function() {
                foreach(MediaFactory::MEDIA_IMAGES as $name) {
                    yield ['url' => $name, 'type' => MediaTypeFactory::find(['name' => 'image'])];
                }
                foreach(MediaFactory::MEDIA_VIDEOS as $name) {
                    yield ['url' => $name, 'type' => MediaTypeFactory::find(['name' => 'youtube'])];
                }
            }
        );

        TrickFactory::new()
            ->many(15)
            ->create(function () {
                return ['medias' => MediaFactory::randomRange(2, 7),
                    'mediaCover' => MediaFactory::random(['type' => MediaTypeFactory::find(['name' => 'image'])]),
                    'comments' => CommentFactory::new()->many(8)
                ];
            });

        $manager->flush();
    }
}
