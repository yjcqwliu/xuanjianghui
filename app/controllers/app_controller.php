<?php  
class AppController extends Controller  
{  
	#var $uses = array('AppFriendsellUser');
	
    var $current_user;
	function login()
	{
		if($_REQUEST["user_id"])
		{
			#echo ($_REQUEST["id"]);
			$u = $this->User->find_or_create_by_uid($_REQUEST["user_id"]);
			if(empty($u["User"]["friend_ids"]) )
			{
				$u["User"]["friend_ids"] = $this->User->get_friend_ids($u["User"]["id"]);
				$this->User->save($u,false,array('friend_ids'));
			}
			$this->current_user = $u;	
			#Debugger::dump($this->current_user);	
			#Debugger::dump($this->current_user);		
			setcookie("user_id",$_REQUEST["user_id"]);
		}
		else
		{
			if($HTTP_COOKIE_VARS["user_id"])
			{
				$this->current_user = $this->User->find_or_create_by_uid($HTTP_COOKIE_VARS["id"]);
			}
			else
			{
				echo "µÇÂ½Ê§°Ü";
				exit;
			}
		}
		
	}  
}  
?>  