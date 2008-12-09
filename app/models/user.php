<?php
App::import('Model','Friends','Userinfo'); 
class User extends AppModel 
{   
	var $name = 'app_friendsell_user';
	var $primaryKey = 'tongju_users_id';
	var $uses = array('Friends');
	var $belongsTo = array(
        'userinfo' => array(
            'className'    => 'Userinfo',
			'foreignKey' => 'tongju_users_id',
        ),
		'publicinfo' => array(
            'className'    => 'Publicinfo',
			'foreignKey' => 'tongju_users_id',
        )
    ); 
	function find_or_create_by_uid($uid)
	{
		
		if($tu = $this->find("`User`.`tongju_users_id` = ".$uid))
		{
			return $tu;
		}
		else
		{
			$data["tongju_users_id"] = $uid;
			$data["friend_ids"] = $this->get_friend_ids($uid);
			$this->save($data); 
			$data["money"] = 1000;
			$data["sell_price"] = 500;
			$data["total_money"] = 500;
			$this->publicinfo->save($data);
			$tu = $this->find("`User`.`tongju_users_id` = ".$uid);
			return $tu;
		}
		
	}
	function find_by_uid($uid)
	{
		if($tu = $this->find("`User`.`tongju_users_id` = ".$uid))
		{
			return $tu;
		}
		else
		{
			$userinfo_class = new Userinfo();
			if($tu = $userinfo_class->find("`tongju_users`.`user_id` = ".$uid))
			{
				return $tu;
			}
			else
			{
				return NULL;
			}
		}
	}
	function get_friend_ids($uid)
	{
		$friends_class = new Friends();
		$friends = $friends_class->find('all',array("conditions" => array("uid"=>$uid)));
		$resualt = array();
		foreach($friends as $f)
		{
			#Debugger::dump($f);
			array_push($resualt,$f["club_buddys"]["buddyid"]);
		}
		return join($resualt,",");
	}
}
?>