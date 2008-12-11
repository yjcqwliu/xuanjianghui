<?php
class LinkHelper extends AppHelper {
    function show_userpic($pic_data, $size=0) {
		$pic = split("\|",$pic_data);
		return $this->output($pic[$size]);
    }
}

?>