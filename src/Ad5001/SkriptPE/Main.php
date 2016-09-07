<?php
namespace Ad5001\SkriptPE;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use Ad5001\SkriptPE\dummy8;
use Ad5001\SkriptPE\dummy7;
use Ad5001\SkriptPE\dummy6;
use Ad5001\SkriptPE\dummy5;
use Ad5001\SkriptPE\dummy4;
use Ad5001\SkriptPE\dummy3;
use Ad5001\SkriptPE\dummy2;
use Ad5001\SkriptPE\dummy1;


class Main extends PluginBase{


    private $skrips;


   public function onEnable(){
       @mkdir($this->getDataFolder());
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->skripts = [];
        foreach(scandir($this->getDataFolder()) as $file) {
            if(!is_null(pathinfo($file, PATHINFO_EXTENSION))) {
                if (pathinfo($file, PATHINFO_EXTENSION) == "sk") {
                    $this->scipts[] = new Skript($this->getDataFolder() . $file);
                }
            }
        }
    }
}