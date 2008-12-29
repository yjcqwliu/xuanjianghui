<?php
class SellLog extends AppModel 
{   
	var $name = 'app_friendsell_sell_log';
	function add_sell_log($fuid,$tuid,$sell_count=0,$pain_count=0,$comfort_count=0)
	{
		$sell_log = $this->find(' fuid = '.$fuid .' and tuid = '. $tuid);
		
		$sell_log['SellLog']['fuid'] = $fuid;
		$sell_log['SellLog']['tuid'] = $tuid;
		if(!empty($sell_log))
		{
			$sell_log['SellLog']['sell_count'] += $sell_count;
			$sell_log['SellLog']['pain_count'] += $pain_count;
			$sell_log['SellLog']['comfort_count'] += $comfort_count;
		}
		else
		{
			$sell_log['SellLog']['sell_count'] = $sell_count;
			$sell_log['SellLog']['pain_count'] = $pain_count;
			$sell_log['SellLog']['comfort_count'] = $comfort_count;
		}
		$this->save($sell_log);
	}
	function get_sell_count($fuid,$tuid)
	{
		$sell_log = $this->find(' fuid = '.$fuid .' and tuid = '. $tuid);
		if(!empty($sell_log))
			return $sell_log['SellLog']['sell_count'];
		else
			return 0;
	}
}
?>