<?php

namespace App\Factory;

use App\Entity\Institue;
use App\Repository\InstitueRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Institue>
 *
 * @method        Institue|Proxy create(array|callable $attributes = [])
 * @method static Institue|Proxy createOne(array $attributes = [])
 * @method static Institue|Proxy find(object|array|mixed $criteria)
 * @method static Institue|Proxy findOrCreate(array $attributes)
 * @method static Institue|Proxy first(string $sortedField = 'id')
 * @method static Institue|Proxy last(string $sortedField = 'id')
 * @method static Institue|Proxy random(array $attributes = [])
 * @method static Institue|Proxy randomOrCreate(array $attributes = [])
 * @method static InstitueRepository|RepositoryProxy repository()
 * @method static Institue[]|Proxy[] all()
 * @method static Institue[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Institue[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Institue[]|Proxy[] findBy(array $attributes)
 * @method static Institue[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Institue[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class InstitueFactory extends ModelFactory
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
            'institue_id' => self::faker()->randomNumber(),
            'nomi' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Institue $institue): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Institue::class;
    }
}
