<?php
App::import('Model','Friends','Userinfo','Notice'); 
class User extends AppModel 
{   
	var $name = 'app_friendsell_user';
	var $primaryKey = 'uid';
	var $uses = array('Friends');
	var $belongsTo = array(
        'userinfo' => array(
            'className'    => 'Userinfo',
			'foreignKey' => 'uid',
        ),
		'publicinfo' => array(
            'className'    => 'Publicinfo',
			'foreignKey' => 'uid',
        )
    ); 
	function find_or_create_by_uid($uid)
	{
		if($tu = $this->find("`User`.`uid` = ".$uid))
		{
			if(!isset($tu["publicinfo"]["money"]) || empty($tu["publicinfo"]["money"]))
			{
				$data_publicinfo["money"] = 1000;
				$data_publicinfo["uid"] = $uid;
				$this->publicinfo->save($data_publicinfo);
				$tu["publicinfo"] = $data_publicinfo;
			}
			return $tu;
		}
		else
		{
			$data_user["uid"] = $uid;
			$data_user["sell_price"] = 500;
			$data_user["total_money"] = 1000;
			$data_user["slave_count"] = 0;
			$data_user["last_price"] = 0;
			$data_user["friend_ids"] = $this->get_friend_ids($uid);
			$this->save($data_user); 
			$data_publicinfo["money"] = 1000;
			$data_publicinfo["uid"] = $uid;
			$this->publicinfo->save($data_publicinfo);
			$tu = $this->find("`User`.`uid` = ".$uid);
			return $tu;
		}
		
	}
	function find_by_uid($uid)
	{
		$tu = $this->find("`User`.`uid` = ".$uid);
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
	function beforeSave()
	{
		$slave_user = $this->slave($this->data["User"]["uid"]);
		$this->data["User"]["slave_count"] = sizeof($slave_user);
		$total_money = 0;
		foreach($slave_user as $s)
			$total_money += $s["User"]["sell_price"];
		$this->data["User"]["total_money"] = $total_money + $this->data["publicinfo"]["money"];
		return true;
	}
	function notice($uid)
	{
		$notice_class = new Notice();
		$notice = $notice_class->find('all',array('conditions' => "from_uid = " . $uid . " or to_uid = " . $uid . " or who_uid =" . $uid , 'limit' => 20, 'order' => 'id desc'));
		return $notice;
	}
}
?>