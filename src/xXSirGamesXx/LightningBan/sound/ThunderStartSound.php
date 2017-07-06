<?php

namespace pocketmine\level\sound;

use pocketmine\level\sound\Sound;
use pocketmine\level\sound\GenericSound;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\LevelEventPacket;

class ThunderStartSound extends GenericSound{
	public function __construct(Vector3 $pos, $pitch = 0){
		parent::__construct($pos, LevelEventPacket::EVENT_START_THUNDER, $pitch);
	}
}
