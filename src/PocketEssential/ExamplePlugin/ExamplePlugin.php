<?php
	
namespace PocketEssential\ExamplePlugin; # You can change the namespace context by changing the directory name on the src folder

use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class ExamplePlugin extends PluginBase implements Listener {
	
	public function onLoad() { # Called when the plugin is being loaded by the server
		$this->getLogger()->info("Loading plugin..."); # Logs to the console
	}
	
	public function onEnable() { # Called when the plugin is enabled successfully without any errors
		$this->getServer()->getPluginManager()->registerEvents($this, $this); # Registers the events
		$this->getLogger()->info("Plugin enabled!"); # Logs to the console
	}
	
	public function onDisable() { # Called when the plugin is being disabled
		$this->getLogger()->info("Plugin disabled!"); # Logs to the console
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) { # This is called when a player rans the command from this plugin
		if($cmd->getName() == "example") { # Remove this if your plugin has only one command
			$sender->sendMessage("This is an example command"); # Sends to the sender
		}
	}
	
	public function onJoin(PlayerJoinEvent $event) { # Called when a player joins
		$event->getPlayer()->sendMessage("This is an example event!"); # Sends the message to the player that joined the server
	}
}
