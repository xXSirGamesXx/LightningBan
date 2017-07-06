<?php
	
namespace xXSirGamesXx\LightningBan; 

use xXSirGamesXx\LightningBan\sound\ThunderStartSound;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as C;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\AddEntityPacket;

class Main extends PluginBase implements Listener {
	const PREFIX = C::GOLD . "[LB] " . C::WHITE;
	
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
	public function onCommand(CommandSender $sender, Command $cmd,$label,array $args){
		if($cmd->getName() == "lban"){
			if($sender->hasPermission("lbpe.cmd.lban")){
				$sender->sendMessage(self::PREFIX . "LightningBanPE by xXSirGamesXx: \n Usage: /lban <player>");
				}else{
					$sender->sendMessage(self::PREFIX . "You dont have permission!");
					}
					if(count($args) == 1){
						$target = $this->getServer()->getPlayer($args[0]);
						if($sender->hasPermission("lbpe.cmd.lban")){
							if($target != null){
								$sender->sendMessage(self::PREFIX . "You banned $args[0]");
								$target->getLevel()->addSound(new ThunderStartSound($target));
								sleep(3);
								$level = $target->getLevel();
								$light = new AddEntityPacket();
								$light->type = 93;
								$light->entityRuntimeId = Entity::$entityCount++;
								$light->metadata = array();
								$light->speedX = 0;
								$light->speedY = 0;
								$light->speedZ = 0;
								$light->yaw = $p->getYaw();
								$light->pitch = $p->getPitch();
								$light->x = $target->x;
								$light->y = $target->y;
								$light->z = $target->z;
								foreach($level->getPlayers() as $pl){
									$pl->dataPacket($light);
									} 								
								$target->setBanned(true);
								}else{
									$sender->sendMessage(self::PREFIX . "Player doesnt exist or isnt online, use /ban to ban players that aren't online.");
									}
									}else{
										$sender->sendMessage(self::PREFIX . "You dont have permission!");
										}
					}
		}
	}
}
		

		
 /*  public function Commands(PlayerCommandPreprocessEvent $event) {
       $cmd = explode(" ", strtolower($event->getMessage()));
	   $player = $event->getPlayer();
	   if($player->hasPermission("pocketmine.command.ban")){
		   if($cmd[0] === "/ban"){
			   $player->sendMessage(self::PREFIX . "LightningBan by xXSirGamesXx usage: \n" . "LB Usage: /ban <name>");
			   //$event->setCancelled();
		   }else{
			   $player->sendMessage(C::RED . "You Dont have permission to run this command");
		   }
		   if(count(cmd) === 1){
			   	if($player->hasPermission("pocketmine.command.ban")){
			   $target = $this->server->getPlayer($cmd[1]);
			   $player->sendMessage(self::PREFIX . "You Banned Player: " . $target);
			   $target->setBanned(true);
				}else{
					$player->sendMessage(C::RED . "You Dont have permission to run this command");
				} 
			}
		}	   
	}*/


