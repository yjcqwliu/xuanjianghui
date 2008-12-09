<link rel="stylesheet" href="../app/webroot/css/slave.css" type="text/css" charset="utf-8">
<link rel="stylesheet" href="../app/webroot/css/s.css" type="text/css" charset="utf-8">
<SCRIPT src="../app/webroot/js/head-10.js" language="JavaScript" type="text/javascript"></SCRIPT>
<SCRIPT src="../app/webroot/js/common-2.js" type="text/javascript"></SCRIPT>
<SCRIPT src="../app/webroot/js/prototype-1.4.0.js" language="JavaScript" type="text/javascript"></SCRIPT>
<SCRIPT src="../app/webroot/js/s.js" language="JavaScript" type="text/javascript"></SCRIPT>
<SCRIPT src="../app/webroot/js/cookie.js" type="text/javascript"></SCRIPT>
<SCRIPT src="../app/webroot/js/dialog-1.js" language="JavaScript" type="text/javascript"></SCRIPT>
<SCRIPT src="../app/webroot/js/app_friend.js" language="JavaScript" type="text/javascript"></SCRIPT>
<SCRIPT src="../app/webroot/js/swfobject.js" type="text/javascript"></SCRIPT>
<SCRIPT language="javascript">AC_FL_RunContent = 0;</SCRIPT>
<SCRIPT src="../app/webroot/js/AC_RunActiveContent.js" type="text/javascript"></SCRIPT>
<LINK href="../app/webroot/js/slave.css" rel="stylesheet" type="text/css">
<SCRIPT src="../app/webroot/js/slave-6.js" type="text/javascript"></SCRIPT>
<SCRIPT src="../app/webroot/js/friend_singlesuggest.js" type="text/javascript"></SCRIPT>
<div id="match_main">
<div id="Market_right">
<div class="m2 wr1">
    <div id="r2_2">
      <div id="r3">
        <div class="l"><img src="../app/webroot/img/ico_mm.gif" align="absmiddle" />
		<b class="f14">游戏：朋友买卖</b>
		</div>
        <!--div class="r"><a href="javascript:window.history.back();" class="sl">&lt;&lt;返回上一页</a></div-->
        <div class="c"></div>
      </div>
	  <div class="c"></div>
	  <div class="deal_left">
		 <div class="deal_nav">
			<div class="deal_navbg">
				<h4 class="sy"><a href="/~slave/index.php" class="sl2">首页</a></h4>	
			</div>
			<div class="deal_navbg">
				<h4 class="ph"><a href="/~slave/top.php" class="sl2">排行</a></h4>
			</div>
			<div class="deal_navbg" style="margin-right:0px;">
				<h4 class="help"><a href="/~slave/help.php" class="sl2">帮助</a></h4>
			</div>
			<div class="c"></div>
		 </div>
		 <div class="dealimg"><img src="<?= $link->show_userpic($user["userinfo"]["userpic"]) ?>"/></div>
		 <div class="dealinfo">
			<div class="">
				<strong class="f14 dblue"><?= $user["userinfo"]["nickname"]?></strong><span class='c6 f14' title='主人起的绰号'><?php echo $user["User"]["agname"] ?></span>
				&nbsp;&nbsp;
				<span class="f12 c9">( 目前我是谢刘俊的奴隶 )</span>
			</div>
			<div class="mb10"></div>
			<p>身　价：<strong class="dgreen">&yen;<?= $user["User"]["sell_price"] ?></strong></p>
			<p>总资产：<strong class="dgreen">&yen;<?= $user["User"]["total_money"] ?></strong></p>
			<p>现　金：<strong class="dgreen">&yen;<?= $user["publicinfo"]["money"] ?></strong></p>
			<p>奴隶数：<strong class="dred"><?= $user["User"]["slave_count"] ?></strong></p>
			<div class='r wysft' style='margin-right:1px;'><span onclick='javascript:sysmsg();' style='cursor:pointer;'>设置</span></div><div class='r wysft' style='margin-right:1px;'><span onclick='javascript:fawnHost(105949);' style='cursor:pointer;'>讨好主人</span></div><div class='r wysft' style='margin-right:1px;'><span onclick='javascript:freeself();' style='cursor:pointer;'>我要赎身</span></div>
			<div class="mt30" style="display:none;"><a href="javascript:notice();" class="color-red">最新公告(8月23日)</a></div>
		 </div>
		 <div class="c"></div>
		 
		 <h3 class="wdnl">我的奴隶</h3>
		 <div id="noslavelist" class="c9" style="padding:0 0 30px 25px;display:none;">你目前一个奴隶也没有</div>
		 <div id="hasslavelist" style="display:none;">
		 </div>
		 <script type="text/javascript">
		 	if("0" == "0")
		 	{
		 		$("noslavelist").style.display = "block";
		 	}
		 	else
		 	{
		 		$("hasslavelist").style.display = "block";
		 	}
		 </script>
		 
		
		 <div class="ml10">
		 	<span class="l"><img src="../app/webroot/img/buynl.gif" alt="购买奴隶" /> 购买奴隶：</span>
			<div class="l" style="margin-left:20px !important;margin-left:10px;">
				<div class="it_s" style="width:135px;">
					<div class="it1">
					
						<div id="superinput" style="cursor:text;height:23px;float:left; width:130px;" onclick="fs2_superOnclick()">
						&nbsp;
						</div>
						
						<div class="c"></div>
					
					</div>
				</div>
			</div>
			
			<div class="l" style="padding:3px 2px 0px 0px; position:relative;margin:3px 2px 0 0;">
				<div id="xx_sh" onclick="fs2_viewAllfriend();"><img src="../app/webroot/img/xx_xx1.gif" class="cp" onmouseover="this.src='../app/webroot/img/xx_xx2.gif';" onmouseout="this.src='../app/webroot/img/xx_xx1.gif';" alt="选择好友" /></div>
				<div class="fsg_nr" style="width:310px;" id="fsg_nr">
				<div class="sgt_on" style="width:300px;">请选择购买对象</div>
				<div id="allfriend"  style="width:300px;height:100px; overflow:scroll; overflow-x:hidden;"></div>
				<div class="tac p5"><div class="gbs1"><input type="button" id="btn_qd" value="确定" title="确定" class="gb1-12" onmouseover="this.className='gb2-12';" onmouseout="this.className='gb1-12';" onclick="fs2_selectFriend();" /></div><div class="c"></div></div>
				</div>
			</div>
			<div class="c"></div>
			 <div style="margin:0 175px;"><a href="javascript:selslave();" class="sl">我能买的人</a></div>
		 </div>
		
	  </div>
	  <div class="deal_right">
			<!--div class="deal_navbg2" onclick="javascript:invite();">
				<h4>邀请好友加入 <span class="dorg"><strong>&yen;</strong>500</span></h4>
			</div-->
			 <div class="c"></div>
			<h3 class="mmls">买卖历史</h3>
			<div id="nosalelist" class="c9" style="padding:8px 0 0px 25px;display:none;">没有买卖历史</div>
			<div id="hassalelist" style="display:none;">
				<div class="p7_0">
					<div class="l"><img src="../app/webroot/img/che.gif" alt="购物车" /></div>
					<div class="histy_mx">
						<div class="l w220">
							我今天登录了“朋友买卖”组件，获得￥100
						</div>
						<div class="gw13 tar" style="font-size:9px;">6小时前</div>
						<div class="c"></div>
					</div>
					<div class="c"></div>
				</div>
				<div class="p7_0">
					<div class="l"><img src="../app/webroot/img/che.gif" alt="购物车" /></div>
					<div class="histy_mx">
						<div class="l w220">
							我今天登录了“朋友买卖”组件，获得￥100
						</div>
						<div class="gw13 tar" style="font-size:9px;">1天前</div>
						<div class="c"></div>
					</div>
					<div class="c"></div>
				</div>
				<div class="p7_0">
					<div class="l"><img src="../app/webroot/img/che.gif" alt="购物车" /></div>
					<div class="histy_mx">
						<div class="l w220">
							我在主人<a href='/~slave/index.php?uid=105949' class='sl2'>谢刘俊</a>前半跪着说：“给主子请安！”
						</div>
						<div class="gw13 tar" style="font-size:9px;">11月25日</div>
						<div class="c"></div>
					</div>
					<div class="c"></div>
				</div>
				<div class="p7_0">
					<div class="l"><img src="../app/webroot/img/che.gif" alt="购物车" /></div>
					<div class="histy_mx">
						<div class="l w220">
							<a href='/~slave/index.php?uid=105949' class='sl2'>谢刘俊</a>把我从<a href='/~slave/index.php?uid=2652056' class='sl2'>钟士杰</a>的手里以<span class='dgreen'><strong>&yen;650</strong></span>买走，起个绰号叫“瓶子”
						</div>
						<div class="gw13 tar" style="font-size:9px;">11月25日</div>
						<div class="c"></div>
					</div>
					<div class="c"></div>
				</div>
				<div class="p7_0">
					<div class="l"><img src="../app/webroot/img/che.gif" alt="购物车" /></div>
					<div class="histy_mx">
						<div class="l w220">
							主人<a href='/~slave/index.php?uid=2652056' class='sl2'>钟士杰</a>趴在床上，你给他捶背
						</div>
						<div class="gw13 tar" style="font-size:9px;">11月25日</div>
						<div class="c"></div>
					</div>
					<div class="c"></div>
				</div>
				<div class="p7_0">
					<div class="l"><img src="../app/webroot/img/che.gif" alt="购物车" /></div>
					<div class="histy_mx">
						<div class="l w220">
							我今天登录了“朋友买卖”组件，获得￥100
						</div>
						<div class="gw13 tar" style="font-size:9px;">11月25日</div>
						<div class="c"></div>
					</div>
					<div class="c"></div>
				</div>
			</div>
			<script type="text/javascript">
			 	if("6" == "0")
			 	{
			 		$("nosalelist").style.display = "block";
			 	}
			 	else
			 	{
			 		$("hassalelist").style.display = "block";
			 	}
			</script>
			
       </div>
       <div class="c"></div>
       <div class="mt30">&nbsp;</div>
	   <div class="h200"></div>
    </div>
	
  </div>
</div>
</div>
