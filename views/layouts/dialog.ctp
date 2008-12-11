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
			<?php echo $content_for_layout; ?>
<?php echo $cakeDebug; ?>
</body>
</html>
