<?php
namespace Ad5001\SkriptPE;

use pocketmine\Server;
use pocketmine\Player;

use Ad5001\SkriptPE\Main;



class Event {


    const PREGEVENTS = [
         "/^[on ]{0,1}bed enter(ing| {0})$/", "/^(on | {0})[player ]{0,1}enter(ing| {0})[a ]{0,1} bed$/",
         "/^[on ]{0,1}[player ]{0,1}bed leav(ing|e)$/", "/^(on | {0})[player ]{0,1}leav(ing|e)[a ]{0,1} bed$/"
    ];


    const BEDENDTER = ["/^[on ]{0,1}[player ]{0,1}bed enter(ing| {0})$/", "/^(on | {0})[player ]{0,1}enter(ing| {0})[a ]{0,1} bed$/"];

    const BEDLEAVE = ["/^[on ]{0,1}[player ]{0,1}bed leav(ing|e)$/", "/^(on | {0})[player ]{0,1}leav(ing|e)[a ]{0,1} bed$/"];

    const BLOCKDAMAGE = ["/^[on ]{0,1}block damage$/"];

    const BLOCKMINE = ["/^[on ]{0,1}(block | {0})min(e|ing)( of [a-z]{2,}| [a-z]{2,}){0,1}$/"];

    const BUCKETFILL = ["/^[on ]{0,1}bucket fill[ing]{0,1}/"];

    const BUCKETEMPTY = ["/^[on ]{0,1}bucket empty[ing]{0,1}$/", "/^[on ]{0,1}[player ]{0,1}empty[ing] [a ]{0,1}bucket$/"];

    const BLOCKBURN = ["/^[on ]{0,1}[block ]{0,1}burn[ing ]{0,1}([of ]{0,1}[a-z]{2,}){0,1}$/"];
    
    const BLOCKBUILDCHECK = ["/^[on ]{0,1}[block ]{0,1}can build check$/"];

    const CHAT = ["/^[on ]{0,1}chat$/"];

    const CHUNCKPOPULATE = ["/^[on ]{0,1}chunk [generat|populat][e|ing]$/"];
    
    const CHUNCKLOAD = ["/^[on ]{0,1}chunk load[ing]{0,1}$/"];

    const CHUNCKUNLOAD = ["/^[on ]{0,1}chunk unload[ing]{0,1}$/"];
    
    const CLICK = ["/^(on ){0,1}((mouse( |\-){0,}){0,1}){0,1}click[ing]{0,1}( on [ a-z]{1,5}){0,1}( (with|using|holding) [a-z]{1,}){0,1}$/"];
    
    const RIGHTCLICK = ["/^(on ){0,1}right( |\-){0,1}((mouse( |\-){0,}){0,1}){0,1}click[ing]{0,1}( on [ a-z]{1,5}){0,1}( (with|using|holding) [a-z]{1,}){0,1}$/"];
    
    const LEFTCLICK = ["/^^(on ){0,1}left( |\-){0,1}((mouse( |\-){0,}){0,1}){0,1}click[ing]{0,1}( on [ a-z]{1,5}){0,1}( (with|using|holding) [a-z]{1,}){0,1}$/"];
    
    const COMBUST = ["/^[on ]{0,1}conbust[ing]{0,1}$/"];
    
    const COMMAND = ["/^[on ]{0,1}command( [a-z]{1,}){0,1}$/"];

    const CONNECT = ["/^[on ]{0,1}[player ]{0,1}connect[ing]{0,1}$/"];

    const CONSUME = ["/^[on ]{0,1}[player ]{0,1}((eat|drink)[ing]{0,})[ing]{0,1}$/"];

    const CRAFT = ["on craft", "on crafting", "on player craft", "on player crafting", "craft", "on crafting", "on player craft", "on player crafting", "craft", "crafting", "player craft", "player crafting", "craft", "crafting", "player craft", "player crafting", "/\on craft of [a-z]/is", "/\on crafting of [a-z]/is", "/\on player craft of [a-z]/is", "/\on player crafting of [a-z]/is", "/\craft of [a-z]/is", "/\on crafting of [a-z]/is", "/\on player craft of [a-z]/is", "/\on player crafting of [a-z]/is", "/\craft of [a-z]/is", "/\crafting of [a-z]/is", "/\player craft of [a-z]/is", "/\player crafting of [a-z]/is", "/\craft of [a-z]/is", "/\crafting of [a-z]/is", "/\player craft of [a-z]/is", "/\player crafting of [a-z]/is"];

    // const CREEPERPOWER = ["on creeper power", "creeper power"]; Not in MCPE YET !

    const DAMAGE = ["on damage", "on damaging", "damage", "damaging", "/\on damage of [a-z]/is", "/\on damaging of [a-z]/is", "/\damage of [a-z]/is", "/\damaging of [a-z]/is"];

    const DEATH = ["on death", "death", "/\on death of [a-z]/is", "/\death of [a-z]/is"];

