<?php  
class AppController extends Controller  
{  
	var $current_user;
	function login()
	{
		if(isset($this->params["url"]["uid"]) && !empty($this->params["url"]["uid"]))
		{
			$user_id = $this->params["url"]["uid"];
			$this->Cookie->write('user_id',$user_id);
			#echo ($_REQUEST["id"]);
			$u = $this->User->find_or_create_by_uid($user_id);
			if(empty($u["User"]["friend_ids"]) )
			{
				$u["User"]["friend_ids"] = $this->User->get_friend_ids($u["User"]["id"]);
				$this->User->save($u,false,array('friend_ids'));
			}
			$this->current_user = $u;		
			
		}
		else
		{
			$user_id = $this->Cookie->read('user_id');
			if($user_id)
			{
				$this->current_user = $this->User->find_or_create_by_uid($user_id);
			}
			else
			{
				echo "登陆失败";
				exit;
			}
		}
		
	}
	function get_gender($user)
	{
		if(isset($user["userinfo"]['user_gender']) && $user["userinfo"]['user_gender'] == 2)
		{
			$this->set('gender',"她");
		}
		else
		{
			$this->set('gender',"他");
		} 
	} 
	function link_to_home($user)
	{
		return "<a href='friend?id=" . $user["User"]["uid"] . "'>" . $user["userinfo"]["nickname"] . "</a>";
	}
}  
?>  