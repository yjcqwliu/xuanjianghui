	<SCRIPT type="text/javascript">
var g_verify = "3639191_1028_3639191_1228628511_6d707c7c81549991e58c3fe01cf2faf2";

function f2_afterseluid(uid)
{
	window.location.href = "/~slave/index.php?uid="+uid;
}

function gotouser(uid)
{
	window.location.href = "/~slave/index.php?uid="+uid;
}


function _bodyonload()
{
	var eventnum = "";
	var eventslave = "";
	if(eventnum == "")
	{
		return ;
	}
	openWindow('/slave/event_dialog.php?eventnum='+eventnum+'&eventslave='+encodeURIComponent(eventslave)+'&verify='+g_verify+'&rand='+Math.random(), 445, 260, '今日公告');
}


function notice()
{
	openAlertBlue("<div style='margin:15px 10px;'>"
+ "<div class=l style='width:70px;padding-top:5px;padding-right:10px;'><img src='http://img.kaixin001.com.cn/i2/park/notice.gif'  /></div>"
+ "<div class=‘l ' style='padding:10px 15px;width:22em;'><span class=f14>当你身价达到<strong class='dgreen'>&yen;12000</strong>后，可以使用自定义的手段“整”或“安抚”奴隶。</span>"
+ "</div>"
+ "<div class=c></div>"

+ "</div>",  "关闭", 445, 200, "朋友买卖公告");
}

