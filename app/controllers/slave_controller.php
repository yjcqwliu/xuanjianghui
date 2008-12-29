<?php
class SlaveController extends AppController {
	var $uses = array('User','Friends','Userinfo','Publicinfo','Notice','SellLog');
	var $components = array('Cookie','RequestHandler');
	var $helpers = array('link','Javascript');
	var $layout = "dialog";
	var $done_pain = array("1"=>"在冰冷小黑屋关一天","2"=>"痛扁一顿","3"=>"饿一天不给饭吃","4"=>"在大街上当马骑","6"=>"罚去黑煤窑挖煤","7"=>"罚去扫厕所","16"=>"倒插门给芙蓉大姐","18"=>"罚去挑大粪","21"=>"拿鞭子抽","22"=>"罚跪半天搓衣板");
	var $done_comfort = array("1"=>"泡菊花茶","7"=>"穿漂亮的新衣服","2"=>"吃西餐","3"=>"去公园散步");
	function beforeFilter()
	{
		Configure::write('debug',0);
		$this->login();
	}
	function get_slave($slaveuid)
	{
		$slaveuser = $this->User->find_by_uid($slaveuid);
		if($this->current_user["User"]["uid"] == $slaveuser["User"]["master_id"])
		{
			return $slaveuser;
		}
		else
		{
			$this->set('notice',$slaveuser["userinfo"]["nickname"] . "不是你的奴隶，你无法进行操作");
			$this->render('alert');
			exit;
		}
	}
	function index() {

	}
	function buy_dialog($slaveuid)
	{
		$this->User->id = $slaveuid;
		$user = $this->User->read();
		if($this->current_user["User"]["uid"] != $user["User"]["master_id"])
		{
			if($this->current_user["publicinfo"]["money"] >= $user["User"]["sell_price"])
			{
				if($user["User"]["pain_updated_at"] > date("Y-m-d H:i"))
				{
					$this->set('notice',$user['userinfo']['nickname']."正在".$user['User']['status']."，过会再来吧");
					$this->render('alert');
				}
				else
				{
					$this->set("user",$user);
					$this->set("mymoney",$this->current_user["publicinfo"]["money"]);
					$up_price = $this->User->up_price($user['User']['sell_price']);
					$this->set("up_price",$up_price);
				}
			}
			else
			{
				$this->set('notice',"你只有<strong class=\"dgreen\">&yen;" . $this->current_user["publicinfo"]["money"] . "</strong>，钱不够啊！");
				$this->render('alert');
			}
		}
		else
		{
			$this->set('notice',$user["userinfo"]["nickname"] . "已经是你的奴隶了，无法再继续购买");
			$this->render('alert');
		}
		
	}
	function free_dialog($slaveuid)
	{
		$user =  $this->get_slave($slaveuid);
		#Debugger::dump($this->current_user);
		$this->set("user",$user);
		$this->set("mymoney",$this->current_user["publicinfo"]["money"]);
	}
	function freeself_dialog()
	{
		$this->set("user",$this->current_user);
	}
	function discount_dialog($slaveuid)
	{
		$this->set("slaveuser",$slaveuser);
	}
	function pain_dialog($slaveuid)
	{
		$slaveuser =  $this->get_slave($slaveuid);
		if($slaveuser["User"]["pain_updated_at"] <= date("Y-m-d H:i"))
		{
			
			$this->set("slaveuser",$slaveuser);
			$this->set("done_pain",$this->done_pain);
			$this->set("sell_count",$this->SellLog->get_sell_count($this->current_user["User"]["uid"],$slaveuser["User"]["uid"]));
		}
		else
		{
			$this->set('notice',$slaveuser['userinfo']['nickname']."才被你整过，过会再来吧");
			$this->render('alert');
		}
		
	}
	function comfort_dialog($slaveuid)
	{
		$slaveuser =  $this->get_slave($slaveuid);
		if($slaveuser["User"]["comfort_updated_at"] <= date("Y-m-d H:i"))
		{
			$this->set("user",$slaveuser);
			$this->set("done_comfort",$this->done_comfort);
			$this->set("sell_count",$this->SellLog->get_sell_count($this->current_user["User"]["uid"],$slaveuser["User"]["uid"]));
		}
		else
		{
			$this->set('notice',$slaveuser['userinfo']['nickname']."才被你安抚过，过会再来吧");
			$this->render('alert');
		}
	}
	function fawn_dialog()
	{
	}
	function set_sysmsg()
	{
	}
	function give_dialog()
	{
	}
	function selslave_dialog()
	{
		$slaveusers = $this->User->findall(" User.uid in (".$this->current_user["User"]["friend_ids"].") and User.sell_price < ".$this->current_user["publicinfo"]["money"]." and User.master_id != ".$this->current_user["User"]["uid"]);
		$this->set('slaveusers',$slaveusers);
	}
	function alert()
	{
	}
	function alert_refresh()
	{
	}
	function buy() 
	{
		if(isset($_POST["slaveuid"]))
			{
			$slaveuid = $_POST["slaveuid"];
			$nick = htmlspecialchars($_POST["nick"]);
			if($slaveuid == $this->current_user["User"]["uid"])
			{
				$this->set('notice',"对不起，你不能买你自己");
				$this->render('alert');
			}
			else
			{
				$slaveuser = $this->User->find_by_uid($slaveuid);
				if($this->current_user['publicinfo']['money'] >= $slaveuser['User']['sell_price'])
				{
					$this->current_user['publicinfo']['money'] -= $slaveuser['User']['sell_price'];
					$this->Publicinfo->save($this->current_user['publicinfo'],false,array('money'));
					$up_price = $this->User->up_price($slaveuser['User']['sell_price']);
					if(!empty($slaveuser["User"]["master_id"]))//买之前他已经有主人了
					{
						$master_user = $this->User->find_by_uid($slaveuser["User"]["master_id"]);
						$master_user['publicinfo']['money'] += $slaveuser['User']['last_price'] + $up_price * 0.7;
						$this->Publicinfo->save($master_user['publicinfo'],false,array('money'));
						$slaveuser['publicinfo']['money'] += $up_price * 0.2;
						$this->Publicinfo->save($slaveuser['publicinfo'],false,array('money'));
						
						$notice_data["from_uid"] = $this->current_user["User"]["uid"];
						$notice_data["to_uid"] = $slaveuser["User"]["uid"];
						$notice_data["who_uid"] = $master_user["User"]["uid"];
						$notice_data["content"] = $this->link_to_home($this->current_user) . "把" . $this->link_to_home($slaveuser) . "从" . $this->link_to_home($master_user) ."的手里以¥" . $slaveuser['User']['sell_price'] . "买走";
						if(!empty($nick))
							$notice_data["content"] .="，起个绰号叫“" . $nick . "”";
						$this->Notice->save($notice_data);
					}
					else
					{
						$notice_data["from_uid"] = $this->current_user["User"]["uid"];
						$notice_data["who_uid"] = $slaveuser["User"]["uid"];
						$notice_data["content"] =    $this->link_to_home($slaveuser) . "被" . $this->link_to_home($this->current_user) . "以¥" . $slaveuser['User']['sell_price'] . "的身价买为奴隶";
						if(!empty($nick))
							$notice_data["content"] .="，起个绰号叫“" . $nick . "”";
						$this->Notice->save($notice_data);
					}	
					$slaveuser['User']['last_price'] = $slaveuser['User']['sell_price'];
					$slaveuser['User']['sell_updated_at'] = date("Y-m-d H:i:s");
					$slaveuser['User']['last_sell'] = "花了<span class='dgreen'><strong>&yen;" .  $slaveuser['User']['sell_price'] . "</strong></span>购买";
					
					$slaveuser['User']['sell_price'] += $up_price;
					$slaveuser['User']['master_id'] = $this->current_user['User']['uid'];
					$slaveuser['User']['master_nickname'] = $this->current_user['userinfo']['nickname'];
					$slaveuser['User']['nickname'] = $nick;
					
					
											
					$this->User->save($slaveuser);
					if(isset($master_user))
						$this->User->save($master_user);
					$this->User->save($this->current_user);
					
					$this->SellLog->add_sell_log($this->current_user['User']['uid'],$slaveuser['User']['uid'],1);
					
					
					$notice = '<strong><span class="sl">'. $slaveuser['userinfo']['nickname']. '</span>已经成为你的奴隶。<br />同时，'.$slaveuser["User"]["gender"] .'的身价涨到<strong class="dgreen">&yen;'. $slaveuser['User']['sell_price'] .'</strong></strong>';
					$this->set('notice',$notice);
					$this->render('alert_refresh');
				
					
				}
				else
				{
					$this->set('notice',"对不起，你没有足够的钱购买");
					$this->render('alert');
				}
			}
			
		}
		
		#echo 
	}
	function free()
	{
		if(isset($_POST["slaveuid"]))
		{
			$slaveuid = $_POST["slaveuid"];
			$slaveuser = $this->get_slave($slaveuid);
				
			$this->current_user['publicinfo']['money'] += $slaveuser['User']['last_price'] / 2;
			$slaveuser['User']['sell_price'] == $slaveuser['User']['last_price'] / 2;
			$slaveuser['User']['master_id'] = null;
			$slaveuser['User']['master_nickname'] = null;
			$slaveuser['User']['nickname'] = '';
			$this->User->save($slaveuser,false,array('sell_price','master_id','nickname'));
			$this->Publicinfo->save($this->current_user['publicinfo'],false,array('money'));
			$this->User->save($this->current_user);
			$notice = "你把" . $slaveuser['userinfo']['nickname'] . "成功的释放掉了";
			$this->set('notice',$notice);
			$this->render('alert_refresh');
		}
	}
	function discount()
	{
		if(isset($_POST["slaveuid"]))
		{
			$slaveuid = $_POST["slaveuid"];
			$slaveuser = $this->get_slave($slaveuid);
			$discount = $_POST["discount"];
			if($discount>0 && $discount<10)
			{
				$slaveuser['User']['sell_price'] = (int)($slaveuser['User']['sell_price'] * $discount * 0.1);
				$this->User->save($slaveuser,false,array('sell_price'));
				$notice = "<span class=\"sl\">" . $slaveuser['userinfo']['nickname']."</span>被你打折以后，身价降到了<strong class=\"dgreen\">&yen;" . $slaveuser['User']['sell_price'] . "</strong>";
				$this->set('notice',$notice);
				$this->render('alert_refresh');
			}
			else
			{
				$notice = "错误！未能成功打折";
				$this->set('notice',$notice);
				$this->render('alert');
			}
		}
	}
	function pain()
	{
		if(isset($_POST["slaveuid"]))
		{
			$slaveuid = $_POST["slaveuid"];
			$slaveuser = $this->get_slave($slaveuid);
			if($slaveuser["User"]["pain_updated_at"] <= date("Y-m-d H:i"))
			{
				$paintype = $_POST["paintype"];
				$updated_at = getdate();
				switch($paintype) 
				{ 
					case "1": 
						$still_hour = 24;
						$notice = $this->link_to_home($this->current_user) . "花了<strong class=\"dgreen\">&yen;1000</strong>把<span class=\"sl\">" . $this->link_to_home($slaveuser)."</span>关在冰冷小黑屋里一整天";
						$status_string = "被主人关在冰冷的小黑屋";
						$this->current_user['publicinfo']['money'] -= 1000;
						$this->Publicinfo->save($this->current_user['publicinfo'],false,array('money'));
						$this->User->save($this->current_user);
						break;
					default:
						$still_hour = 3;
						$notice = $this->link_to_home($slaveuser)."被" .$this->link_to_home($this->current_user). $this->done_pain[$paintype];
						$status_string = "被主人".$this->done_pain[$paintype];
						
				}
				$updated_at = $updated_at["year"]."-".$updated_at["mon"]."-".$updated_at["mday"]." ".($updated_at["hours"]+$still_hour).":".$updated_at["minutes"];
				$slaveuser['User']['pain_type'] = $paintype;
				$slaveuser['User']['pain_updated_at'] = $updated_at;
				$slaveuser['User']['status'] = $status_string;
				$this->User->save($slaveuser,false,array('pain_type','pain_updated_at','status'));
				
				$notice_data["from_uid"] = $this->current_user["User"]["uid"];
				$notice_data["to_uid"] = $slaveuser["User"]["uid"];
				$notice_data["content"] = $notice;
				$this->Notice->save($notice_data);
							
				$this->SellLog->add_sell_log($this->current_user['User']['uid'],$slaveuser['User']['uid'],0,1);
				
				$this->set('notice',$notice);
				$this->render('alert_refresh');
			}
			else
			{
				$this->set('notice',$slaveuser['userinfo']['nickname']."才被你整过，过会再来吧");
				$this->render('alert');
			}
		}
	}
	function freeself()
	{
		if(!empty($this->current_user["User"]["master_id"]))
		{
			if($this->current_user["publicinfo"]["money"] >= $this->current_user["User"]["sell_price"])
				{
				$this->current_user["publicinfo"]["money"] -= $this->current_user["User"]["sell_price"];
				$this->Publicinfo->save($this->current_user['publicinfo'],false,array('money'));
				
				$master_user = $this->User->find_by_uid($this->current_user["User"]["master_id"]);
				$master_user['publicinfo']['money'] += $this->current_user["User"]["sell_price"];
				$this->Publicinfo->save($master_user['publicinfo'],false,array('money'));
				
				$this->current_user["User"]["master_id"] = null;
				$this->current_user['User']['master_nickname'] = null;
				$this->current_user["User"]["freeself_updated_at"] = date("Y-m-d H:i:s");
				$this->User->save($this->current_user);
				$this->User->save($master_user);
				
				$notice_data["from_uid"] = $this->current_user["User"]["uid"];
				$notice_data["to_uid"] = $master_user["User"]["uid"];
				$notice_data["content"] =    $this->link_to_home($this->current_user) . "花了¥" .$this->current_user['User']['sell_price']."把自己从".$this->link_to_home($master_user)."的手上赎下来";
				$this->Notice->save($notice_data);
				
				$notice = "恭喜你成为了自由身";
				$this->set('notice',$notice);
				$this->render('alert_refresh');
			}
			else
			{
				$this->set('notice',"你的钱不够");
				$this->render('alert');
			}
		}
		else
		{
			$this->set('notice',"你已经是自由身，没法再赎身了");
			$this->render('alert');
		}
	}
	function comfort()
	{
		if(isset($_POST["slaveuid"]))
		{
			$slaveuid = $_POST["slaveuid"];
			$slaveuser = $this->get_slave($slaveuid);
			if($slaveuser["User"]["comfort_updated_at"] <= date("Y-m-d H:i"))
			{
				$comforttype = $_POST["comforttype"];
				$updated_at = getdate();
				switch($comforttype) 
				{ 
					case "1": 
						$still_hour = 3;
						$notice = "天热又干燥，".$this->link_to_home($this->current_user)."不辞辛劳亲自给奴隶".$this->link_to_home($slaveuser)."泡了杯菊花茶解渴";
						break;
					case "2":
						$still_hour =3;
						$notice = $this->link_to_home($this->current_user)."把".$this->link_to_home($slaveuser)."带到一家高雅的西餐厅，在浪漫的烛光中共进晚餐";
						break;
					case "3":
						$still_hour = 3;
						$notice = "傍晚微风徐徐，主人".$this->link_to_home($this->current_user)."带着".$this->link_to_home($slaveuser)."到公园里散步，美丽的夕阳投射出两人修长的身影";
						break;
					case "7":
						$still_hour = 3;
						$notice = $this->link_to_home($this->current_user)."给".$this->link_to_home($slaveuser)."穿上漂亮的新衣服";
						break;
					default:
						$still_hour = 3;
						$notice = $this->link_to_home($slaveuser)."给" .$this->link_to_home($this->current_user). $this->done_pain[$paintype];
						
				}
				$updated_at = $updated_at["year"]."-".$updated_at["mon"]."-".$updated_at["mday"]." ".($updated_at["hours"]+$still_hour).":".$updated_at["minutes"];
				$slaveuser['User']['comforttype'] = $comforttype;
				$slaveuser['User']['comfort_updated_at'] = $updated_at;
				$this->User->save($slaveuser,false,array('comforttype','comfort_updated_at'));
				
				$notice_data["from_uid"] = $this->current_user["User"]["uid"];
				$notice_data["to_uid"] = $slaveuser["User"]["uid"];
				$notice_data["content"] = $notice;
				$this->Notice->save($notice_data);
				
				$this->SellLog->add_sell_log($this->current_user['User']['uid'],$slaveuser['User']['uid'],0,0,1);
					
				$this->set('notice',$notice);
				$this->render('alert_refresh');
			}
			else
			{
				$this->set('notice',$slaveuser['userinfo']['nickname']."才被你安抚过，过会再来吧");
				$this->render('alert');
			}
		}
	}
	
	
	
	
	
	
	
	
}
?>