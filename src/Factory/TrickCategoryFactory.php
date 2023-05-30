<?php

namespace App\Factory;

use App\Entity\TrickCategory;
use App\Repository\TrickCategoryRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<TrickCategory>
 *
 * @method        TrickCategory|Proxy create(array|callable $attributes = [])
 * @method static TrickCategory|Proxy createOne(array $attributes = [])
 * @method static TrickCategory|Proxy find(object|array|mixed $criteria)
 * @method static TrickCategory|Proxy findOrCreate(array $attributes)
 * @method static TrickCategory|Proxy first(string $sortedField = 'id')
 * @method static TrickCategory|Proxy last(string $sortedField = 'id')
 * @method static TrickCategory|Proxy random(array $attributes = [])
 * @method static TrickCategory|Proxy randomOrCreate(array $attributes = [])
 * @method static TrickCategoryRepository|RepositoryProxy repository()
 * @method static TrickCategory[]|Proxy[] all()
 * @method static TrickCategory[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static TrickCategory[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static TrickCategory[]|Proxy[] findBy(array $attributes)
 * @method static TrickCategory[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static TrickCategory[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class TrickCategoryFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

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
            // ->afterInstantiate(function(TrickCategory $trickCategory): void {})
        ;
    }

    protected static function getClass(): string
    {
        return TrickCategory::class;
    }
}
