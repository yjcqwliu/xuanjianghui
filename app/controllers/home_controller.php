<?php
class HomeController extends AppController {
 var $uses = array('User','Friends','Userinfo');
 var $helpers = array('link');
	#var $name = 'Home2';
	function beforeFilter()
	{
		$this->login();
	}
	function index() {
		#$this->set('users',$this->AppFriendsellUser->findall());
		 #$this->set('users', $this->AppFriendsellUser->find('all'));
		 #$this->test();\
		 #$this->set('users', $this->User->find('all'));
		 #echo serialize($this->current_user);
		 #echo serialize($this->current_user);
		 #echo "---current_user_id :".$this->current_user->id;
		 if($_GET["id"])
		 {
		 	echo $_GET["id"];
		 	$this->user = $this->User->find_by_uid($_GET["id"]);
		 	$this->set('user',$this->user);
		 }
		 else
		 {
			$this->set('user',$this->current_user);
		 }
		 $this->set('current_user',$this->current_user);
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