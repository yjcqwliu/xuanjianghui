<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<SCRIPT language="javascript">AC_FL_RunContent = 0;</SCRIPT>
	<?php
		echo $html->css(array('slave','s'));
		echo $javascript->link(array('swfobject','head-10','common-2','prototype-1.4.0','s','cookie','dialog-1','app_friend','swfobject','AC_RunActiveContent','slave-6','friend_singlesuggest'));
	?>
</head>
<body>

			<?php $session->flash(); ?>
<div id="match_main">
<div id="Market_right">
<div class="m2 wr1">
    <div id="r2_2">
		  <div id="r3">
			<div class="l"><?php echo $html->image('ico_mm.gif', array('align' => 'absmiddle'))?> 
			<b class="f14">游戏：朋友买卖</b>
			</div>
			<!--div class="r"><a href="javascript:window.history.back();" class="sl">&lt;&lt;返回上一页</a></div-->
			<div class="c"></div>
	</div>
	<div> <div class="deal_nav">
			<div class="deal_navbg">
				<h4 class="sy"><?= $html->link('首页', array('controller' => 'home','action' => 'me'),array('class' => 'sl2'))?></h4>	
			</div>
			<div class="deal_navbg">
				<h4 class="ph"><?= $html->link('排行', array('controller' => 'home','action' => 'index'),array('class' => 'sl2'))?></h4>
			</div>
			<div class="deal_navbg" style="margin-right:0px;">
				<h4 class="help"><?= $html->link('帮助', array('controller' => 'home','action' => 'index'),array('class' => 'sl2'))?></h4>
			</div>
			<div class="c"></div>
		 </div>
	</div>
			<?php echo $content_for_layout; ?>
	</div>
</div>
</div>
</div>
	<div class="c"></div>	
	<?php echo $cakeDebug; ?>
</body>
</html>
