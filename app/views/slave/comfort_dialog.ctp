<div style="display:block;width:445px;margin:0 auto;"> 
	<div   style="height:390px;"> 
	<?php echo $form->create(array('action'=>'comfort')); ?>
	<input type="hidden" name="slaveuid" value="<?= $user["User"]["uid"] ?>">
	<div  style="padding:20px 0 20px 145px;"> 
		<div class="dealimg"><?php if($link->show_userpic($user["userinfo"]["userpic"])){echo $html->image($link->show_userpic($user["userinfo"]["userpic"]));}?></div> 
		<div class="c"></div> 
	</div> 
	<div class="tac f14 mb10"><b>你要怎么安抚<span class="sl"><?= $user["userinfo"]["nickname"] ?></span>呢？</b></div> 
	<div class="comp_list mb10"> 
	
	<?
	$i = -1;
	foreach($done_comfort as $key => $value)
	{ 
	$i++;
	if($i > $sell_count)break;
	?>
	<ul class="fc">
		<li><input type="radio" name="comforttype" value="<?= $key ?>"><?= $value ?></li>
	</ul>
	<?
	}
	?>
	
	
	</div> 
	<div style="padding:10px 186px;"> 
	<div class="rbs1"> 
		<input id="submit" type="submit" value="确定" class="rb1-12" onmouseover="this.className='rb2-12';" onmouseout="this.className='rb1-12';" style="padding:2px 15px;" /></div> 
	</div> 
		</form> 
	</div> 
	<div style="height:40px;border-top:1px solid #ccc;background:#F2F2F2;"> 
		<div class="r" style="width:10px;">&nbsp;</div> 
		<div class="rbs1 mt5" style="float:right;"> 
			<input type="button" value="取消" class="rb1-12" onmouseover="this.className='rb2-12';" onmouseout="this.className='rb1-12';"  style="padding:4px 10px;" onclick="new parent.dialog().reset();" /></div> 
		
	</div> 
	
</div> 
 
 
 
<style> 
   .rbs1{border:1px solid #d7e7fe; float:left;}
   .rb1-12,.rb2-12{height:23px; color:#fff; font-size:12px; background:#355582; padding:3px 5px; border-left:1px solid #fff; border-top:1px solid #fff; border-right:1px solid #6a6a6a; border-bottom:1px solid #6a6a6a; cursor:pointer;}
   .rb2-12{background:#355582;}
	.comp_list{border:1px solid #cccccc; width:270px; height:125px; overflow-y:scroll; overflow-x:hidden ; margin:0 auto;} 
	.comp_list ul.fc{width:270px;list-style:none; margin:0px; padding:5px 0px; height:16px; border-bottom:dotted 1px #ccc;}
</style> 