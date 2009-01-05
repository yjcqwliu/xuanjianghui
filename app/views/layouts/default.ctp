<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<SCRIPT language="javascript">AC_FL_RunContent = 0;</SCRIPT>
	<?php
		echo $html->css(array('slave','s','global','header'));
		echo $javascript->link(array('swfobject','head-10','common-2','prototype-1.4.0','s','cookie','dialog-1','app_friend','swfobject','AC_RunActiveContent','slave-6','friend_singlesuggest'));
	?>
</head>
<body>
<div id="header">
<div id="TextNav"><!--页面导航 开始-->
<h1>
<a href="#">首页</a>|<a href="#">博客天地</a>|<a href="#">虚拟家园</a>|<a href="#">活动聚会</a>|<a href="#">在线聊天</a>|<a href="#">俱乐部论坛</a>|<a href="#">爱情搜索</a>|<a href="#">爱情顾问</a>|<a href="#">佳偶天成</a>|<a href="#">信息指南</a>|<a href="#">涉外专区</a></h1>
</div><!--页面导航 结束-->
<div id="SosoArea">
<ul>
<li class="lia"><a href="#"><span>〣o.緈諨┌</span>的个人后台</a><a href="#">会员<span>ID:53006694</span></a></li>
<li>个人主页网址：</li>
<li class="p_A"><input name="" type="text"  class="in"/></li>
<li><input name="" type="image" src="../webroot/img/match/ann_03.gif" /></li>
<li class="li">访问人数:<span>42</span>点击数:<span>385</span></li>
</ul>
</div>
<div id="TopNav">
<div id="logo"><a href="#"><?= $html->image('match/logo_03.gif',array("width"=>"225"))?></a></div>
<div id="Banners"><a href="#"><?= $html->image('match/banner.gif',array("width"=>"747"))?></a></div>
</div>


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
						<h4 class="ph"><?= $html->link('排行', array('controller' => 'home','action' => 'order'),array('class' => 'sl2'))?></h4>
					</div>
					<div class="deal_navbg" style="margin-right:0px;">
						<h4 class="help"><?= $html->link('帮助', array('controller' => 'home','action' => 'help'),array('class' => 'sl2'))?></h4>
					</div>
					<div class="c"></div>
				 </div>
			</div>
					<?php echo $content_for_layout; ?>
			</div>
		</div>
		</div>
		</div>
</div>
	<div class="c"></div>	
	<?php echo $cakeDebug; ?>
</body>
</html>