</SCRIPT>

  <DIV class="deal_left">
		 <DIV class="dealimg"><?php if($link->show_userpic($user["userinfo"]["userpic"])){echo $html->image($link->show_userpic($user["userinfo"]["userpic"]));}?></DIV>
		 <DIV class="dealinfo">
			<DIV class="">
				<DIV onmouseover="javascript:$(&#39;img141434&#39;).style.display=&#39;block&#39;;" onmouseout="javascript:$(&#39;img141434&#39;).style.display=&#39;none&#39;;">
					<DIV class="l"><STRONG class="f14 dblue"><A href="http://www.kaixin001.com/home/?uid=141434" class="sl2"><?= $user["userinfo"]["nickname"]?></A></STRONG></DIV>
					<DIV class="l" id="img141434" style="display:none;padding:3px 3px;cursor:pointer;" onclick="javascript:window.location.href=#"><?php echo $html->image('house.gif', array('align' => 'absmiddle'))?></DIV>
					<SPAN class="l f12 c9">( 目前TA是晁震的奴隶 )</SPAN>
				</DIV>
				<DIV class="c"></DIV>
			</DIV>
			<DIV class="mb10"><I class="c9">被主人派去歌厅卖唱中...</I><BR></DIV>
			<p>身　价：<strong class="dgreen">&yen;<?= $user["User"]["sell_price"] ?></strong></p>
			<p>总资产：<strong class="dgreen">&yen;<?= $user["User"]["total_money"] ?></strong></p>
			<p>现　金：<strong class="dgreen">&yen;<?= $user["publicinfo"]["money"] ?></strong></p>
			<p>奴隶数：<strong class="dred"><?= $user["User"]["slave_count"] ?></strong></p>
			<DIV class="r wysft" style="margin-right:1px;"><SPAN onclick="javascript:buyslave(<?= $user["User"]["tongju_users_id"] ?>);" style="cursor:pointer;">我要购买</SPAN></DIV>
			<DIV class="c"></DIV>
		 </DIV>
		 <DIV class="c"></DIV>
		 <H3 class="mmls" style="width:450px;"><?= $gender ?>的买卖历史</H3>
		 <DIV id="nosalelist" class="ml20 c9" style="display:none;">没有买卖历史</DIV> 
		 <DIV id="hassalelist" style="display: block; ">
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她被<A href="http://www.kaixin001.com/~slave/index.php?uid=3632948" class="sl2">晁震</A>派去歌厅卖唱，打工8小时
						</DIV>
						<DIV class="gw13">42分钟前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							雷雨交加，天气阴冷，她的主人<A href="http://www.kaixin001.com/~slave/index.php?uid=3632948" class="sl2">晁震</A>给她暖了暖被窝
						</DIV>
						<DIV class="gw13">43分钟前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							<A href="http://www.kaixin001.com/~slave/index.php?uid=3632948" class="sl2">晁震</A>把她从<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>的手里以<SPAN class="dgreen"><STRONG>&yen;17090</STRONG></SPAN>买走
						</DIV>
						<DIV class="gw13">43分钟前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她的主人<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>请她坐到沙发上，亲自给她做足底按摩，她通体舒畅
						</DIV>
						<DIV class="gw13">5小时前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她被<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>派去当小保姆，打工6小时
						</DIV>
						<DIV class="gw13">1天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她的主人<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>请她坐到沙发上，亲自给她做足底按摩，她通体舒畅
						</DIV>
						<DIV class="gw13">1天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>把她从<A href="http://www.kaixin001.com/~slave/index.php?uid=3632948" class="sl2">晁震</A>的手里以<SPAN class="dgreen"><STRONG>&yen;16790</STRONG></SPAN>买走，起个绰号叫&ldquo;秀秀...&rdquo;
						</DIV>
						<DIV class="gw13">1天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她被<A href="http://www.kaixin001.com/~slave/index.php?uid=3632948" class="sl2">晁震</A>派去酒吧陪酒，打工4小时
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她的主人<A href="http://www.kaixin001.com/~slave/index.php?uid=3632948" class="sl2">晁震</A>带她到郊区，在一片翠绿包围的温泉里，两个人泡得如火如荼
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							<A href="http://www.kaixin001.com/~slave/index.php?uid=3632948" class="sl2">晁震</A>把她从<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>的手里以<SPAN class="dgreen"><STRONG>&yen;16490</STRONG></SPAN>买走
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她大声称颂道：主人<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>才高八斗、学富五车，英明神武、一统江湖！
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她今天登录了&ldquo;朋友买卖&rdquo;组件，获得￥100
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她被<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>派去当小保姆，打工4小时
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							傍晚微风徐徐，她的主人<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>带她到公园里散步，美丽的夕阳投射出两人修长的身影
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她被<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>以<SPAN class="dgreen"><STRONG>&yen;16190</STRONG></SPAN>的身价买为奴隶，起个绰号叫&ldquo;秀秀...&rdquo;
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她被<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>释放出来，获得了自由身
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她的主人<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>把她带到一家高雅的西餐厅，在浪漫的烛光中共进晚餐
						</DIV>
						<DIV class="gw13">2天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							天热又干燥，她不辞辛劳亲自给奴隶<A href="http://www.kaixin001.com/~slave/index.php?uid=2810209" class="sl2">涂小凡</A>泡了杯菊花茶解渴
						</DIV>
						<DIV class="gw13">3天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							她大声称颂道：主人<A href="http://www.kaixin001.com/~slave/index.php?uid=170450" class="sl2">吕游</A>风流倜傥、俊雅潇洒，成熟稳重、玉树临风！
						</DIV>
						<DIV class="gw13">3天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							严寒将至，政府发给她取暖费<STRONG class="dgreen">&yen;500</STRONG>
						</DIV>
						<DIV class="gw13">3天前</DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
		</DIV>
		
		<SCRIPT type="text/javascript">
		 	if("20" == "0")
		 	{
		 		$("nosalelist").style.display = "block";
		 	}
		 	else
		 	{
		 		$("hassalelist").style.display = "block";
		 	}
		 </SCRIPT>
		
	  </DIV>
	  <DIV class="deal_right">
			
			<DIV class="c"></DIV>
			<H3 class="wdzr"><?= $gender ?>的主人</H3>
			<?php
			if(!isset($master_user))
			{ ?>
			<DIV id="nohost" class="ml20 mt5 c9" style="display:none;">目前<?= $gender ?>是自由身<BR><BR><BR><BR></DIV>
			<? 
			}
			else
			{
			?>
			<DIV id="hashost" class="mt10" style="display: block; ">
				<DIV class="dealimg2"><A href="http://www.kaixin001.com/~slave/index.php?uid=3632948" class="sl2"><IMG src="../../app/webroot/img/50_3632948_2.jpg" width="50" height="50"></A></DIV>
				<DIV class="w220 l c6 ml10">
					<DIV onmouseover="javascript:$(&#39;img3632948&#39;).style.display=&#39;block&#39;;" onmouseout="javascript:$(&#39;img3632948&#39;).style.display=&#39;none&#39;;">
						<DIV class="l"><STRONG><?= $html->link($master_user['userinfo']['nickname'],array('controller' => 'home','action'=>'friend','id' =>12)) ?></STRONG>
						<? if(isset($master_user['User']['nickname']) and !empty($master_user['User']['nickname']))
						{
						?>
							<SPAN class="c6" title="主人起的绰号">(<?= $master_user['User']['nickname'] ?>)</SPAN>
						<? 
						}
						?>
						</DIV>
						<DIV class="l" id="img3632948" style="display:none;padding:3px 3px;cursor:pointer;" onclick="javascript:window.location.href=&#39;/home/?uid=3632948&#39;;"><IMG align="absmiddle" src="../../app/webroot/img/house.gif" ></DIV>
					</DIV>
					<DIV class="c"></DIV>
					
			<p>身　价：<strong class="dgreen">&yen;<?= $master_user["User"]["sell_price"] ?></strong></p>
			<p>总资产：<strong class="dgreen">&yen;<?= $master_user["User"]["total_money"] ?></strong></p>
			<p>现　金：<strong class="dgreen">&yen;<?= $master_user["publicinfo"]["money"] ?></strong></p>
			<p>奴隶数：<strong class="dred"><?= $master_user["User"]["slave_count"] ?></strong></p>
				</DIV>
				<DIV class="c"></DIV>
			</DIV>
			<?
			}
			?>
			<SCRIPT type="text/javascript">
			 	if("1" == "0")
			 	{
			 		$("nohost").style.display = "block";
			 	}
			 	else
			 	{
			 		$("hashost").style.display = "block";
			 	}
			 </SCRIPT>
			 
			<H3 class="wdnl" style="width:285px; margin:10px 0;"><?= $gender ?>的奴隶</H3>
			<DIV id="noslavelist" class="ml20 c9" style="display:none;">目前<?= $gender ?>没有一个奴隶</DIV>
			<DIV id="hasslavelist" style="display: block; ">
				<DIV>
					<DIV class="dealimg2"><A href="http://www.kaixin001.com/~slave/index.php?uid=2810209" class="sl2"><IMG src="../../app/webroot/img/50_2810209_2.jpg" width="50" height="50"></A></DIV>
					<DIV class="w220 l c6 ml10">
						<DIV onmouseover="javascript:$(&#39;img2810209&#39;).style.display=&#39;block&#39;;" onmouseout="javascript:$(&#39;img2810209&#39;).style.display=&#39;none&#39;;">
							<DIV class="l"><STRONG><A href="http://www.kaixin001.com/~slave/index.php?uid=2810209" class="sl2">涂小凡</A></STRONG><SPAN class="c6" title="主人起的绰号">(吃的少赚得多)</SPAN> </DIV>
							<DIV class="l" id="img2810209" style="display:none;padding:3px 3px;cursor:pointer;" onclick="javascript:window.location.href=&#39;/home/?uid=2810209&#39;;"><IMG align="absmiddle" src="../../app/webroot/img/house.gif" alt="涂小凡的开心网首页"></DIV>
						</DIV>
						<DIV class="c"></DIV>
						
						身　价：<STRONG class="dgreen">&yen;5120</STRONG><BR>
						总资产：<STRONG class="dgreen">&yen;5213</STRONG><BR>
						现　金：<STRONG class="dgreen">&yen;5213</STRONG><BR>
						奴隶数：<STRONG class="dred">0</STRONG><BR>
					</DIV>
					<DIV class="c"></DIV>
					<DIV class="djl2">
						<DIV class="l">
							从 <A href="http://www.kaixin001.com/~slave/index.php?uid=2534328" class="sl2">王秀子</A> 手中花<SPAN class="dgreen"><STRONG>&yen;</STRONG>4870</SPAN> 购买
						</DIV>
						<DIV class="gw13">2008-11-16 16:37</DIV>
					</DIV>
					<DIV class="c"></DIV>
				</DIV>
			</DIV>
			
			<SCRIPT type="text/javascript">
			 	if("1" == "0")
			 	{
			 		$("noslavelist").style.display = "block";
			 	}
			 	else
			 	{
			 		$("hasslavelist").style.display = "block";
			 	}
			 </SCRIPT>
			
       </DIV>
       <DIV class="c"></DIV>
       <DIV class="mt30">&nbsp;</DIV>
	   <DIV class="h200">&nbsp;</DIV>