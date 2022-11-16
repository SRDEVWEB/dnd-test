<?php

namespace App\Components\Characters;

use App\Components\Bags\Bag;
use App\Components\Characters\Pets\Pet;
use App\Components\Items\Consumables\Consumable;
use App\Components\Items\Item;
use App\Components\Items\Shields\Shield;
use App\Components\Items\Weapons\Weapon;
use App\Interfaces\OwnershipInterface;

abstract class Character
{
    public static function changeBag(
        Character $char,
        int $bagSize
    ): void {
        $char->inventory = new Bag($bagSize);
        $char->inventory->setOwner($char);
    }


    /**
     * @var string : Character name
     */
    protected string $name;
    /**
     * @var \DateTime : Creation date
     */
    protected \DateTime $creationDate;
    /**
     * @var int : Physical power stat
     */
    protected int $phyPower;
    /**
     * @var int : Magical power stat
     */
    protected int $magPower;
    /**
     * @var int : Armor stat
     */
    protected int $armor;
    /**
     * @var int : Dodge stat
     */
    protected int $escape;
    /**
     * @var int : HP stat
     */
    protected int $life;
    /**
     * @var int : MP stat
     */
    protected int $mana;
    /**
     * @var Weapon|null : equipped weapon
     */
    protected ?Weapon $weapon;
    /**
     * @var Shield|null : equipped shield
     */
    protected ?Shield $shield;
    /**
     * @var Bag : backpack
     */
    protected Bag $inventory;
    /**
     * @var string : character class
     */
    protected string $classe;
    /**
     * @var array : equipable weapons
     */
    protected array $equipableWeapon = [];
    /**
     * @var bool : Can equip shield
     */
    protected bool $hasShield;
    /**
     * @var bool : Can equip a Pet
     */
    protected bool $hasPet;

    /**
     * @var Pet|null : equipped pet
     */
    protected ?Pet $pet;

    public function __construct(
        string $name,
        string $classe
    ) {
        $this->name = $name;
        $this->creationDate = new \DateTime();
        $this->phyPower = 10;
        $this->magPower = 10;
        $this->armor = 10;
        $this->escape = 10;
        $this->life = 10;
        $this->mana = 10;
        $this->weapon = null;
        $this->shield = null;

        $this->hasPet = true;

        self::changeBag($this, 24);

        $this->classe = $classe;
        $this->equipableWeapon = [];
        $this->hasShield = false;

        echo $this->getName().' is born'.PHP_EOL;
    }

