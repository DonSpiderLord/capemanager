<?php

#Plugin intended only for use on U-PvP Network Servers.
#Author: DonSpiderLord
#Plugin Use On Other Servers Strictly Prohibited.
#Latest Version: 16/08/2019 21:41AM

declare(strict_types=1);

namespace DonSpiderLord\CapeManager;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Skin;
use pocketmine\utils\TextFormat as C;
use pocketmine\command\{
	Command, CommandSender
};
use pocketmine\event\Listener;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\Player;
use DonSpiderLord\CapeManager\libs\jojoe77777\FormAPI\SimpleForm;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\event\player\{
	PlayerJoinEvent, PlayerQuitEvent, PlayerChangeSkinEvent
};

class Main extends PluginBase implements Listener {

    protected $skin = [];
    public $skins;
    /** @var string */
    public $noperm = C::AQUA . "§f[§bServer§f] §cYou don't have Permissions for this Action!";

    /**
     * @return void
     */

    public function onEnable() {
        $this->saveResource("capes.yml");
        $this->cfg = new Config($this->getDataFolder() . "capes.yml", Config::YAML);
        foreach ($this->cfg->get("capes") as $cape) {
            $this->saveResource("$cape.png");
        }
    }

	public function onJoin(PlayerJoinEvent $eve) {
		$player = $eve->getPlayer();
		$this->skin[$player->getName()] = $player->getSkin();
	}

	public function onChangeSkin(PlayerChangeSkinEvent $eve) {
		$player = $eve->getPlayer();
		$this->skin[$player->getName()] = $player->getSkin();
	}

       public function createCape($capeName) {
            $path = $this->getDataFolder()."{$capeName}.png";

            $img = @imagecreatefrompng($path);

            $bytes = '';

            $l = (int) @getimagesize($path)[1];

            for ($y = 0; $y < $l; $y++) {

                for ($x = 0; $x < 64; $x++) {

                    $rgba = @imagecolorat($img, $x, $y);

                    $a = ((~((int)($rgba >> 24))) << 1) & 0xff;

                    $r = ($rgba >> 16) & 0xff;

                    $g = ($rgba >> 8) & 0xff;

                    $b = $rgba & 0xff;

                    $bytes .= chr($r) . chr($g) . chr($b) . chr($a);

                }

            }

        @imagedestroy($img);
        return $bytes;
    }

