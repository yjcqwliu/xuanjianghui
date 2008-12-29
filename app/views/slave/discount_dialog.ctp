<div style="display:block;width:445px;margin:0 auto;"> 
	<div   style="height:390px;padding-top:136px;"> 
		<?php echo $form->create(array('action'=>'discount')); ?>
		<input type="hidden" name="slaveuid" value="<?= $slaveuser["User"]["uid"] ?>">
		
		<div class="tac f14"><b><span class="sl"><?= $slaveuser["userinfo"]["nickname"] ?></span>目前的身价是<strong class="dgreen">&yen;<?= $slaveuser["User"]["sell_price"] ?></strong></b></div> 
		<div class="f14 tac mt5"><b>你要打 <select name="discount"> 
			<option value="1">1&nbsp;</option> 
			<option value="2">2</option> 
			<option value="3">3</option> 
			<option value="4">4</option> 
			<option value="5">5</option> 
			<option value="6">6</option> 
			<option value="7">7</option> 
			<option value="8">8</option> 
			<option value="9">9</option> 
		</select> 折处理<?= $slaveuser["User"]["gender"] ?>吗？</b></div> 
		<div class="c9" style="width:200px;margin:10px auto;"> 
	
			
		</div> 
 
		<div style="padding:10px 186px;"> 
			<div class="rbs1"> 
				<input id="submit" type="submit" value="确定" class="rb1-12" onMouseOver="this.className='rb2-12';" onMouseOut="this.className='rb1-12';" style="padding:2px 15px;" /></div> 
		</div> 
		</form> 
	</div> 
	<div style="height:40px;border-top:1px solid #ccc;background:#F2F2F2;"> 
		<div class="r" style="width:10px;">&nbsp;</div> 
		<div class="rbs1 mt5" style="float:right;"> 
			<input type="button" value="取消" class="rb1-12" onMouseOver="this.className='rb2-12';" onMouseOut="this.className='rb1-12';"  style="padding:4px 10px;" onClick="new parent.dialog().reset();" /></div> 
	</div> 
</div> 