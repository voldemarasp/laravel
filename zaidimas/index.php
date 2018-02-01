<?php
 
interface WeaponInterface
{
 
}
 
interface ArmorInterface
{
 
}
 
interface PlayerInterface
{
 public function reduceHealth($amount);
}
 
abstract class StaticValuesWeapon implements WeaponInterface
{
     public function getMaxDamage() {
        $this->MaximumDamage;
    }
    public function getMinDamage() {
        $this->MinimumDamage;
    }
    public function getName() {
        $this->Name;
    }
}
 
class Game {
 
    function __construct($player1, $player2) {
       
        $this->player1 = $player1;
        $this->player2 = $player2;
 
    }
 
    public function start() {
 
        $name1 = $this->player1->name;
        $health1 = $this->player1->health;
        $weapon = $this->player1->weapon;
        $weaponMaximumDamage1 = $weapon->MaximumDamage;
        $weaponMinimumDamage1 = $weapon->MinimumDamage;
        $weaponCritDmg1 = $weapon->CritDmg;
        $armor1 = $this->player1->armor;
        $armorName1 = $armor1->Name;
        $armorAmount1 = $armor1->Amount;
 
        $name2 = $this->player2->name;
        $health2 = $this->player2->health;
        $weapon2 = $this->player2->weapon;
        $weaponName2 = $weapon2->Name;
        $weaponMaximumDamage2 = $weapon2->MaximumDamage;
        $weaponMinimumDamage2 = $weapon2->MinimumDamage;
        $weaponCritDmg2 = $weapon2->CritDmg;
        $armor2 = $this->player2->armor;
        $armorName2 = $armor2->Name;
        $armorAmount2 = $armor2->Amount;
 
       
 
        while (true) {
 
            $dmg1 = $this->calculateDamage($weaponMaximumDamage1, $weaponMinimumDamage1, $armorAmount1, $weaponCritDmg1);
            $dmg2 = $this->calculateDamage($weaponMaximumDamage2, $weaponMinimumDamage2, $armorAmount2, $weaponCritDmg1);

            $dmgDone1 = $dmg1[0];
            $dmgDone2 = $dmg2[0];

            if ($dmg1[1] == 'yes') {
                $critical = 'Critical';
            } else {
                $critical = '';
            }

            if ($dmg2[1] == 'yes') {
                $critical = 'Critical';
            } else {
                $critical = '';
            }

            $health1 = $this->player1->reduceHealth($dmg2[0]);
            $health2 = $this->player2->reduceHealth($dmg1[0]);
 
            echo 'Player ' . $name1 . '<br>HP remaining <span style="color:red;">' . $health1 . '</span> Damage done: <span style="color:orange;">' . $dmgDone2 . ' ' . $critical . '</span></span><br>';
            echo 'Player ' . $name2 . '<br>HP remaining <span style="color:red;">' . $health2 . '</span> Damage done: <span style="color:orange;">' . $dmgDone1 . ' ' . $critical . '</span><br>';
 
            if ($health1 <= 0) {
                echo '<span style="color:green; font-size: 20px;">Winner is ' . $name2 . '</span>';
            exit();
            } elseif ($health2 <= 0) {
                echo '<span style="color:green; font-size: 20px;">Winner is ' . $name1 . '</span>';
                exit();
            }
        }
 
    }
 
    public function calculateDamage($MaxDmg, $MinDmg, $Armor, $CritChance) {
        $this->MaxDmg = $MaxDmg;
        $this->MinDmg = $MinDmg;
        $this->Armor = $Armor;
        $this->CritChance = $CritChance;
 
        $randomDmg = mt_rand($MinDmg, $MaxDmg);
        $critical = mt_rand(0, 100);
        if ($CritChance > $critical) {
            $dmgDone =  $randomDmg * 2 * 100 / (100 + $Armor);
            $dmgDone = [floor($dmgDone), 'yes'];
        } else {
            $dmgDone =  $randomDmg * 100 / (100 + $Armor);
            $dmgDone = [floor($dmgDone), 'no'];
        }
        
        return $dmgDone;
    }
 
}
 
class Player implements PlayerInterface {
 
    function __construct($name, $health, $weapon, $armor) {
 
        $this->name = $name;
        $this->health = $health;
        $this->weapon = $weapon;
        $this->armor = $armor;
 
    }

    public function reduceHealth($amount) {
        $this->health = $this->health - $amount;
        return $this->health;
    }
 
}
 
class ClothArmor implements ArmorInterface {
    public $Name = 'Cloth armor';
    public $Amount = 10;
 
    public function getName() {
        return $this->Name;
    }
    public function getAmount() {
        return $this->Amount;
    }
}
 
class ChainVest implements ArmorInterface {
    public $Name = 'Chain Vest';
    public $Amount = 50;
 
    public function getName() {
    return $this->Name;
    }
    public function getAmount() {
    return $this->Amount;
    }
}
 
class NanoSuit implements ArmorInterface {
    public $Name = 'Nano Suit';
    public $Amount = 150;
 
    public function getName() {
    return $this->Name;
    }
    public function getAmount() {
    return $this->Amount;
    }
}
 
class Excalibur extends StaticValuesWeapon {
    public $Name = 'Excalibur';
    public $MinimumDamage = 100;
    public $MaximumDamage = 150;
    public $CritDmg = 30;
 
    public function getMaxDamage() {
    $this->MaximumDamage;
    }
    public function getMinDamage() {
    $this->MinimumDamage;
    }
    public function getName() {
    $this->Name;
    }
}
 
class Pickaxe extends StaticValuesWeapon {
    public $Name = 'Pickaxe';
    public $MinimumDamage = 50;
    public $MaximumDamage = 100;
    public $CritDmg = 20;
 
    public function getMaxDamage() {
    $this->MaximumDamage;
    }
    public function getMinDamage() {
        $this->MinimumDamage;
    }
    public function getName() {
        $this->Name;
    }
}
 
class MagicalScepter extends StaticValuesWeapon {
    public $Name = 'Magical Scepter';
    public $MinimumDamage = 10;
    public $MaximumDamage = 500;
    public $CritDmg = 10;
}
 
 
$excalibur = new Excalibur();
$ClothArmor = new ClothArmor();
$player1 = new Player('Jonas', 2000, $excalibur, $ClothArmor);
 
$MagicalScepter = new MagicalScepter();
$nanoSuit = new NanoSuit();
$player2 = new Player('Domantas', 2000, $MagicalScepter, $nanoSuit);
 
$game = new Game($player1, $player2);
 
echo $game->start();