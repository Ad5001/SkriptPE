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
        "on can build check", "on block can build check", "can build check", "block can build check",
        "chat", "on chat",
        "on chunk generate", "on chunk populate", "on chunk generating", "on chunk populating", "chunk generate", "chunk populate", "chunk generating", "chunk populating",
        "on chunk load", "on chunk loading", "chunk load", "chunk loading",
        "on chunk unload", "on chunk unloading", "chunk unload", "chunk unloading",
        "on click", "on clicking",
        "on rightclick", "on rightclicking",
        "on leftclick", "on leftclicking",
        "on combust", "on combusting", "combust", "combusting",
        "on command", "command",
        "on connect", "on player connect", "on connecting", "on player connecting", "connect", "player connect", "connecting", "player connecting",
        "on eat", "on drink", "on consume", "on eating", "on drinking", "on consuming", "on player eat", "on player drink", "on player consume", "on player eating", "on player drinking", "on player consuming", 
        "on craft", "on crafting", "on player craft", "on player crafting", "craft", "on crafting", "on player craft", "on player crafting", "craft", "crafting", "player craft", "player crafting", "craft", "crafting", "player craft", "player crafting", 
        "on damage", "on damaging", "damage", "damaging", 
        "on death", "death", 
        "on drop", "on player drop", "on droping", "on player droping", "drop", "player drop", "droping", "player droping", 
        "on enderman place", "on enderman pickup", "on sheep eat", "enderman place", "enderman pickup", "sheep eat",
        "on xp spawn", "on xp orb spawn","on experience spawn", "on experience orb spawn", "xp spawn", "xp orb spawn","experience spawn", "experience orb spawn", "on spawn of xp", "on spawn of a xp", "on spawn of xp orb", "on spawn of a xp orb", "on spawn of experience", "on spawn of an experience","on spawn of experience orb", "on spawn of an experience orb", "spawn of xp", "spawn of a xp", "spawn of xp orb", "spawn of a xp orb", "spawn of experience", "spawn of an experience", "spawn of experience orb", "spawn of an experience orb",
        "on explode", "on exploding", "on explosion", "explode", "exploding", "explosion",
        "on explosion prime", "explosion prime",
        "on fade", "on fading", "on block fade", "on block fading", "fade", "fading", "block fade", "block fading", 
        "on first join", "on first login", "first join", "first login",
    ];


    const PREGEVENTS = [
         "/\on block mining of (.+?)/is", "/\on mine of (.+?)/is", "/\on block mine of (.+?)/is", "/\on mining of (.+?)/is", "/\on block breaking of (.+?)/is", "/\on break of (.+?)/is", "/\on block break of (.+?)/is", "/\on breaking of (.+?)/is", 
         "/\on block burning of (.+?)/is", "/\on burn of (.+?)/is", "/\on block burn of (.+?)/is", "/\on burning of (.+?)/is",
         "/\on click on (.+?)/is", "/\on click with (.+?)/is", "/\on click using (.+?)/is", "/\on click holding (.+?)/is", "/\on click on (.+?) with (.+?)/is", "/\on click on (.+?) using (.+?)/is", "/\on click on (.+?) holding (.+?)/is", "/\on click with (.+?) on (.+?)/is", "/\on click using (.+?) on (.+?)/is", "/\on click holding (.+?) on (.+?)/is", "/\on clicking on (.+?)/is", "/\on clicking with (.+?)/is", "/\on clicking using (.+?)/is", "/\on clicking holding (.+?)/is", "/\on clicking on (.+?) with (.+?)/is", "/\on clicking on (.+?) using (.+?)/is", "/\on clicking on (.+?) holding (.+?)/is", "/\on clicking with (.+?) on (.+?)/is", "/\on clicking using (.+?) on (.+?)/is", "/\on clicking holding (.+?) on (.+?)/is",
         "/\on rightclick on (.+?)/is", "/\on rightclick with (.+?)/is", "/\on rightclick using (.+?)/is", "/\on rightclick holding (.+?)/is", "/\on rightclick on (.+?) with (.+?)/is", "/\on rightclick on (.+?) using (.+?)/is", "/\on rightclick on (.+?) holding (.+?)/is", "/\on rightclick with (.+?) on (.+?)/is", "/\on rightclick using (.+?) on (.+?)/is", "/\on rightclick holding (.+?) on (.+?)/is", "/\on rightclicking on (.+?)/is", "/\on rightclicking with (.+?)/is", "/\on rightclicking using (.+?)/is", "/\on rightclicking holding (.+?)/is", "/\on rightclicking on (.+?) with (.+?)/is", "/\on rightclicking on (.+?) using (.+?)/is", "/\on rightclicking on (.+?) holding (.+?)/is", "/\on rightclicking with (.+?) on (.+?)/is", "/\on rightclicking using (.+?) on (.+?)/is", "/\on rightclicking holding (.+?) on (.+?)/is",
         "/\on leftclicking using (.+?)/is", "/\on leftclicking holding (.+?)/is", "/\on leftclicking on (.+?) with (.+?)/is", "/\on leftclicking on (.+?) using (.+?)/is", "/\on leftclicking on (.+?) holding (.+?)/is", "/\on leftclicking with (.+?) on (.+?)/is", "/\on leftclicking using (.+?) on (.+?)/is", "/\on leftclicking holding (.+?) on (.+?)/is",
         "/\on command \"(.+?)\"/is", "/\command \"(.+?)\"/is",
         "/\on eat of (.+?)/is", "/\on drink of (.+?)/is", "/\on consume of (.+?)/is", "/\on eating of (.+?)/is", "/\on drinking of (.+?)/is", "/\on consuming of (.+?)/is", "/\on player eat of (.+?)/is", "/\on player drink of (.+?)/is", "/\on player consume of (.+?)/is", "/\on player eating of (.+?)/is", "/\on player drinking of (.+?)/is", "/\on player consuming of (.+?)/is", "eat", "drink", "consume", "eating", "drinking", "consuming", "player eat", "player drink", "player consume", "player eating", "player drinking", "player consuming", "/\eat of (.+?)/is", "/\drink of (.+?)/is", "/\consume of (.+?)/is", "/\eating of (.+?)/is", "/\drinking of (.+?)/is", "/\consuming of (.+?)/is", "/\player eat of (.+?)/is", "/\player drink of (.+?)/is", "/\player consume of (.+?)/is", "/\player eating of (.+?)/is", "/\player drinking of (.+?)/is", "/\player consuming of (.+?)/is",
         "/\on craft of (.+?)/is", "/\on crafting of (.+?)/is", "/\on player craft of (.+?)/is", "/\on player crafting of (.+?)/is", "/\craft of (.+?)/is", "/\on crafting of (.+?)/is", "/\on player craft of (.+?)/is", "/\on player crafting of (.+?)/is", "/\craft of (.+?)/is", "/\crafting of (.+?)/is", "/\player craft of (.+?)/is", "/\player crafting of (.+?)/is", "/\craft of (.+?)/is", "/\crafting of (.+?)/is", "/\player craft of (.+?)/is", "/\player crafting of (.+?)/is",
         "/\on damage of (.+?)/is", "/\on damaging of (.+?)/is", "/\damage of (.+?)/is", "/\damaging of (.+?)/is",
         "/\on death of (.+?)/is", "/\death of (.+?)/is",
         "/\on drop of (.+?)/is", "/\on player drop of (.+?)/is", "/\on droping of (.+?)/is", "/\on player droping of (.+?)/is", "/\drop of (.+?)/is", "/\player drop of (.+?)/is", "/\droping of (.+?)/is", "/\player droping of (.+?)/is",
         "/\on fade of (.+?)/is", "/\on fading of (.+?)/is", "/\on block fade of (.+?)/is", "/\on block fading of (.+?)/is", "/\fade of (.+?)/is", "/\fading of (.+?)/is", "/\block fade of (.+?)/is", "/\block fading of (.+?)/is",
    ];


    const BEDENDTER = ["on bed enter", "on bed entering", "on enter bed", "on player enter bed", "on player enter a bed", "on entering bed", "on player entering bed", "on player entering a bed",  "on enter a bed", "on entering a bed", "bed enter", "bed entering", "enter bed", "player enter bed", "player enter a bed", "entering bed", "player entering bed", "player entering a bed",  "enter a bed", "entering a bed"];

    const BEDLEAVE = ["on bed leave", "on bed leaving", "on leave bed", "on player leave bed", "on player leave a bed", "on leaving bed", "on player leaving bed", "on player leaving a bed",  "on leave a bed", "on leaving a bed", "bed leave", "bed leaving", "leave bed", "player leave bed", "player leave a bed", "leaving bed", "player leaving bed", "player leaving a bed",  "leave a bed", "leaving a bed"];

    const BLOCKDAMAGE = ["on block damage", "block damage"];

    const BLOCKMINE = ["on mine", "on block mine", "on mining", "on block mining", "/\on block mining of (.+?)/is", "/\on mine of (.+?)/is", "/\on block mine of (.+?)/is", "/\on mining of (.+?)/is", "on break", "on block break", "on breaking", "on block breaking", "/\on block breaking of (.+?)/is", "/\on break of (.+?)/is", "/\on block break of (.+?)/is", "/\on breaking of (.+?)/is", ];

    const BUCKETFILL = ["on bucket fill", "on bucket filling", "on fill bucket", "on player fill bicket", "on player filling a bed", "on filling bucket", "on player filling bucket", "on player filling a bucket",  "on filling a bucket", "on filling a bucket", "bucket fill", "bucket filling", "fill bucket", "player fill bucket", "player fill a bucket", "filling bucket", "player filling bucket", "player filling a bucket",  "fill a bucket", "filling a bucket"];

    const BUCKETEMPTY = ["on bucket empty", "on bucket emptying", "on empty bucket", "on player empty bicket", "on player emptying a bed", "on emptying bucket", "on player emptying bucket", "on player emptying a bucket",  "on emptying a bucket", "on emptying a bucket", "bucket empty", "bucket emptying", "empty bucket", "player empty bucket", "player empty a bucket", "emptying bucket", "player emptying bucket", "player emptying a bucket",  "empty a bucket", "emptying a bucket"];

    const BLOCKBURN = ["on burn", "on block burn", "on burning", "on block burning", "/\on block burning of (.+?)/is", "/\on burn of (.+?)/is", "/\on block burn of (.+?)/is", "/\on burning of (.+?)/is"];
    
    const BLOCKBUILDCHECK = ["on can build check", "on block can build check", "can build check", "block can build check"];

    const CHAT = ["chat", "on chat"];

    const CHUNCKPOPULATE = ["on chunk generate", "on chunk populate", "on chunk generating", "on chunk populating", "chunk generate", "chunk populate", "chunk generating", "chunk populating"];
    
    const CHUNCKLOAD = ["on chunk load", "on chunk loading", "chunk load", "chunk loading"];

    const CHUNCKUNLOAD = ["on chunk unload", "on chunk unloading", "chunk unload", "chunk unloading"];
    
    const CLICK = ["on click", "on clicking", "/\on click on (.+?)/is", "/\on click with (.+?)/is", "/\on click using (.+?)/is", "/\on click holding (.+?)/is", "/\on click on (.+?) with (.+?)/is", "/\on click on (.+?) using (.+?)/is", "/\on click on (.+?) holding (.+?)/is", "/\on click with (.+?) on (.+?)/is", "/\on click using (.+?) on (.+?)/is", "/\on click holding (.+?) on (.+?)/is", "/\on clicking on (.+?)/is", "/\on clicking with (.+?)/is", "/\on clicking using (.+?)/is", "/\on clicking holding (.+?)/is", "/\on clicking on (.+?) with (.+?)/is", "/\on clicking on (.+?) using (.+?)/is", "/\on clicking on (.+?) holding (.+?)/is", "/\on clicking with (.+?) on (.+?)/is", "/\on clicking using (.+?) on (.+?)/is", "/\on clicking holding (.+?) on (.+?)/is"];
    
    const RIGHTCLICK = ["on rightclick", "on rightclicking", "/\on rightclick on (.+?)/is", "/\on rightclick with (.+?)/is", "/\on rightclick using (.+?)/is", "/\on rightclick holding (.+?)/is", "/\on rightclick on (.+?) with (.+?)/is", "/\on rightclick on (.+?) using (.+?)/is", "/\on rightclick on (.+?) holding (.+?)/is", "/\on rightclick with (.+?) on (.+?)/is", "/\on rightclick using (.+?) on (.+?)/is", "/\on rightclick holding (.+?) on (.+?)/is", "/\on rightclicking on (.+?)/is", "/\on rightclicking with (.+?)/is", "/\on rightclicking using (.+?)/is", "/\on rightclicking holding (.+?)/is", "/\on rightclicking on (.+?) with (.+?)/is", "/\on rightclicking on (.+?) using (.+?)/is", "/\on rightclicking on (.+?) holding (.+?)/is", "/\on rightclicking with (.+?) on (.+?)/is", "/\on rightclicking using (.+?) on (.+?)/is", "/\on rightclicking holding (.+?) on (.+?)/is"];
    
    const LEFTCLICK = ["on leftclick", "on leftclicking", "/\on leftclick on (.+?)/is", "/\on leftclick with (.+?)/is", "/\on leftclick using (.+?)/is", "/\on leftclick holding (.+?)/is", "/\on leftclick on (.+?) with (.+?)/is", "/\on leftclick on (.+?) using (.+?)/is", "/\on leftclick on (.+?) holding (.+?)/is", "/\on leftclick with (.+?) on (.+?)/is", "/\on leftclick using (.+?) on (.+?)/is", "/\on leftclick holding (.+?) on (.+?)/is", "/\on leftclicking on (.+?)/is", "/\on leftclicking with (.+?)/is", "/\on leftclicking using (.+?)/is", "/\on leftclicking holding (.+?)/is", "/\on leftclicking on (.+?) with (.+?)/is", "/\on leftclicking on (.+?) using (.+?)/is", "/\on leftclicking on (.+?) holding (.+?)/is", "/\on leftclicking with (.+?) on (.+?)/is", "/\on leftclicking using (.+?) on (.+?)/is", "/\on leftclicking holding (.+?) on (.+?)/is"];
    
    const COMBUST = ["on combust", "on combusting", "combust", "combusting"];
    
    const COMMAND = ["on command", "command", "/\on command \"(.+?)\"/is", "/\command \"(.+?)\"/is"];

    const CONNECT = ["on connect", "on player connect", "on connecting", "on player connecting", "connect", "player connect", "connecting", "player connecting"];

    const CONSUME = ["on eat", "on drink", "on consume", "on eating", "on drinking", "on consuming", "on player eat", "on player drink", "on player consume", "on player eating", "on player drinking", "on player consuming", "/\on eat of (.+?)/is", "/\on drink of (.+?)/is", "/\on consume of (.+?)/is", "/\on eating of (.+?)/is", "/\on drinking of (.+?)/is", "/\on consuming of (.+?)/is", "/\on player eat of (.+?)/is", "/\on player drink of (.+?)/is", "/\on player consume of (.+?)/is", "/\on player eating of (.+?)/is", "/\on player drinking of (.+?)/is", "/\on player consuming of (.+?)/is", "eat", "drink", "consume", "eating", "drinking", "consuming", "player eat", "player drink", "player consume", "player eating", "player drinking", "player consuming", "/\eat of (.+?)/is", "/\drink of (.+?)/is", "/\consume of (.+?)/is", "/\eating of (.+?)/is", "/\drinking of (.+?)/is", "/\consuming of (.+?)/is", "/\player eat of (.+?)/is", "/\player drink of (.+?)/is", "/\player consume of (.+?)/is", "/\player eating of (.+?)/is", "/\player drinking of (.+?)/is", "/\player consuming of (.+?)/is"];

    const CRAFT = ["on craft", "on crafting", "on player craft", "on player crafting", "craft", "on crafting", "on player craft", "on player crafting", "craft", "crafting", "player craft", "player crafting", "craft", "crafting", "player craft", "player crafting", "/\on craft of (.+?)/is", "/\on crafting of (.+?)/is", "/\on player craft of (.+?)/is", "/\on player crafting of (.+?)/is", "/\craft of (.+?)/is", "/\on crafting of (.+?)/is", "/\on player craft of (.+?)/is", "/\on player crafting of (.+?)/is", "/\craft of (.+?)/is", "/\crafting of (.+?)/is", "/\player craft of (.+?)/is", "/\player crafting of (.+?)/is", "/\craft of (.+?)/is", "/\crafting of (.+?)/is", "/\player craft of (.+?)/is", "/\player crafting of (.+?)/is"];

    // const CREEPERPOWER = ["on creeper power", "creeper power"]; Not in MCPE YET !

    const DAMAGE = ["on damage", "on damaging", "damage", "damaging", "/\on damage of (.+?)/is", "/\on damaging of (.+?)/is", "/\damage of (.+?)/is", "/\damaging of (.+?)/is"];

    const DEATH = ["on death", "death", "/\on death of (.+?)/is", "/\death of (.+?)/is"];

    // const DISPENSE = ["on dispense", "dispense", "on dispensing", "dispensing", "/\on dispense of (.+?)/is", "/\dispense of (.+?)/is", "/\on dispensing of (.+?)/is", "/\dispensing of (.+?)/is"];

    const DROP = ["on drop", "on player drop", "on droping", "on player droping", "drop", "player drop", "droping", "player droping", "/\on drop of (.+?)/is", "/\on player drop of (.+?)/is", "/\on droping of (.+?)/is", "/\on player droping of (.+?)/is", "/\drop of (.+?)/is", "/\player drop of (.+?)/is", "/\droping of (.+?)/is", "/\player droping of (.+?)/is"];

    const ENTITYCHANGEBLOCKS = ["on enderman place", "on enderman pickup", "on sheep eat", "enderman place", "enderman pickup", "sheep eat"];

    const XPSPAWN = ["on xp spawn", "on xp orb spawn","on experience spawn", "on experience orb spawn", "xp spawn", "xp orb spawn","experience spawn", "experience orb spawn", "on spawn of xp", "on spawn of a xp", "on spawn of xp orb", "on spawn of a xp orb", "on spawn of experience", "on spawn of an experience", "on spawn of experience orb", "on spawn of an experience orb", "spawn of xp", "spawn of a xp", "spawn of xp orb", "spawn of a xp orb", "spawn of experience", "spawn of an experience", "spawn of experience orb", "spawn of an experience orb"];

    const EXPLODE = ["on explode", "on exploding", "on explosion", "explode", "exploding", "explosion"];

    const EXPLODEPRIME = ["on explosion prime", "explosion prime"];

    const BLOCKFADE = ["on fade", "on fading", "on block fade", "on block fading", "fade", "fading", "block fade", "block fading", "/\on fade of (.+?)/is", "/\on fading of (.+?)/is", "/\on block fade of (.+?)/is", "/\on block fading of (.+?)/is", "/\fade of (.+?)/is", "/\fading of (.+?)/is", "/\block fade of (.+?)/is", "/\block fading of (.+?)/is"];

    const FIRSTJOIN = ["on first join", "on first login", "first join", "first login"];





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