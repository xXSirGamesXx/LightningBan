<?php
	
namespace xXSirGamesXx\LightningBan; 

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener {
	
	public function onLoad() {
		$this->getLogger()->info("Loading plugin...");
	}
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info("Plugin enabled!");
	}
	
	public function onDisable() {
		$this->getLogger()->info("Plugin disabled!");
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
		if($cmd->getName() == "ban") {
			$sender->sendMessage("W.I.P.");
		}
	}	
}