    public function onCommand(CommandSender $player, Command $command, string $label, array $args): bool {
        $this->cfg = new Config($this->getDataFolder() . "capes.yml", Config::YAML);
        $cape = $this->cfg->get("capes");
        switch (strtolower($command->getName())) {
            case "capes":
                if ($player instanceof Player) {
                    if (!isset($args[0])) {
                        if (!$player->hasPermission("capes.cmd")) {
                            $player->sendMessage($this->noperm);
                            return true;
                        } else {
            $form = new SimpleForm(function (Player $player, $data) {
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    							 case 0:
                        $command = "capes abort";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                    							 case 1:
                    $command = "capes remove";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
						           						 case 2:
                    $command = "capes abstract";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                       						 case 3:
                    $command = "capes apples";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                       						 case 4:
                    $command = "capes camo";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                       						 case 5:
                    $command = "capes carrot";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
						break;
						           						 case 6:
                    $command = "capes chains";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                                   case 7:
                    $command = "capes dot";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                                   case 8:
                    $command = "capes duckling";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                                  case 9:
                    $command = "capes fusion";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                                  case 10:
                    $command = "capes gapple";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
																	case 11:
                     $command = "capes gold";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                  case 12:
                     $command = "capes greensmog";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                  case 13:
                     $command = "capes greysmog";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                    							case 14:
                     $command = "capes hypnosis";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
 												break;
 						           						case 15:
                     $command = "capes lavabucket";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                  case 16:
                     $command = "capes lavawave";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                  case 17:
                     $command = "capes melons";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                 	case 18:
                     $command = "capes mystic";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                  case 19:
                     $command = "capes plane";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
												 					case 20:
										 $command = "capes potato";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 21:
										$command = "capes purply";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 22:
										$command = "capes rainbow";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 23:
										$command = "capes sunnyday";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
							 					break;
												 					case 24:
										$command = "capes sunrise";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 25:
										$command = "capes thonk";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 26:
										$command = "capes tropical";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 27:
										$command = "capes villager";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 28:
										$command = "capes waves";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
																	case 29:
										$command = "capes wood";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
																	case 30:
										$command = "capes xcross";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
																	case 31:
										$command = "capes zebra";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
             }
             });
        $form->setTitle("§bDefault Capes");
        $form->setContent("§6>>These are all default capes<<");
        $form->addButton("§4Abort & Close Menu", 0);
        $form->addButton("§0Remove your Cape", 1);
        $form->addButton("§3Abstract Cape", 2);
        $form->addButton("§3Apples Cape", 3);
        $form->addButton("§3Camo Cape", 4);
        $form->addButton("§3Carrot Cape", 5);
        $form->addButton("§3Chains Cape", 6);
        $form->addButton("§3Dot Cape", 7);
        $form->addButton("§3Duckling Cape", 8);
        $form->addButton("§3Fusion Cape", 9);
        $form->addButton("§3Golden Apple Cape", 10);
				$form->addButton("§3Gold Cape", 11);
        $form->addButton("§3Green Smog Cape", 12);
        $form->addButton("§3Grey Smog Cape", 13);
        $form->addButton("§3Hypnosis Cape", 14);
        $form->addButton("§3Lava Bucket Cape", 15);
        $form->addButton("§3Lava Wave Cape", 16);
        $form->addButton("§3Melon Cape", 17);
        $form->addButton("§3Mystic Cape", 18);
        $form->addButton("§3Plane Cape", 19);
        $form->addButton("§3Potato Cape", 20);
				$form->addButton("§3Purply Cape", 21);
        $form->addButton("§3Rainbow Cape", 22);
        $form->addButton("§3Sunny Day Cape", 23);
        $form->addButton("§3Sunrise Cape", 24);
        $form->addButton("§3Thonk Cape", 25);
        $form->addButton("§3Tropical Cape", 26);
        $form->addButton("§3Villager Cape", 27);
        $form->addButton("§3Water Wave Cape", 28);
        $form->addButton("§3Wood Cape", 29);
        $form->addButton("§3X-Cross Cape", 30);
				$form->addButton("§3Zebra Cape", 31);
        $form->sendToPlayer($player);
        }
        return true;
                    }
                    $arg = array_shift($args);
                    switch ($arg) {
                        case "abort":
                            return true;
                            break;
                        case "remove":
        $oldSkin = $player->getSkin();
        $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), "", $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
        $player->setSkin($setCape);
        $player->sendSkin();
                            $player->sendMessage("§f[§bServer§f] §aCape Removed!");
                            return true;
//==============================================
case "abstract":
		if (!$player->hasPermission("abstract.cape")) {
				$player->sendMessage($this->noperm);
				return true;
		}else{
$oldSkin = $player->getSkin();
$capeData = $this->createCape("abstract");
$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
$player->setSkin($setCape);
$player->sendSkin();
$player->sendMessage("§f[§bServer§f] §aAbstract Cape activated!");
 }
 return true;
 //==============================================
 case "apples":
 		if (!$player->hasPermission("apples.cape")) {
 				$player->sendMessage($this->noperm);
 				return true;
 		}else{
 $oldSkin = $player->getSkin();
 $capeData = $this->createCape("apples");
 $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
 $player->setSkin($setCape);
 $player->sendSkin();
 $player->sendMessage("§f[§bServer§f] §aApples Cape activated!");
  }
 	return true;
	//==============================================
	case "camo":
			if (!$player->hasPermission("camo.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("camo");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aCamo Cape activated!");
	 }
	return true;
	//==============================================
	case "carrot":
			if (!$player->hasPermission("carrot.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("carrot");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aCarrot Cape activated!");
	 }
	return true;
	//==============================================
	case "chains":
			if (!$player->hasPermission("chains.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("chains");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aChains Cape activated!");
	 }
	return true;
	//==============================================
	case "dot":
			if (!$player->hasPermission("dot.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("dot");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aDot Cape activated!");
	 }
	return true;
	//==============================================
	case "duckling":
			if (!$player->hasPermission("duckling.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("duckling");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aDuckling Cape activated!");
	 }
	return true;
	//==============================================
	case "fusion":
			if (!$player->hasPermission("fusion.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("fusion");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aFusion Cape activated!");
	 }
	 return true;
	 //==============================================
	 case "gapple":
	 		if (!$player->hasPermission("gapple.cape")) {
	 				$player->sendMessage($this->noperm);
	 				return true;
	 		}else{
	 $oldSkin = $player->getSkin();
	 $capeData = $this->createCape("gapple");
	 $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	 $player->setSkin($setCape);
	 $player->sendSkin();
	 $player->sendMessage("§f[§bServer§f] §aGolden Apple Cape activated!");
	  }
	return true;
	//==============================================
	case "gold":
			if (!$player->hasPermission("gold.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("gold");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aGold Cape activated!");
	 }
	return true;
	//==============================================
	case "greensmog":
			if (!$player->hasPermission("greensmog.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("greensmog");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aGreen Smog Cape activated!");
	 }
	return true;
	//==============================================
	case "greysmog":
			if (!$player->hasPermission("greysmog.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("greysmog");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aGrey Smog Cape activated!");
	 }
	return true;
	//==============================================
	case "hypnosis":
			if (!$player->hasPermission("hypnosis.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("hypnosis");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aHypnosis Cape activated!");
	 }
	return true;
	//==============================================
	case "lavabucket":
			if (!$player->hasPermission("lavabucket.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("lavabucket");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aLava Bucket Cape activated!");
	 }
	return true;
	//==============================================
	case "lavawave":
			if (!$player->hasPermission("lavawave.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("lavawave");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aLava Wave Cape activated!");
	 }
	return true;
	//==============================================
	case "melons":
			if (!$player->hasPermission("melons.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("melons");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMelon Cape activated!");
	 }
	return true;
	//==============================================
	case "mystic":
			if (!$player->hasPermission("mystic.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("mystic");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMystic Cape activated!");
	 }
	return true;
	//==============================================
	case "plane":
			if (!$player->hasPermission("plane.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("plane");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aPlane Cape activated!");
	 }
	return true;
	//==============================================
	case "potato":
			if (!$player->hasPermission("potato.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("potato");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aPotato Cape activated!");
	 }
	return true;
	//==============================================
	case "purply":
			if (!$player->hasPermission("purply.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("purply");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aPurply Cape activated!");
	 }
	return true;
	//==============================================
	case "rainbow":
			if (!$player->hasPermission("rainbow.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("rainbow");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aRainbow Cape activated!");
	 }
	return true;
	//==============================================
	case "sunnyday":
			if (!$player->hasPermission("sunnyday.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("sunnyday");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aSunny Day Cape activated!");
	 }
	return true;
	//==============================================
	case "sunrise":
			if (!$player->hasPermission("sunrise.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("sunrise");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aSunrise Cape activated!");
	 }
	return true;
	//==============================================
	case "thonk":
			if (!$player->hasPermission("thonk.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("thonk");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aThonk Cape activated!");
	 }
	return true;
	//==============================================
	case "tropical":
			if (!$player->hasPermission("tropical.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("tropical");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aTropical Cape activated!");
	 }
	return true;
	//==============================================
	case "villager":
			if (!$player->hasPermission("villager.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("villager");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aVillager Cape activated!");
	 }
	return true;
	//==============================================
	case "waves":
			if (!$player->hasPermission("waves.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("waves");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aWater Wave Cape activated!");
	 }
	return true;
	//==============================================
	case "wood":
			if (!$player->hasPermission("wood.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("wood");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aWood Cape activated!");
	 }
	return true;
	//==============================================
	case "xcross":
			if (!$player->hasPermission("xcross.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("xcross");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aX-Cross Cape activated!");
	 }
	return true;
	//==============================================
	case "zebra":
			if (!$player->hasPermission("zebra.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("zebra");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aZebra Cape activated!");
	 }
	return true;
	return true;
}}}
  return true;
}
}
