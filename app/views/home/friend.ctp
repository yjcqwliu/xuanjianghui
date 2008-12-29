	
  <DIV class="deal_left">
		 <DIV class="dealimg"><?php if($link->show_userpic($user["userinfo"]["userpic"])){echo $html->image($link->show_userpic($user["userinfo"]["userpic"]));}?></DIV>
		 <DIV class="dealinfo">
			<DIV class="">
				<DIV onmouseover="javascript:$(&#39;img141434&#39;).style.display=&#39;block&#39;;" onmouseout="javascript:$(&#39;img141434&#39;).style.display=&#39;none&#39;;">
					<DIV class="l"><STRONG class="f14 dblue"><A href="#" class="sl2"><?= $user["userinfo"]["nickname"]?></A></STRONG></DIV>
					<DIV class="l" id="img141434" style="display:none;padding:3px 3px;cursor:pointer;" onclick="javascript:window.location.href=#"><?php echo $html->image('house.gif', array('align' => 'absmiddle'))?></DIV>
					<SPAN class="l f12 c9"><?if(isset($master_user))
											{
											?>
											( 目前<?= $user["User"]["gender"] ?>是<?= $master_user["userinfo"]["nickname"] ?>的奴隶 )
											<?
											}
											?></SPAN>
				</DIV>
				<DIV class="c"></DIV>
			</DIV>
			<DIV class="mb10">
			<? if($user["User"]["pain_updated_at"] > date("Y-m-d H:i:s")) 
			{?>
			<I class="c9"><?= $user['User']['status'] ?>...</I><BR>
			<? 
			}?>
			</DIV>
			<p>身　价：<strong class="dgreen">&yen;<?= $user["User"]["sell_price"] ?></strong></p>
			<p>总资产：<strong class="dgreen">&yen;<?= $user["User"]["total_money"] ?></strong></p>
			<p>现　金：<strong class="dgreen">&yen;<?= $user["publicinfo"]["money"] ?></strong></p>
			<p>奴隶数：<strong class="dred"><?= $user["User"]["slave_count"] ?></strong></p>
			<? if (isset($master_user) && $master_user["User"]["uid"] == $current_user["User"]["uid"] )
			{?>
			<DIV class="r wysft" style="margin-right:1px;"><span onclick="javascript:freeslave(<?= $user["User"]["uid"] ?>);" style="cursor:pointer;">我要释放<?= $user["User"]["gender"] ?></span></DIV>
			<?
			}
			else
			{?>
			<DIV class="r wysft" style="margin-right:1px;"><SPAN onclick="javascript:buyslave(<?= $user["User"]["uid"] ?>);" style="cursor:pointer;">我要购买</SPAN></DIV>
			<?}?>
			
			<DIV class="c"></DIV>
		 </DIV>
		 <DIV class="c"></DIV>
		 <H3 class="mmls" style="width:450px;"><?= $user["User"]["gender"] ?>的买卖历史</H3>
		 <? if(empty($notice))
		{
		?>
			 <DIV id="nosalelist" class="ml20 c9">没有买卖历史</DIV>
		<?
		}
		else
		{
			?> 
			 <DIV id="hassalelist" style="display: block; ">
			  <?
			foreach($notice as $n)
			{
			?>
			 <DIV class="p7_0">
					<DIV class="l"><?php echo $html->image('che.gif',array('alt'=>'购物车'))?></DIV>
					<DIV class="histy_mx2">
						<DIV class="l w360">
							<?= $n["app_friendsell_notices"]["content"] ?>
						</DIV>
						<DIV class="gw13"></DIV>
						<DIV class="c"></DIV>
					</DIV>
					<DIV class="c"></DIV>
			</DIV>
		<?
			}
		}
		?>
			 
		</DIV>
		
		
	  </DIV>
	  <DIV class="deal_right">
			
			<DIV class="c"></DIV>
			<H3 class="wdzr"><?= $user["User"]["gender"] ?>的主人</H3>
			<?php
			if(!isset($master_user))
			{ ?>
			<DIV id="nohost" class="ml20 mt5 c9" >目前<?= $user["User"]["gender"] ?>是自由身<BR><BR><BR><BR></DIV>
			<? 
			}
			else
			{
			?>
			<DIV id="hashost" class="mt10" style="display: block; ">
				<DIV class="dealimg2"> <?= $html->image($link->show_userpic($master_user["userinfo"]["userpic"],2),array('url' => "friend?id=".$master_user["User"]["uid"]))
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
			 
			<H3 class="wdnl" style="width:285px; margin:10px 0;"><?= $user["User"]["gender"] ?>的奴隶</H3>
			<?php
			 if(empty($slave_user))
			 {
			 ?> 
				<DIV id="noslavelist" class="ml20 c9" >目前<?= $user["User"]["gender"] ?>没有一个奴隶</DIV>
			 <?
			 }
			 else
			 {
			 ?>
			<DIV id="hasslavelist" style="display: block; ">
			 <?
			 foreach($slave_user as $slave)
			 {
			 ?> 
				<DIV>
					<DIV class="dealimg2">
					<?= $html->image($link->show_userpic($slave["userinfo"]["userpic"],2),array('url' => "friend?id=".$slave["User"]["uid"])) ?></DIV>
					<DIV class="w220 l c6 ml10">
						<div onmouseover="javascript:$('img<?= $slave["User"]["uid"] ?>').style.display='block';" onmouseout="javascript:$('img<?= $slave["User"]["uid"] ?>').style.display='none';"> 
								<div class="l"><strong><?= $html->link($slave["userinfo"]["nickname"],"friend?id=".$slave["User"]["uid"],array('class'=>'s12')) ?></strong>
						<? if(isset($slave['User']['nickname']) and !empty($slave['User']['nickname']))
						{
						?>
							<SPAN class="c6" title="主人起的绰号">(<?= $slave['User']['nickname'] ?>)</SPAN>
						<? 
						}
						?> </DIV>
							<DIV class="l" id="img2810209" style="display:none;padding:3px 3px;cursor:pointer;" onclick="javascript:window.location.href=&#39;/home/?uid=2810209&#39;;"><?php echo $html->image('house.gif', array('align' => 'absmiddle'))?></DIV>
						</DIV>
						<DIV class="c"></DIV>
						
						<p>身　价：<strong class="dgreen">&yen;<?= $slave["User"]["sell_price"] ?></strong></p>
						<p>总资产：<strong class="dgreen">&yen;<?= $slave["User"]["total_money"] ?></strong></p>
						<p>现　金：<strong class="dgreen">&yen;<?= $slave["publicinfo"]["money"] ?></strong></p>
						<p>奴隶数：<strong class="dred"><?= $slave["User"]["slave_count"] ?></strong></p>
					</DIV>
					<DIV class="c"></DIV>
					<DIV class="djl2">
						<DIV class="l">
							<?= $slave['User']['last_sell'] ?>
						</DIV>
						<DIV class="gw13"><?= $slave['User']['sell_updated_at'] ?></DIV>
					</DIV>
					<DIV class="c"></DIV>
				</DIV>
			<?
					}
			}?>
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