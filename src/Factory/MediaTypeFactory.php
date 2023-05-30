<?php

namespace App\Factory;

use App\Entity\MediaType;
use App\Repository\MediaTypeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<MediaType>
 *
 * @method        MediaType|Proxy create(array|callable $attributes = [])
 * @method static MediaType|Proxy createOne(array $attributes = [])
 * @method static MediaType|Proxy find(object|array|mixed $criteria)
 * @method static MediaType|Proxy findOrCreate(array $attributes)
 * @method static MediaType|Proxy first(string $sortedField = 'id')
 * @method static MediaType|Proxy last(string $sortedField = 'id')
 * @method static MediaType|Proxy random(array $attributes = [])
 * @method static MediaType|Proxy randomOrCreate(array $attributes = [])
 * @method static MediaTypeRepository|RepositoryProxy repository()
 * @method static MediaType[]|Proxy[] all()
 * @method static MediaType[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static MediaType[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static MediaType[]|Proxy[] findBy(array $attributes)
 * @method static MediaType[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static MediaType[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class MediaTypeFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'name' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(MediaType $mediaType): void {})
        ;
    }

    protected static function getClass(): string
    {
        return MediaType::class;
    }
}
