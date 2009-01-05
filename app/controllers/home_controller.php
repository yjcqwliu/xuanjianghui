<?php
class HomeController extends AppController {
	var $uses = array('User','Friends','Userinfo','Notice');
	var $components = array('Cookie','RequestHandler');
	var $helpers = array('link','Javascript');
	#var $name = 'Home2';
	function beforeFilter()
	{
		$this->login();
	}
	function beforeRender()
	{
		$this->pageTitle = "好友买卖";
	}
	function me() {
		#$this->set('users',$this->AppFriendsellUser->findall());
		 #$this->set('users', $this->AppFriendsellUser->find('all'));
		 #$this->test();\
		 #$this->set('users', $this->User->find('all'));
		 #echo serialize($this->current_user);
		 #echo serialize($this->current_user);
		 #echo "---current_user_id :".$this->current_user->id;
		 $this->set('user',$this->current_user);
		 $this->set('current_user',$this->current_user);
		 if(!empty($this->current_user['User']['master_id']))
		 {
			$this->master_user = $this->User->find_by_uid($this->current_user['User']['master_id']);
			$this->set('master_user',$this->master_user);
		 }
		 $slave_user = $this->User->slave($this->current_user["User"]["uid"]);
		 $this->set('slave_user',$slave_user);
		 $notice = $this->User->notice($this->current_user["User"]["uid"]);
		 $this->set('notice',$notice);

	}
	function friend()
	{
		$uid = $this->params['url']['id'];
		if($uid)
		 {
		 	if($uid == $this->current_user["User"]["uid"])
			{
				$this->redirect('me');
			}
			else
			{
				$this->set('current_user',$this->current_user);
				$this->user = $this->User->find_or_create_by_uid($uid);
				if($this->user['User']['master_id'] == $this->current_user['User']['uid'])
				{
					$this->set('master_user',$this->current_user);
				}
				 elseif(!empty($this->user['User']['master_id']))
				{
					$this->master_user = $this->User->find_by_uid($this->user['User']['master_id']);
					$this->set('master_user',$this->master_user);
				}
				$this->set('user',$this->user);
				$slave_user = $this->User->slave($this->user["User"]["uid"]);
		 		$this->set('slave_user',$slave_user);
				 $notice = $this->User->notice($this->user["User"]["uid"]);
				 $this->set('notice',$notice);
			}
		 }
	}
	function friendlist(){
		$data = array();
		$friends = $this->current_user["User"]["friend_ids"];
		if(isset($_POST['text']))
			$name_find_sql = " and nickname like '%".htmlspecialchars($_POST['text'])."%' ";
		else
			$name_find_sql = "";
		#Debugger::dump($friends);
		if(!empty($friends))
		{
			$friends_info = $this->Userinfo->find("all",array("conditions" =>" user_id in (".$friends.") " . $name_find_sql));
			foreach($friends_info as $fi)
			{
				array_push($data,array('id' => $fi["userinfo"]["user_id"],'real_name' => $fi["userinfo"]["nickname"]));
			}
		}
		
		echo json_encode($data);
		#$this->set('current_user',$this->current_user);
		Configure::write('debug',0);
		$this->layout = null;
		
	}
	function help()
	{
		
	}
	function order()
	{
		
		if(isset($_GET["myorder"]))
		{
			$order_by = $_GET["myorder"];
		}
		else
			$order_by = "sell_price";
		if(isset($_GET["gender"]))
		{
			$gender = $_GET["gender"];
			if($gender == "girl")
				$gender_condition = " and User.gender ='她'";
			elseif($gender == "boy")
				$gender_condition = " and User.gender ='他'";
			else
				$gender_condition = null;
		}
		else
		{
			$gender = "all";
			$gender_condition = null;
		}
			
		$friends = $this->current_user["User"]["friend_ids"];
		if(isset($_GET["wide_in"]))
		{
			$wide_in = $_GET["wide_in"];
			if($wide_in == "friend")
				$wide_in_condition = "and User.uid in (".$friends.",".$this->current_user["User"]["uid"].") ";
			else
				$wide_in_condition = null;
		}
		else
		{
			$wide_in = "friend";
			$wide_in_condition = " and User.uid in (".$friends.",".$this->current_user["User"]["uid"].") ";
		}
		if(!empty($friends))
		{
			$slave_user = $this->User->find("all",array("conditions" =>" 1 = 1 " .$wide_in_condition . $gender_condition,"order"=>$order_by." desc","limit"=> 10));
			$this->set("slave_user",$slave_user);
			
			
		}
		else
		{
			
		}
		$this->set("order",$order_by);
		$this->set("gender",$gender);
		$this->set("wide_in",$wide_in);
	}
}
?>