    // const DISPENSE = ["on dispense", "dispense", "on dispensing", "dispensing", "/\on dispense of [a-z]/is", "/\dispense of [a-z]/is", "/\on dispensing of [a-z]/is", "/\dispensing of [a-z]/is"];

    const DROP = ["on drop", "on player drop", "on droping", "on player droping", "drop", "player drop", "droping", "player droping", "/\on drop of [a-z]/is", "/\on player drop of [a-z]/is", "/\on droping of [a-z]/is", "/\on player droping of [a-z]/is", "/\drop of [a-z]/is", "/\player drop of [a-z]/is", "/\droping of [a-z]/is", "/\player droping of [a-z]/is"];

    const ENTITYCHANGEBLOCKS = ["on enderman place", "on enderman pickup", "on sheep eat", "enderman place", "enderman pickup", "sheep eat"];

    const XPSPAWN = ["on xp spawn", "on xp orb spawn","on experience spawn", "on experience orb spawn", "xp spawn", "xp orb spawn","experience spawn", "experience orb spawn", "on spawn of xp", "on spawn of a xp", "on spawn of xp orb", "on spawn of a xp orb", "on spawn of experience", "on spawn of an experience", "on spawn of experience orb", "on spawn of an experience orb", "spawn of xp", "spawn of a xp", "spawn of xp orb", "spawn of a xp orb", "spawn of experience", "spawn of an experience", "spawn of experience orb", "spawn of an experience orb"];

    const EXPLODE = ["on explode", "on exploding", "on explosion", "explode", "exploding", "explosion"];

    const EXPLODEPRIME = ["on explosion prime", "explosion prime"];

    const BLOCKFADE = ["on fade", "on fading", "on block fade", "on block fading", "fade", "fading", "block fade", "block fading", "/\on fade of [a-z]/is", "/\on fading of [a-z]/is", "/\on block fade of [a-z]/is", "/\on block fading of [a-z]/is", "/\fade of [a-z]/is", "/\fading of [a-z]/is", "/\block fade of [a-z]/is", "/\block fading of [a-z]/is"];

    const FIRSTJOIN = ["on first join", "on first login", "first join", "first login"];

    const FISHING = ["on fish", "on fishing", "on player fish", "on player fishing", "fish", "fishing", "player fish", "player fishing"];

    const BLOCKFLOW = ["on flow", "on flowing", "on block flow", "on block flowing", "on block move", "on block moving", "flow", "flowing", "block flow", "block flowing", "block move", "block moving"];

    const BLOCKFORM = ["on form", "on forming", "on block from", "on block forming", "form", "forming", "block from", "block forming", "/\on form of [a-z]/is", "/\on forming of [a-z]/is", "/\on block from of [a-z]/is", "/\on block forming of [a-z]/is", "/\form of [a-z]/is", "/\forming of [a-z]/is", "/\block from of [a-z]/is", "/\block forming of [a-z]/is"];

    const FUELBURN = ["on fuel burn", "on fuel burning", "fuel burn", "fuel burning"];

    const GMCHANGE = ["on gamemode change", "on game mode change", "gamemode change", "/\on gamemode change to [a-z]/is", "/\on game mode change to [a-z]/is", "/\gamemode change to [a-z]/is"];

    const GROW = ["on grow", "grow", "/\on grow of [a-z]/is", "/\grow of [a-z]/is"];

    const HEAL = ["on heal", "on healing", "heal", "healing"];

    const HUNGERCHANGE = ["on food level change", "on food level changing", "on food meter change", "on food meter changing", "on food metre change", "on food metre changing", "on food bar change", "on food bar changing", "on hunger level change", "on hunger level changing", "on hunger meter change", "on hunger meter changing", "on hunger metre change", "on hunger metre changing", "on hunger bar change", "on hunger bar changing", "food level change", "food level changing", "food meter change", "food meter changing", "food metre change", "food metre changing", "food bar change", "food bar changing", "hunger level change", "hunger level changing", "hunger meter change", "hunger meter changing", "hunger metre change", "hunger metre changing", "hunger bar change", "hunger bar changing"];

    // const IGNITE = ["on ignite", "on ignition", "on block ignite", "on block ignition", "ignite", "ignition", "block ignite", "block ignition", ];

    const TOOLBREAK = ["on tool break", "on tool breaking", "on player tool break", "on player tool tool breaking", "tool break", "tool breaking", "player tool break", "player tool tool breaking", "on break tool", "on breaking tool", "on break a tool", "on breaking a tool", "on break the tool", "on breaking the tool", "on player break tool", "on player breaking tool", "on player break a tool", "on player breaking a tool", "on player break the tool", "on player breaking the tool", "break tool", "breaking tool", "break a tool", "breaking a tool", "break the tool", "breaking the tool", "player break tool", "player breaking tool", "player break a tool", "player breaking a tool", "player break the tool", "player breaking the tool", ];





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