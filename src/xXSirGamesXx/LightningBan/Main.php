<?php
	
namespace xXSirGamesXx\LightningBan; 

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase implements Listener {
	
	public function onLoad() {
		$this->getLogger()->info("Loading plugin...");
	}
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(C::GOLD . "LightningBan by xXSirGamesXx enabled!");
	}
	
	public function onDisable() {
		$this->getLogger()->info(C::GOLD . "LightningBan by xXSirGamesXx enabled!");
	}
	
   public function Commands(PlayerCommandPreprocessEvent $event) {
       $cmd = explode(" ", strtolower($event->getMessage()));
	   $player = $event->getPlayer();
	   if($cmd[0] === "/ban"){
		  if($player->hasPermission{"pocketmine.command.ban"}){
			  $player->sendMessage(C::RED . "This Plugin Is useless atm");
			  //$event->setCancelled();
	   }
       }
   }	   
}
