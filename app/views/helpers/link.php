<?php
class LinkHelper extends AppHelper {
    function show_userpic($pic_data=null, $size=0) {
		if(!empty($pic_data))
		{
			$pic = split("\|",$pic_data);
			if(isset($pic[$size]))
				return $this->output($pic[$size]);
			else
				return $this->output($pic[0]);
		}
		else
			return $this->output("noheadpic" . $size .".gif");
    }
}

?>