    public function giveItemOrPet(OwnershipInterface $itemOrPet): self
    {
        $itemOrPet->setOwner($this);

        if ($itemOrPet instanceof Pet) {
            //  store as char's pet
            if (!$this->hasPet) {
                throw new \Exception('You can`t have a pet');
            }
            $this->setPet($itemOrPet);
        } elseif ($itemOrPet instanceof Item) {
            try {
                $this->inventory->addItem($itemOrPet);
            } catch (\Exception $e) {
                // todo handle exception
            }
        }

        return $this;
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
     * @return Character
     */
    public function setName(string $name): Character
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     * @return Character
     */
    public function setCreationDate(\DateTime $creationDate): Character
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhyPower(): int
    {
        return $this->phyPower;
    }

    /**
     * @param int $phyPower
     * @return Character
     */
    public function setPhyPower(int $phyPower): Character
    {
        $this->phyPower = $phyPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getMagPower(): int
    {
        return $this->magPower;
    }

    /**
     * @param int $magPower
     * @return Character
     */
    public function setMagPower(int $magPower): Character
    {
        $this->magPower = $magPower;

        return $this;
    }

    /**
     * @return int
     */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /**
     * @param int $armor
     * @return Character
     */
    public function setArmor(int $armor): Character
    {
        $this->armor = $armor;

        return $this;
    }

    /**
     * @return int
     */
    public function getEscape(): int
    {
        return $this->escape;
    }

    /**
     * @param int $escape
     * @return Character
     */
    public function setEscape(int $escape): Character
    {
        $this->escape = $escape;

        return $this;
    }

    /**
     * @return int
     */
    public function getLife(): int
    {
        return $this->life;
    }

    /**
     * @param int $life
     * @return Character
     */
    public function setLife(int $life): Character
    {
        $this->life = $life;

        return $this;
    }

    /**
     * @return int
     */
    public function getMana(): int
    {
        return $this->mana;
    }

    /**
     * @param int $mana
     * @return Character
     */
    public function setMana(int $mana): Character
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * @return Weapon|null
     */
    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    /**
     * @param Weapon|null $weapon
     * @return Character
     */
    public function setWeapon(?Weapon $weapon): Character
    {
        $this->weapon = $weapon;

        return $this;
    }

    /**
     * @return Shield|null
     */
    public function getShield(): ?Shield
    {
        return $this->shield;
    }

    /**
     * @param Shield|null $shield
     * @return Character
     */
    public function setShield(?Shield $shield): Character
    {
        $this->shield = $shield;

        return $this;
    }

    /**
     * @return Bag
     */
    public function getInventory(): Bag
    {
        return $this->inventory;
    }

    /**
     * @param Bag $inventory
     * @return Character
     */
    public function setInventory(Bag $inventory): Character
    {
        $this->inventory = $inventory;

        return $this;
    }

    /**
     * @return string
     */
    public function getClasse(): string
    {
        return $this->classe;
    }

    /**
     * @param string $classe
     * @return Character
     */
    public function setClasse(string $classe): Character
    {
        $this->classe = $classe;

        return $this;
    }

    public function useItem(Item $item): void
    {
        if ($item instanceof Consumable && $item->isUsed() === false) {
            // ====>
            if ($item->getType() === Consumable::CONSUMABLE_HEALTH) {
                $this->life += $item->getAmount();
                if ($this->life > 100) {
                    $this->life = 100;
                }
            } elseif ($item->getType() === Consumable::CONSUMABLE_MANA) {
                $this->mana += $item->getAmount();
                if ($this->mana > 100) {
                    $this->mana = 100;
                }
            }
            $item->setUsed(true);
            echo $this->getName() . " used " . $item->getName() . " and now has " . $this->getLife() . " HP and " . $this->getMana() . " MP" . PHP_EOL;
        }
        // TODO Personnage->useItem(Item $item)
    }

    // TODO - [public] useItem(Item $item) => if item.equipable === false

    /**
     * @param Item $item
     * @return bool
     */
    public function canEquip(Item $item): bool
    {
        if ($item instanceof Weapon) {
            return in_array($item->getWeaponClass(), $this->equipableWeapon, true);
        }

        if (($item instanceof Shield) && $this->hasShield === true) {
            return true;
        }
        if($item instanceof Shield && $this->getWeapon()?->isTwoHanded() === false) {
            return true;
        }

        return false;
    }

    /**
     * @throws \RuntimeException
     */
    public function equipItem(Item $item): void
    {
        // on check si l'item est dans l'inventaire du personnage courant
        if (!$this->getInventory()->hasItem($item)) {
            throw new \RuntimeException("You don't have this item in your inventory");
        }

        // on check si l'item est équipable
        if ($this->canEquip($item) === false) {
            throw new \RuntimeException("You can't equip this item");
        }
        echo $this->getName() . " equip " . $item->getName() . PHP_EOL;
        // si c'est un Weapon a deux main => on enlève le shield
        if($item instanceof Weapon && $item->isTwoHanded() === true) {
            $this->unequipItem($this->getShield());
            $this->weapon = $item;
        } else if($item instanceof Weapon) {
            // si c'est un Weapon a une seule main on equip
            $this->weapon = $item;
        } else if($item instanceof Shield) {
            // si c'est un shield on equip
            $this->shield = $item;
        }
    }

    public function unequipItem(Item $item): void
    {
        if ($item instanceof Weapon) {
            $this->setWeapon(null);
        }
        elseif ($item instanceof Shield) {
            $this->setShield(null);
        }
    }

    public function receiveDamage(int $damage): void
    {
        $this->life -= $damage;
        if ($this->life < 0) {
            $this->life = 0;
        }
        echo $this->name . " received " . $damage . " damage and now has " . $this->life . " life points left" . PHP_EOL;
        // TODO [public] receiveDamage(int $damage) : recevoir des dégats => code pour calculer les dégats
        // TODO $target->receiveDamage($damage);
    }

    public function attackTarget(Character $target): void
    {
        $damage = $this->phyPower;
        if ($this->weapon !== null) {
            $damage += $this->weapon->getDamage();
        }
        $target->receiveDamage($damage);
        // TODO - [public] attackTarget(Personnage $target) : attaquer un personnage => code pour calculer les dégats et l'utilisation de mana
    }

    // TODO $damage = [calcul des dmg];

    // private function isDodged(): bool
    // {
    //     // TODO - [private] isDodged() : calculer si le personnage a esquivé l'attaque mt_rand(0,  (escape - 100)) === (escape - 100)
    // }

    public function isAlive(): bool
    {
        if($this->life <= 0) {
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
    public function getEquipableWeapon(): array
    {
        return $this->equipableWeapon;
    }

    /**
     * @param array $equipableWeapon
     * @return Character
     */
    public function setEquipableWeapon(array $equipableWeapon): Character
    {
        $this->equipableWeapon = $equipableWeapon;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHasShield(): bool
    {
        return $this->hasShield;
    }

    /**
     * @param bool $hasShield
     * @return Character
     */
    public function setHasShield(bool $hasShield): Character
    {
        $this->hasShield = $hasShield;

        return $this;
    }

    /**
     * @return Pet|null
     */
    public function getPet(): ?Pet
    {
        return $this->pet;
    }

    /**
     * @param Pet|null $pet
     * @return Character
     */
    public function setPet(?Pet $pet): Character
    {
        $this->pet = $pet;
        $pet?->setOwner($this);
        if ($pet !== null) {
            echo $this->getName()." has summoned ".$pet->getName().PHP_EOL;
        }

        return $this;
    }

    public function removePet(): void
    {
        $this->pet?->setOwner(null);
        echo $this->getName()." has dismissed his pet".PHP_EOL;
        $this->pet = null;
    }
}