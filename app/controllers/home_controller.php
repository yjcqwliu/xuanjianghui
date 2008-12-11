<?php
class HomeController extends AppController {
	var $uses = array('User','Friends','Userinfo');
	var $components = array('Cookie','RequestHandler');
	var $helpers = array('link','Javascript');
	#var $name = 'Home2';
	function beforeFilter()
	{
		$this->login();
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
		 if(!empty($this->user['User']['master_id']))
			{
				$this->master_user = $this->User->find_by_uid($this->user['User']['master_id']);
				$this->set('master_user',$this->master_user);
		 	}
		 $slave_user = $this->User->slave($this->current_user["User"]["tongju_users_id"]);
		 $this->set('slave_user',$slave_user);
		 if(isset($this->current_user["userinfo"]['user_gender']) && $this->current_user["userinfo"]['user_gender'] == 2)
			{
				$this->set('gender',"她");
			}
			else
			{
				$this->set('gender',"他");
			}

	}
	function friend($uid)
	{
		if($uid)
		 {
		 	$this->user = $this->User->find_or_create_by_uid($uid);
			if(!empty($this->user['User']['master_id']))
			{
				$this->master_user = $this->User->find_by_uid($this->user['User']['master_id']);
				$this->set('master_user',$this->master_user);
		 	}
			$this->set('user',$this->user);
			if(isset($this->user["userinfo"]['user_gender']) && $this->user["userinfo"]['user_gender'] == 2)
			{
				$this->set('gender',"她");
			}
			else
			{
				$this->set('gender',"他");
			}
		 }
	}
	function friendlist(){
		$data = array();
		$friends = $this->current_user["User"]["friend_ids"];
		#Debugger::dump($friends);
		if(!empty($friends))
		{
			$friends_info = $this->Userinfo->find("all",array("conditions" =>" user_id in (".$friends.")"));
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
}
?>