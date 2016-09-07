<?php
namespace Ad5001\SkriptPE;

use pocketmine\Server;
use pocketmine\Player;

use Ad5001\SkriptPE\Main;



class Dummy2 {


   public function __construct(Main $main) {
        $this->main = $main;
        $this->server = $main->getServer()
    }


}