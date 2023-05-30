<?php

namespace App\Factory;

use App\Entity\Media;
use App\Repository\MediaRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Media>
 *
 * @method        Media|Proxy create(array|callable $attributes = [])
 * @method static Media|Proxy createOne(array $attributes = [])
 * @method static Media|Proxy find(object|array|mixed $criteria)
 * @method static Media|Proxy findOrCreate(array $attributes)
 * @method static Media|Proxy first(string $sortedField = 'id')
 * @method static Media|Proxy last(string $sortedField = 'id')
 * @method static Media|Proxy random(array $attributes = [])
 * @method static Media|Proxy randomOrCreate(array $attributes = [])
 * @method static MediaRepository|RepositoryProxy repository()
 * @method static Media[]|Proxy[] all()
 * @method static Media[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Media[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Media[]|Proxy[] findBy(array $attributes)
 * @method static Media[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Media[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class MediaFactory extends ModelFactory
{
    const MEDIA_IMAGES = [
        'default_cover.jpg',
        'flip_back.jpg',
        'flip_front.jpg',
        'grab_indy.jpg',
        'grab_japan.jpg',
        'grab_mute.jpg',
        'grab_nose.jpg',
        'grab_sad.jpg',
        'grab_stalefish.jpg',
        'grab_tail.jpg',
        'slide_tail.jpg'
    ];

    CONST MEDIA_VIDEOS = [
        'https://youtube.com/watch?v=C-GPosr76KU',
        'https://youtube.com/watch?v=Yi3138Dslyc',
        'https://youtube.com/watch?v=8xAgsOaW1JM',
        'https://youtube.com/watch?v=iFnNqEo0F_U',
        'https://youtube.com/watch?v=B10BxYZqa1Q'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
            'altText' => self::faker()->text(15),
            'creationDate' => self::faker()->dateTime(),
            'lastModified' => self::faker()->dateTime(),
            'type' => MediaTypeFactory::random(),
            'url' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Media $media): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Media::class;
    }
}
