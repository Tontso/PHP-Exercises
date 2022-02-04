<?php

class Trainer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $badges;

    /**
     * @var Pokemon[][]
     */
    private $pokemons;


    /**
     * Trainer constructor
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->badges = 0;
        $this->pokemons = [];
    }

    public function catchPokemon(Pokemon $pokemon): void
    {
        $this->pokemons[$pokemon->getElement()][] = $pokemon;
    }

    public function receiveBadge(): void
    {
        $this->badges++;
    }

    public function hasPokemonByElement(string $element): bool
    {
        return key_exists($element,$this->pokemons) && count($this->pokemons[$element]) > 0;
    }

    public function hitPokemons(int $damage): void
    {
        foreach($this->pokemons as $type => $pokemonsByType){
            foreach($pokemonsByType as $key => $pokemon){
                $pokemon->hit($damage);
                if(!$pokemon->isAlive()){
                    unset($this->pokemons[$type][$key]);
                }
            }
        }
    }
}



class Pokemon
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $element;

    /**
     * @var int
     */
    private $health;

    /**
     * @param string $name
     * @param string $element
     * @param int $health
     */
    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getElement(): string
    {
        return $this->element;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    public function hit(int $damage): void
    {
        $this->health -= $damage;
    }
}