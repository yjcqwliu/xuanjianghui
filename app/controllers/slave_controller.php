<?php
class SlaveController extends AppController {
	var $uses = array('User','Friends','Userinfo');
	var $components = array('Cookie','RequestHandler');
	var $helpers = array('link','Javascript');
	var $layout = "dialog";
	function beforeFilter()
	{
		Configure::write('debug',3);
		$this->login();
	}
	function index() {

	}
	function buy_dialog($slaveuid)
	{
		$this->User->id = $slaveuid;
		$user = $this->User->read();
		#Debugger::dump($this->current_user);
		if($this->current_user["User"]["tongju_users_id"] != $user["User"]["master_id"])
		{
			$this->set("user",$user);
			$this->set("mymoney",$this->current_user["publicinfo"]["money"]);
		}
		else
		{
			$this->set('notice',"TA已经是你的奴隶了，无法再继续购买");
			$this->render('error');
		}
		
	}
	function free_dialog()
	{
		
	}
	function freeself_dialog()
	{
	}
	function discount_dialog()
	{
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
	function error()
	{
		#$notice = $this->params['named']['notice'];
		echo "notice:".$this->notice;
		exit;
		$this->set('notice',"aa");
	}
	function buy() 
	{
		if(isset($_POST["slaveuid"]))
			{
			$slaveuid = $_POST["slaveuid"];
			$nick = $_POST["nick"];
			$this->User->id = $slaveuid;
			$slaveuser = $this->User->read();
			if($this->current_user['publicinfo']['money'] >= $slaveuser['User']['sell_price'])
			{
				if(empty($slaveuser['User']['master_id']))
				{
					$this->current_user['publicinfo']['money'] -= $slaveuser['User']['sell_price'];
					$slaveuser['User']['sell_price'] += $this->User->up_price($slaveuser['User']['sell_price']);
					$slaveuser['User']['master_id'] = $this->current_user['User']['tongju_users_id'];
					$slaveuser['User']['nickname'] = $nick;
					$this->User->save($slaveuser,false,array('sell_price','master_id','nickname'));
					$notice = '<strong><span class="sl">'. $slaveuser['userinfo']['nickname']. '</span>已经成为你的奴隶。<br />同时，他的身价涨到<strong class="dgreen">&yen;'. $slaveuser['User']['sell_price'] .'</strong></strong>';
					$this->set('notice',$notice);
				}
				elseif($slaveuser['User']['master_id'] != $this->current_user['User']['tongju_users_id'])
				{
					$notice = $slaveuser['User']['master_id'];
					$this->set('notice',$notice);
				}
				else
				{
					$this->set('notice',"TA已经是你的奴隶，不能再购买");
					$this->render('error');
				}
				
			}
			else
			{
				$this->set('notice',"对不起，你没有足够的钱购买");
				$this->render('error');
			}
			
		}
		
		#echo 
	}
}
?>