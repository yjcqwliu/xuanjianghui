<div  id="flag7" style="display:block;width:445px;margin:0 auto;">
<div   style="height:390px;">
<?php echo $form->create(array('action'=>'buy')); ?>
	<div  style="padding:10px 0 5px 145px;">
		<div class="dealimg"><?php if($link->show_userpic($user["userinfo"]["userpic"])){echo $html->image($link->show_userpic($user["userinfo"]["userpic"]));}?></div>
		<div class="c"></div>
	</div>
	
	<div class="tac f14"><b>你想花 <strong class="dgreen">&yen;<?= $user["User"]["sell_price"] ?></strong> 的价格购买<span class="sl"><?= $user["userinfo"]["nickname"] ?></span>为奴?</b></div>
	<div class="f14 tac "><b>你现在有现金 <strong class="dgreen">&yen;<?= $mymoney ?></strong> 。</b></div>
	<div class="c9" style="width:200px;margin:5px auto;">
		<?php
		if($user["User"]["last_price"]) 
		{?>
		<div class="l" style="width:90px;">他的上次身价</div>
		<div class="l tar"style="width:100px;"><strong class="dgreen">&yen;<?= $user["User"]["last_price"] ?></strong></div>
		<div class="c"></div>
		
		<div class="l" style="width:90px;">原主人收益</div><div class="l tar"style="width:100px;"><strong class="dgreen">&yen;105</strong></div><div class="c"></div>
		
		<div class="l" style="width:90px;">他的收益</div>
		<div class="l tar"style="width:100px;"><strong class="dgreen">&yen;30</strong></div>
		<div class="c"></div>
		<?php 
		}
		?>
		<div class="l" style="width:90px;">人口交易印花税</div>
		<div class="l tar"style="width:100px;"><strong class="dgreen">&yen;15</strong></div>
		<div class="c" style=""></div>
		<div style="border-top:1px solid #ccc;height:4px;"></div>
		<div class="l" style="width:90px;margin-top:0px !important;margin-top:-10px;">他的现在身价</div>
		<div class="l tar"style="width:100px;margin-top:0px !important;margin-top:-10px;"><strong class="dred">&yen;<?= $user["User"]["sell_price"] ?></strong></div>
		<div class="c"></div>
		
	</div>
	
	<div class="f12 l mt15 " style="padding-left:110px;">给他起个绰号：</div>
	<div class="l mt15"><span class="it_s"><input type="text" name="nick" value="" class="it1" onfocus="this.className='it2';" onblur="this.className='it1';" style="width:10em;" maxlength="8"></span></div>
	<div class="c"></div>
	<input type="hidden" name="slaveuid" value="<?= $user["User"]["tongju_users_id"] ?>">

	
<div style="padding:10px 150px;">
	<div class="rbs1">
		<input name="submit" type="submit" value="立即购买他" class="rb1-12" onmouseover="this.className='rb2-12';" onmouseout="this.className='rb1-12';" style="padding:2px 15px;" /></div>
</div>
</form>

</div>
<div style="height:40px;border-top:1px solid #ccc;background:#F2F2F2;">
	<div class="r" style="width:10px;">&nbsp;</div>
	<div class="rbs1 mt5" style="float:right;">
		<input type="button" value="取消" class="rb1-12" onmouseover="this.className='rb2-12';" onmouseout="this.className='rb1-12';"  style="padding:4px 10px;" onclick="new parent.dialog().reset();" /></div>
	
</div>
</div>