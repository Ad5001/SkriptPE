<?php
namespace Ad5001\SkriptPE;


use pocketmine\Server;

use pocketmine\Player;

use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\utils\MainLogger;

use pocketmine\utils\TextFormat as C;


use Ad5001\SkriptPE\Main;




class Skript implements Listener {
	
	
	
	protected $name;
	
	protected $author;
	
	protected $version;
	
	
	
	public function __construct(string $path) {
		
		$this->getServer()->registerEvent($this->getServer()->getPluginManager()->getPlugin("SkriptPE"), $this);
		
		if(!file_exists($path)) {
			
			throw new RuntimeExeption("Skript at $path does NOT exists");
			
			exit(0);
			
		}
		
		$this->at = [];
		
		$this->event = [];
		
		$this->command = [];
		
		$this->variables = [];
		
		$code = yaml_parse(file_get_contents($path));
		
		if($code == false) {
			
			throw new RuntimeExeption("It looks as so that your syntax is invalid !");
			
		}
		
		if(!isset($code["name"])){
			
			$this->name = $code["name"];
			
		}
		else {
			
			throw new RuntimeExeption("Could not load source of this skript, no name set !");
			
		}
		
		if(!isset($code["author"])) {
			
			$this->author = $code["Author"];
			
		}
		else {
			
			throw new RuntimeExeption("Could not load source of skript $this->name, no author set !");
			
		}
		
		if(!isset($code["version"])) {
			
			$this->version = $code["version"];
			
		}
		else {
			
			throw new RuntimeExeption("Could not load source of skript $this->name, no version set !");
			
		}
		
		MainLogger::getInstance()->info(C::GREEN . "Loading source of Skript $this->name");
		
		foreach($code as $key => $code) {
			
			switch(explode(" ", $key)[0]) {
				
				case "at":
				$this->at[] = new At($this, $key, $code);
				
				break;
				
				default:
				if(in_array($key, Event::EVENTS)) {
					
					$this->event[] = new Event($this, $key, $code);
					
				} else {

                    $found = false;

                    foreach(Event::PREGEVENTS as $ev) {

                        if(!is_null(preg_replace($ev, "$1", $key)) and !$found) {

                            $this->event[] = new Event($this, $key, $code);

                            $found = true;
                        }
                    }

                    if(!$found) {
						if(!isset(Event::NOTIMPLEMENTED[$key])) {
							$this->getLogger()->warning("Unknown event: $event");
						} else {
							$this->getLogger()->notice("The event " . Event::NOTIMPLEMENTED[$key] . "has not been implemented YET in MCPE. Please wait until it's added to register this in your code. (Everything else in your code WILL work).");
						}
                    }
                    
                }
				
				break;
				
				case "command":
				$this->command[] = new Command($this, $key, $code);
				
				break;
				
			}
			
		}
		
	}
	
	
	
	
	public function getName() {
		
		return $this->name;
		
	}
	
	
	
	public function getCommands() {
		
		return $this->command;
		
	}
	
	
	public function getAts() {
		
		return $this->at;
		
	}
	
	
	public function getEvents() {
		
		return $this->event;
		
	}
	
	
	
}
