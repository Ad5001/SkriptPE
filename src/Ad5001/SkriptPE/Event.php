<?php
namespace Ad5001\SkriptPE;

use pocketmine\Server;
use pocketmine\Player;

use Ad5001\SkriptPE\Main;



class Event {

    const EVENTS = [
        "on bed enter", "on bed entering", "on enter bed", "on player enter bed", "on player enter a bed", "on entering bed", "on player entering bed", "on player entering a bed",  "on enter a bed", "on entering a bed", "bed enter", "bed entering", "enter bed", "player enter bed", "player enter a bed", "entering bed", "player entering bed", "player entering a bed",  "enter a bed", "entering a bed", 
        "on bed leave", "on bed leaving", "on leave bed", "on player leave bed", "on player leave a bed", "on leaving bed", "on player leaving bed", "on player leaving a bed",  "on leave a bed", "on leaving a bed", "bed leave", "bed leaving", "leave bed", "player leave bed", "player leave a bed", "leaving bed", "player leaving bed", "player leaving a bed",  "leave a bed", "leaving a bed",
        "on block damage", "block damage",
        "on mine", "on block mine", "on mining", "on block mining", "on mine of", "on block mine of", "on mining of", "on block mining of",
        "on bucket fill", "on bucket filling", "on fill bucket", "on player fill bicket", "on player filling a bed", "on filling bucket", "on player filling bucket", "on player filling a bucket",  "on filling a bucket", "on filling a bucket", "bucket fill", "bucket filling", "fill bucket", "player fill bucket", "player fill a bucket", "filling bucket", "player filling bucket", "player filling a bucket",  "fill a bucket", "filling a bucket",
        "on bucket empty", "on bucket emptying", "on empty bucket", "on player empty bicket", "on player emptying a bed", "on emptying bucket", "on player emptying bucket", "on player emptying a bucket",  "on emptying a bucket", "on emptying a bucket", "bucket empty", "bucket emptying", "empty bucket", "player empty bucket", "player empty a bucket", "emptying bucket", "player emptying bucket", "player emptying a bucket",  "empty a bucket", "emptying a bucket",
        "on burn", "on block burn", "on burning", "on block burning",
        "on can build check", "on block can build check", "can build check", "block can build check"
    ];
    const PREGEVENTS = [
         "/\on block mining of (.+?)/is", "/\on mine of (.+?)/is", "/\on block mine of (.+?)/is", "/\on mining of (.+?)/is", "/\on block breaking of (.+?)/is", "/\on break of (.+?)/is", "/\on block break of (.+?)/is", "/\on breaking of (.+?)/is", 
         "/\on block burning of (.+?)/is", "/\on burn of (.+?)/is", "/\on block burn of (.+?)/is", "/\on burning of (.+?)/is",


    ];
    const BEDENDTER = ["on bed enter", "on bed entering", "on enter bed", "on player enter bed", "on player enter a bed", "on entering bed", "on player entering bed", "on player entering a bed",  "on enter a bed", "on entering a bed", "bed enter", "bed entering", "enter bed", "player enter bed", "player enter a bed", "entering bed", "player entering bed", "player entering a bed",  "enter a bed", "entering a bed"];
    const BEDLEAVE = ["on bed leave", "on bed leaving", "on leave bed", "on player leave bed", "on player leave a bed", "on leaving bed", "on player leaving bed", "on player leaving a bed",  "on leave a bed", "on leaving a bed", "bed leave", "bed leaving", "leave bed", "player leave bed", "player leave a bed", "leaving bed", "player leaving bed", "player leaving a bed",  "leave a bed", "leaving a bed"];
    const BLOCKDAMAGE = ["on block damage", "block damage"];
    const BLOCKMINE = ["on mine", "on block mine", "on mining", "on block mining", "/\on block mining of (.+?)/is", "/\on mine of (.+?)/is", "/\on block mine of (.+?)/is", "/\on mining of (.+?)/is", "on break", "on block break", "on breaking", "on block breaking", "/\on block breaking of (.+?)/is", "/\on break of (.+?)/is", "/\on block break of (.+?)/is", "/\on breaking of (.+?)/is", ];
    const BUCKETFILL = ["on bucket fill", "on bucket filling", "on fill bucket", "on player fill bicket", "on player filling a bed", "on filling bucket", "on player filling bucket", "on player filling a bucket",  "on filling a bucket", "on filling a bucket", "bucket fill", "bucket filling", "fill bucket", "player fill bucket", "player fill a bucket", "filling bucket", "player filling bucket", "player filling a bucket",  "fill a bucket", "filling a bucket"];
    const BUCKETEMPTY = ["on bucket empty", "on bucket emptying", "on empty bucket", "on player empty bicket", "on player emptying a bed", "on emptying bucket", "on player emptying bucket", "on player emptying a bucket",  "on emptying a bucket", "on emptying a bucket", "bucket empty", "bucket emptying", "empty bucket", "player empty bucket", "player empty a bucket", "emptying bucket", "player emptying bucket", "player emptying a bucket",  "empty a bucket", "emptying a bucket"];
    const BLOCKBURN = ["on burn", "on block burn", "on burning", "on block burning", "/\on block burning of (.+?)/is", "/\on burn of (.+?)/is", "/\on block burn of (.+?)/is", "/\on burning of (.+?)/is"];
    const BLOCKBUILDCHECK = ["on can build check", "on block can build check", "can build check", "block can build check"];


   public function __construct(Skript $sk, string $called, string $code) {
        $this->sk = $sk;
        $this->called = $called;
        $this->code = new Code($code);
        $this->getServer()->registerEvent($this->getServer()->getPluginManager()->getPlugin('SkriptPE'), $this);
   }


   private function getServer() {
       return Server::getInstance();
   }


   public function onPlayerBedEnter(\pocketmine\event\PlayerBedEnterEvent $event) {
       if(in_array($this->called, self::BEDENTER)) {
           $this->code->executeEv(["player" => $event->getPlayer()], $event);
       }
   }


}