<?php

declare(strict_types=1);

namespace Andreykuro\KuroOres;

use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;
use pocketmine\block\VanillaBlocks;
use pocketmine\world\World;
use pocketmine\math\Vector3;

class Main extends PluginBase{

    private array $probabilityList = [];

    protected function onEnable() : void{

        $this->probabilityList = [
            ...array_fill(0, 50, "cobblestone"),
            ...array_fill(0, 20, "coal_ore"),
            ...array_fill(0, 15, "iron_ore"),
            ...array_fill(0, 7, "gold_ore"),
            ...array_fill(0, 4, "redstone_ore"),
            ...array_fill(0, 2, "lapis_ore"),
            ...array_fill(0, 1, "emerald_ore"),
            ...array_fill(0, 1, "diamond_ore"),
        ];

        $this->getScheduler()->scheduleRepeatingTask(new ClosureTask(
            function() : void {

                try{

                    foreach($this->getServer()->getWorldManager()->getWorlds() as $world){

                        if(!$world instanceof World){
                            continue;
                        }

                        foreach($world->getPlayers() as $player){

                            if(!$player->isOnline()){
                                continue;
                            }

                            $base = $player->getPosition()->floor();

                            for($x = -2; $x <= 2; $x++){
                                for($y = -2; $y <= 2; $y++){
                                    for($z = -2; $z <= 2; $z++){

                                        $bx = $base->getX() + $x;
                                        $by = $base->getY() + $y;
                                        $bz = $base->getZ() + $z;

                                        if($by < 0 || $by > 255){
                                            continue;
                                        }

                                        if(!$world->isChunkLoaded($bx >> 4, $bz >> 4)){
                                            continue;
                                        }

                                        $blockPos = new Vector3($bx, $by, $bz);
                                        $block = $world->getBlock($blockPos);

                                        
                                        if($block->getTypeId() !== VanillaBlocks::COBBLESTONE()->getTypeId()){
                                            continue;
                                        }

                                        $choice = $this->probabilityList[array_rand($this->probabilityList)];
                                        $newBlock = $this->getBlockFromString($choice);

                                        if($newBlock === null){
                                            continue;
                                        }

                                        
                                        if($block->getTypeId() === $newBlock->getTypeId()){
                                            continue;
                                        }

                                        $world->setBlock($blockPos, $newBlock);
                                    }
                                }
                            }
                        }
                    }

                }catch(\Throwable $e){
                    $this->getLogger()->error("Task error: " . $e->getMessage());
                }

            }
        ), 2);
    }

    private function getBlockFromString(string $name){
        return match(strtolower($name)){
            "cobblestone" => VanillaBlocks::COBBLESTONE(),
            "coal_ore" => VanillaBlocks::COAL_ORE(),
            "iron_ore" => VanillaBlocks::IRON_ORE(),
            "gold_ore" => VanillaBlocks::GOLD_ORE(),
            "lapis_ore" => VanillaBlocks::LAPIS_LAZULI_ORE(),
            "redstone_ore" => VanillaBlocks::REDSTONE_ORE(),
            "emerald_ore" => VanillaBlocks::EMERALD_ORE(),
            "diamond_ore" => VanillaBlocks::DIAMOND_ORE(),
            default => null
        };
    }
}
