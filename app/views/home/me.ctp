
	  <div class="deal_left">
		
		 <div class="dealimg"><?php if($link->show_userpic($user["userinfo"]["userpic"])){echo $html->image($link->show_userpic($user["userinfo"]["userpic"]));}?></div>
		 <div class="dealinfo">
			<div class="">
				<strong class="f14 dblue"><?= $user["userinfo"]["nickname"]?></strong><span class='c6 f14' title='主人起的绰号'><?php echo $user["User"]["nickname"] ?></span>
				<?
				if(!empty($user["User"]["master_id"]) && isset($master_user["userinfo"]["nickname"]))
				{
				?>
				&nbsp;&nbsp;<span class="f12 c9">
				( 目前我是<?= $master_user["userinfo"]["nickname"] ?>的奴隶 )</span>
				<?
				}
				?>
			</div>
			<div class="mb10"></div>
			<p>身　价：<strong class="dgreen">&yen;<?= $user["User"]["sell_price"] ?></strong></p>
			<p>总资产：<strong class="dgreen">&yen;<?= $user["User"]["total_money"] ?></strong></p>
			<p>现　金：<strong class="dgreen">&yen;<?= $user["publicinfo"]["money"] ?></strong></p>
			<p>奴隶数：<strong class="dred"><?= $user["User"]["slave_count"] ?></strong></p>
			<?
			if(!empty($user["User"]["master_id"]) && isset($master_user["userinfo"]["nickname"]))
			{
			?>
			<div class='r wysft' style='margin-right:1px;'><span onclick='javascript:fawnHost(105949);' style='cursor:pointer;'>讨好主人</span></div><div class='r wysft' style='margin-right:1px;'><span onclick='javascript:freeself();' style='cursor:pointer;'>我要赎身</span></div>
			<?
			}
			?>
		 </div>
		 <div class="c"></div>
		 
		 <h3 class="wdnl">我的奴隶</h3>
		 <?php
		 if(empty($slave_user))
		 {
		 ?> 
		 <div id="noslavelist" class="c9" style="padding:0 0 30px 25px;">你目前一个奴隶也没有</div>
		 <?
		 }
		 else
		 {
		 ?>
		 <div id="hasslavelist"> 
		 <div class="nl_list"> 
		 <?
			 foreach($slave_user as $slave)
			 {
			 ?> 
			 
					 <div class="l"> 
					  <div class="dealimg2"> 
						<a href="/~slave/index.php?uid=13310698" class="sl2"><img src="http://img.kaixin001.com.cn/i/50_0_0.gif" width="50" height="50" /></a> 
					  </div> 
					  <div class="c"></div> 
					</div> 
					<div class="l" style="margin-left:10px;width:380px; line-height:180%;"> 
						<div class="w265 l c6"> 
							<div onmouseover="javascript:$('img13310698').style.display='block';" onmouseout="javascript:$('img13310698').style.display='none';"> 
								<div class="l"><strong><a href="/~slave/index.php?uid=13310698" class="sl2"><?= $slave["userinfo"]["nickname"] ?></a></strong> </div> 
								<div class="l" id="img13310698" style="display:none;padding:3px 3px;cursor:pointer;" onclick="javascript:window.location.href='/home/?uid=13310698';"><img align="absmiddle" src="http://img.kaixin001.com.cn/i/slave/house.gif" alt="刘张李的开心网首页" /></div> 
							</div> 
							<div class="c"></div> 
							
							<p>身　价：<strong class="dgreen">&yen;<?= $slave["User"]["sell_price"] ?></strong></p>
							<p>总资产：<strong class="dgreen">&yen;<?= $slave["User"]["total_money"] ?></strong></p>
							<p>现　金：<strong class="dgreen">&yen;<?= $slave["publicinfo"]["money"] ?></strong></p>
							<p>奴隶数：<strong class="dred"><?= $slave["User"]["slave_count"] ?></strong></p>
							
						</div> 
						<div class="r wysft"><span onclick="javascript:freeslave(13310698);" style="cursor:pointer;">我要释放他</span></div> 
						<div class="r wysft"><span onclick="javascript:discountslave(13310698);" style="cursor:pointer;">打折处理</span></div> 
						<div class="r wysft"><span onclick="javascript:painslave(13310698);" style="cursor:pointer;">整他</span></div> 
						<div class="r wysft"><span onclick="javascript:comfortslave(13310698);" style="cursor:pointer;">安抚他</span></div> 
						<div class="c"></div> 
						<div class="djl"> 
							<div class="l"> 
								花<span class='dgreen'><strong>&yen;</strong>500</span> 购买
							</div> 
							<div class="gw13">2008-12-09 13:58</div> 
						</div> 
					</div> 
					<div class="c"></div> 
				<?
				}
		?>
		</div> 
		 </div> 
		<?
		}
		?>
			
		 
		
		 <div class="ml10">
		 	<span class="l"><?php echo $html->image('buynl.gif',array('alt'=>'购买奴隶'))?> 购买奴隶：</span>
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
				<div id="xx_sh" onclick="fs2_viewAllfriend();"><?php echo $html->image('xx_xx1.gif',array('alt'=>'选择好友','class'=>'cp','onmouseover'=>"this.src='../../app/webroot/img/xx_xx2.gif';",'onmouseover'=>"this.src='../../app/webroot/img/xx_xx2.gif';",'onmouseout'=>"this.src='../../app/webroot/img/xx_xx1.gif';"))?></div>
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
					<div class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></div>
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
					<div class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></div>
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
					<div class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></div>
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
					<div class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></div>
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
					<div class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></div>
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
					<div class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></div>
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

