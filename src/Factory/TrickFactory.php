<?php

namespace App\Factory;

use App\Entity\Trick;
use App\Repository\TrickRepository;
use App\Service\TrickService;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Trick>
 *
 * @method        Trick|Proxy create(array|callable $attributes = [])
 * @method static Trick|Proxy createOne(array $attributes = [])
 * @method static Trick|Proxy find(object|array|mixed $criteria)
 * @method static Trick|Proxy findOrCreate(array $attributes)
 * @method static Trick|Proxy first(string $sortedField = 'id')
 * @method static Trick|Proxy last(string $sortedField = 'id')
 * @method static Trick|Proxy random(array $attributes = [])
 * @method static Trick|Proxy randomOrCreate(array $attributes = [])
 * @method static TrickRepository|RepositoryProxy repository()
 * @method static Trick[]|Proxy[] all()
 * @method static Trick[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Trick[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Trick[]|Proxy[] findBy(array $attributes)
 * @method static Trick[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Trick[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class TrickFactory extends ModelFactory
{
    public function __construct(private TrickService $trickService)
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        return [
            'category' => TrickCategoryFactory::random(),
            'creationDate' => self::faker()->dateTime(),
            'description' => self::faker()->text(80),
            'lastModified' => new \DateTime(),
            'name' => self::faker()->city(),
            'slug' => self::faker()->text(15),
            'user' => UserFactory::random(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            ->afterInstantiate(function(Trick $trick): void {
                $this->trickService->slugify($trick);
            });
    }

    protected static function getClass(): string
    {
        return Trick::class;
    }
}
