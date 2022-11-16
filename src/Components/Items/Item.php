<?php

namespace App\Components\Items;

use App\Interfaces\OwnershipInterface;
use App\Traits\IdAware;
use App\Traits\OwnershipAware;

abstract class Item implements OwnershipInterface
{
    use OwnershipAware;
    use IdAware;

    public const CAT_WEAPON = 'weapon';
    public const CAT_SHIELD = 'shield';
    public const CAT_ARMOR = 'armor';
    public const CAT_CONSUMABLE = 'consumable';
    public const CAT_POTION = 'potion';
    public const CAT_FOOD = 'food';
    public const CAT_KEY = 'key';
    public const CAT_QUEST = 'quest';
    public const CAT_MISC = 'misc';

    /**
     * @var string : Item name
     */
    protected string $name;
    /**
     * @var string : Item description
     */
    protected string $description;
    /**
     * @var bool : If item is equipable
     */
    protected bool $equipable;
    /**
     * @var string : Item category
     */
    protected string $category;
    /**
     * @var ?string : Item id
     */
    protected ?string $id;

    /**
     * @throws \Exception
     */
    public function __construct(
        string $name,
        string $description,
        bool   $equipable,
        string $category = self::CAT_MISC,
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->equipable = $equipable;
        $this->category = $category;
        $this->id = $this->generateId();

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Item
     */
    public function setName(string $name): Item
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Item
     */
    public function setDescription(string $description): Item
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEquipable(): bool
    {
        return $this->equipable;
    }

    /**
     * @param bool $equipable
     * @return Item
     */
    public function setEquipable(bool $equipable): Item
    {
        $this->equipable = $equipable;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Item
     */
    public function setCategory(string $category): Item
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return Item
     */
    public function setId(?string $id): Item
    {
        $this->id = $id;

        return $this;
    }
}