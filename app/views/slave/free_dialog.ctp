<div  id="flag1">
	<div style="height:390px;">
		<div  style="padding:20px 0 20px 145px;">
			<div class="dealimg"><img src="http://img.kaixin001.com.cn/i/120_0_0.gif" /></div>
			<div class="c"></div>
		</div>
		<div class="f14 tac" style="padding-top:1px;">
			<div class="tac"><strong>你要释放<span class="sl"><?= $user["userinfo"]["nickname"] ?></span>？</strong></div>
			<div class="mt5 tac"><strong>你将获得原购买价格50%(<strong class="dgreen">&yen;<?= $user["User"]["last_price"]/2 ?></strong>)的退款！</strong></div>
		</div>
		<?php echo $form->create(array('action'=>'free')); ?>
		<input type="hidden" name="slaveuid" value="<?= $user["User"]["uid"]?>">
		<div style="padding:20px 146px;">
			<div class="rbs1" ><input  name="submit" class="rb1-12" onmouseover="this.className='rb2-12';" onmouseout="this.className='rb1-12';" type="submit" value="立即释放<?= $slave["User"]["gender"] ?>"  style="padding:4px 15px;" /></div>
		</div>
		</form>
		
		</div>
		
		<div style="height:40px;border-top:1px solid #ccc;background:#F2F2F2;">
		<div class="r" style="width:10px;">&nbsp;</div>
		<div class="rbs1 mt5" style="float:right;">
			<input type="button" value="取消" class="rb1-12" onmouseover="this.className='rb2-12';" onmouseout="this.className='rb1-12';"  style="padding:4px 10px;" onclick="new parent.dialog().reset();" /></div>
		
	</div>


</div>