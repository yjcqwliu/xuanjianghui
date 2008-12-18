<SCRIPT type="text/javascript">
var g_verify = "3639191_1028_3639191_1228628511_6d707c7c81549991e58c3fe01cf2faf2";
</SCRIPT>
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
					  <? if(isset($slave["userinfo"]["userpic"]))
						echo $html->image($link->show_userpic($slave["userinfo"]["userpic"],2),array('url' => "friend?id=".$slave["User"]["uid"]));  
					 ?>
					  </div> 
					  <div class="c"></div> 
					</div> 
					<div class="l" style="margin-left:10px;width:380px; line-height:180%;"> 
						<div class="w265 l c6"> 
							<div onmouseover="javascript:$('img<?= $slave["User"]["uid"] ?>').style.display='block';" onmouseout="javascript:$('img<?= $slave["User"]["uid"] ?>').style.display='none';"> 
								<div class="l"><strong><?= $html->link($slave["userinfo"]["nickname"],"friend?id=".$slave["User"]["uid"],array('class'=>'s12')) ?></strong>
						<? if(isset($slave['User']['nickname']) and !empty($slave['User']['nickname']))
						{
						?>
							<SPAN class="c6" title="主人起的绰号">(<?= $slave['User']['nickname'] ?>)</SPAN>
						<? 
						}
						?> </div> 
								<div class="l" id="img<?= $slave["User"]["uid"] ?>" style="display:none;padding:3px 3px;cursor:pointer;" onclick="javascript:window.location.href='#nogo';"><img align="absmiddle" src="../webroot/img/house.gif"/></div> 
							</div> 
							<div class="c"></div> 
							
							<p>身　价：<strong class="dgreen">&yen;<?= $slave["User"]["sell_price"] ?></strong></p>
							<p>总资产：<strong class="dgreen">&yen;<?= $slave["User"]["total_money"] ?></strong></p>
							<p>现　金：<strong class="dgreen">&yen;<?= $slave["publicinfo"]["money"] ?></strong></p>
							<p>奴隶数：<strong class="dred"><?= $slave["User"]["slave_count"] ?></strong></p>
							
						</div> 
						<div class="r wysft"><span onclick="javascript:freeslave(<?= $slave["User"]["uid"] ?>);" style="cursor:pointer;">我要释放他</span></div> 
						<div class="r wysft"><span onclick="javascript:discountslave(<?= $slave["User"]["uid"] ?>);" style="cursor:pointer;">打折处理</span></div> 
						<div class="r wysft"><span onclick="javascript:painslave(<?= $slave["User"]["uid"] ?>);" style="cursor:pointer;">整他</span></div> 
						<div class="r wysft"><span onclick="javascript:comfortslave(<?= $slave["User"]["uid"] ?>);" style="cursor:pointer;">安抚他</span></div> 
						<div class="c"></div> 
						<div class="djl"> 
							<div class="l"> 
								<?= $slave['User']['last_sell'] ?>
							</div> 
							<div class="gw13"><?= $slave['User']['sell_updated_at'] ?></div> 
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
					
						<div id="superinput" style="cursor:text;height:23px;float:left;width:130px;" onclick="fs2_superOnclick()">
						&nbsp;
						</div>
						
						<div class="c"></div>
					
					</div>
				</div>
			</div>
			
			<div class="l" style="padding:3px 2px 0px 0px; position:relative;margin:3px 2px 0 0;">
				<div id="xx_sh" onclick="fs2_viewAllfriend();"><?php echo $html->image('xx_xx1.gif',array('alt'=>'选择好友','class'=>'cp','onmouseover'=>"this.src='../webroot/img/xx_xx2.gif';",'onmouseout'=>"this.src='../webroot/img/xx_xx1.gif';"))?></div>
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
			<DIV class="c"></DIV>
			<H3 class="wdzr">我的主人</H3>
			<?php
			if(!isset($master_user))
			{ ?>
			<DIV id="nohost" class="ml20 mt5 c9" >目前我是自由身<BR><BR><BR><BR></DIV>
			<? 
			}
			else
			{
			?>
			<DIV id="hashost" class="mt10" style="display: block; ">
				<DIV class="dealimg2"> <? if(isset($master_user["userinfo"]["userpic"]))
						echo $html->link($html->image($link->show_userpic($master_user["userinfo"]["userpic"],2)),"friend?id=".$master_user["User"]["uid"]);  
					 ?></DIV>
				<DIV class="w220 l c6 ml10">
					<DIV onmouseover="javascript:$(&#39;img3632948&#39;).style.display=&#39;block&#39;;" onmouseout="javascript:$(&#39;img3632948&#39;).style.display=&#39;none&#39;;">
						<DIV class="l"><STRONG><?= $html->link($master_user['userinfo']['nickname'],"friend?id=".$master_user["User"]["uid"]) ?></STRONG>
						<? if(isset($master_user['User']['nickname']) and !empty($master_user['User']['nickname']))
						{
						?>
							<SPAN class="c6" title="主人起的绰号">(<?= $master_user['User']['nickname'] ?>)</SPAN>
						<? 
						}
						?>
						</DIV>
						<DIV class="l" id="img3632948" style="display:none;padding:3px 3px;cursor:pointer;" onclick="javascript:window.location.href=&#39;/home/?uid=3632948&#39;;"><?php echo $html->image('house.gif', array('align' => 'absmiddle'))?></DIV>
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
			 <div class="c"></div>
			<h3 class="mmls">买卖历史</h3>
			<? if(empty($notice))
			{
			?>
			<div id="nosalelist" class="c9" style="padding:8px 0 0px 25px;">没有买卖历史</div>
			<?
			}
			else
			{
				?>
				<div id="hassalelist">
				<?
				foreach($notice as $n)
				{
				?>
					<div class="p7_0">
						<div class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></div>
						<div class="histy_mx">
							<div class="l w220">
								<?= $n["app_friendsell_notices"]["content"] ?>
							</div>
							<div class="gw13 tar" style="font-size:9px;">6小时前</div>
							<div class="c"></div>
						</div>
						<div class="c"></div>
					</div>
				<?
				}
			}
			?>
			
       </div>
       <div class="c"></div>
       <div class="mt30">&nbsp;</div>
	   <div class="h200"></div>
    </div>

