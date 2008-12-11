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
			if(!isset($tu["publicinfo"]["money"]) || empty($tu["publicinfo"]["money"]))
			{
				$data_publicinfo["money"] = 1000;
				$data_publicinfo["tongju_users_id"] = $uid;
				$this->publicinfo->save($data_publicinfo);
				$tu["publicinfo"] = $data_publicinfo;
			}
			return $tu;
		}
		else
		{
			$data_user["tongju_users_id"] = $uid;
			$data_user["sell_price"] = 500;
			$data_user["total_money"] = 1000;
			$data_user["slave_count"] = 0;
			$data_user["last_price"] = 0;
			$data_user["friend_ids"] = $this->get_friend_ids($uid);
			$this->save($data_user); 
			$data_publicinfo["money"] = 1000;
			$data_publicinfo["tongju_users_id"] = $uid;
			$this->publicinfo->save($data_publicinfo);
			$tu = $this->find("`User`.`tongju_users_id` = ".$uid);
			return $tu;
		}
		
	}
	function find_by_uid($uid)
	{
		$tu = $this->find("`User`.`tongju_users_id` = ".$uid);
		return $tu;
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
	static function up_price($price)
	{
		if($price < 2000)
		{
			$upprice = 150;
		}
		elseif($price < 5000)
		{
			$upprice = 200;
		}
		elseif($price < 30000)
		{
			$upprice = 300;
		}
		elseif($price >= 30000)
		{
			$upprice = 400;
		}
		else
		{
			$upprice = 0;
		}
		return $upprice;
	}
	function slave($uid)
	{
		$slave_user = $this->find('all',array('conditions' => "`User`.`master_id` = ".$uid)); 
		return $slave_user;
	}
}
?>