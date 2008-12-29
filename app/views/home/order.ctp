<DIV class="ph_left">
	   		<H3>排序</H3>
			<DIV class="ph_area">
				<P <? if($order == "sell_price"){?>class="pbg"<?}?> style="cursor:pointer;" onclick="javascript:window.location.href='order?type=sell_price';"><?=$html->image("px1.gif",array("alt"=>"身价最贵的","align"=>"absmiddle"))?> 身价最贵的</P>
				<P <? if($order == "sell_updated_at"){?>class="pbg"<?}?> style="cursor:pointer;" onclick="javascript:window.location.href='order?type=sell_updated_at';" class=""><?=$html->image("px2.gif",array("alt"=>"最新被买","align"=>"absmiddle"))?> 最新被买</P>
				<P onmouseover="this.className=&quot;pbg0&quot;;" onmouseout="this.className=&quot;&quot;;" style="cursor:pointer;" onclick="javascript:window.location.href='order?type=total_money';" class=""><?=$html->image("px3.gif",array("alt"=>"资产最多","align"=>"absmiddle"))?> 资产最多</P>
				<P onmouseover="this.className=&quot;pbg0&quot;;" onmouseout="this.className=&quot;&quot;;" style="cursor:pointer;" onclick="javascript:window.location.href='order?type=money';"><?=$html->image("px4.gif",array("alt"=>"现金最多","align"=>"absmiddle"))?> 现金最多</P>
			</DIV>
			<!--H3>性别</H3>
			<DIV class="ph_area">
				<P class="pbg" style="cursor:pointer;" onclick="javascript:window.location.href=&#39;/~slave/top.php?type=price&amp;gender=&amp;range=friend&#39;;"><IMG src="./朋友买卖 - 开心网2_files/px5.gif" alt="全部" align="absmiddle"> 全部</P>
				<P onmouseover="this.className=&quot;pbg0&quot;;" onmouseout="this.className=&quot;&quot;;" style="cursor:pointer;" onclick="javascript:window.location.href=&#39;/~slave/top.php?type=price&amp;gender=1&amp;range=friend&#39;;"><IMG src="./朋友买卖 - 开心网2_files/px6.gif" alt="女奴隶" align="absmiddle"> 女奴隶</P>
				<P onmouseover="this.className=&quot;pbg0&quot;;" onmouseout="this.className=&quot;&quot;;" style="cursor:pointer;" onclick="javascript:window.location.href=&#39;/~slave/top.php?type=price&amp;gender=0&amp;range=friend&#39;;"><IMG src="./朋友买卖 - 开心网2_files/px7.gif" alt="男奴隶" align="absmiddle"> 男奴隶</P>
			</DIV-->
			<!--H3>范围</H3>
			<DIV class="ph_area">
				<P class="pbg" style="cursor:pointer;" onclick="javascript:window.location.href=&#39;/~slave/top.php?type=price&amp;gender=&amp;range=friend&#39;;"><IMG src="./朋友买卖 - 开心网2_files/friend.gif" alt="仅好友" align="absmiddle"> 仅好友</P>
				<P onmouseover="this.className=&quot;pbg0&quot;;" onmouseout="this.className=&quot;&quot;;" style="cursor:pointer;" onclick="javascript:window.location.href=&#39;/~slave/top.php?type=price&amp;gender=&amp;range=all&#39;;"><IMG src="./朋友买卖 - 开心网2_files/all_people.gif" alt="所有人" align="absmiddle"> 所有人</P>
				
			</DIV-->
	   </DIV>
	   
<DIV class="ph_right">
	   		<DIV class="ph_list">
		 	<DIV class="l f14" style="padding-top:8px;">奴隶排行</DIV>
			
			<DIV class="c"></DIV>
			</DIV>
	  		
		<?php
		 if(empty($slave_user))
		 {
		 ?> 
		 <div id="noslavelist" class="c9" style="padding:0 0 30px 25px;">目前没有数据</div>
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
			 
					<DIV class="ph_list2">
						<DIV class="dealimg2"><?= $html->image($link->show_userpic($slave["userinfo"]["userpic"],2),array('url' => "friend?id=".$slave["User"]["uid"])); ?></DIV>
						<DIV class="ml10 l" style="width:500px; line-height:180&percnt;;">
							<DIV class="w265 l c6">
								<DIV onmouseover="javascript:$(&#39;img141434&#39;).style.display=&#39;block&#39;;" onmouseout="javascript:$(&#39;img141434&#39;).style.display=&#39;none&#39;;">
									<DIV class="l"><STRONG>
									<?= $html->link($slave["userinfo"]["nickname"],"friend?id=".$slave["User"]["uid"],array('class'=>'s12')) ?></strong>
									<? if(!empty($slave['User']['master_id']) and !empty($slave['User']['nickname']))
									{
									?>
										<SPAN class="c6" title="主人起的绰号">(<?= $slave['User']['nickname'] ?>)</SPAN>
									<? 
									}
									?></DIV>
									<div class="l" id="img<?= $slave["User"]["uid"] ?>" style="display:none;padding:3px 3px;cursor:pointer;" onclick="javascript:window.location.href='#nogo';"><img align="absmiddle" src="../webroot/img/house.gif"/></div> 
									<DIV class="l">&nbsp;&nbsp;</DIV>
									<SPAN class="c9 l"><? 
									if(!empty($slave["User"]["master_id"]))
									{ 
									echo "(".$html->link($slave["User"]["master_nickname"],"friend?id=".$slave["User"]["master_id"],array('class'=>'s12'))."的奴隶)";
									}
									?> </SPAN>
								</DIV>
								<DIV class="c"></DIV>
								
								身　价：<STRONG class="dgreen">&yen;<?= $slave["User"]["sell_price"] ?></STRONG><BR>
								总资产：<STRONG class="dgreen">&yen;<?= $slave["User"]["total_money"] ?></STRONG><BR>
								现　金：<STRONG class="dgreen">&yen;<?= $slave["publicinfo"]["money"] ?></STRONG><BR>
								奴隶数：<STRONG class="dred"><?= $slave["User"]["slave_count"] ?></STRONG><BR>
							</DIV>
							<DIV class="r">
								<DIV class="wysft2"><SPAN style="cursor:pointer;" onclick="javascript:buyslave(<?= $slave["User"]["uid"] ?>);">我要购买</SPAN></DIV>
							</DIV>
							<DIV class="c"></DIV>
							<DIV class="djl">
								<? if(!empty($slave['User']['last_sell']))
								{ 
								?>
								<DIV class="l">
									<?= $slave['User']['last_sell'] ?>
								</DIV>
								<DIV class="gw13"><?= $slave['User']['sell_updated_at'] ?></DIV>
								<?
								}
								else
								{
								 	echo("最近没有被交易");
								}
								?>
							</DIV>
						</DIV>
						<DIV class="c"></DIV>
					</DIV>
				<?
				}
		?>
		</div> 
		 </div> 
		<?
		}
		?>
		
		
		 
	   </DIV>