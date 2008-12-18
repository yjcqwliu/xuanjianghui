<?php
class SlaveController extends AppController {
	var $uses = array('User','Friends','Userinfo','Publicinfo','Notice');
	var $components = array('Cookie','RequestHandler');
	var $helpers = array('link','Javascript');
	var $layout = "dialog";
	function beforeFilter()
	{
		Configure::write('debug',3);
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
			$this->set('notice',$user["userinfo"]["nickname"] . "不是你的奴隶，你无法进行操作");
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
		#Debugger::dump($this->current_user);
		if($this->current_user["User"]["uid"] != $user["User"]["master_id"])
		{
			if($this->current_user["publicinfo"]["money"] >= $user["User"]["sell_price"])
			{
				$this->set("user",$user);
				$this->set("mymoney",$this->current_user["publicinfo"]["money"]);
				$up_price = $this->User->up_price($user['User']['sell_price']);
				$this->set("up_price",$up_price);
				$this->get_gender($user);
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
	}
	function discount_dialog($slaveuid)
	{
		$slaveuser =  $this->get_slave($slaveuid);
		$this->set("slaveuser",$slaveuser);
	}
	function pain_dialog()
	{
	}
	function comfort_dialog()
	{
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
			$nick = $_POST["nick"];
			if($slaveuid == $this->current_user["User"]["uid"])
			{
				$this->set('notice',"对不起，你不能买你自己");
				$this->render('alert');
			}
			else
			{
				$slaveuser = $this->get_slave($slaveuid);
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
					$slaveuser['User']['nickname'] = $nick;
					
					
											
					$this->User->save($slaveuser);
					$this->User->save($master_user);
					$this->User->save($this->current_user);
					
					
					
					$notice = '<strong><span class="sl">'. $slaveuser['userinfo']['nickname']. '</span>已经成为你的奴隶。<br />同时，他的身价涨到<strong class="dgreen">&yen;'. $slaveuser['User']['sell_price'] .'</strong></strong>';
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
			if($slaveuid == $this->current_user["User"]["uid"])
			{
				$this->set('notice',"对不起，你不能释放你自己");
				$this->render('alert');
			}
			else
			{
				$slaveuser = $this->get_slave($slaveuid);
				
				$this->current_user['publicinfo']['money'] += $slaveuser['User']['last_price'] / 2;
				$slaveuser['User']['sell_price'] == $slaveuser['User']['last_price'] / 2;
				$slaveuser['User']['master_id'] = null;
				$slaveuser['User']['nickname'] = '';
				$this->User->save($slaveuser,false,array('sell_price','master_id','nickname'));
				$this->Publicinfo->save($this->current_user['publicinfo'],false,array('money'));
				$this->User->save($this->current_user);
				$notice = "你把" . $slaveuser['userinfo']['nickname'] . "成功的释放掉了";
				$this->set('notice',$notice);
				$this->render('alert_refresh');
				
			}
		}
	}
}
?>