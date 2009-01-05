<body onload="javascript:if ('function' == typeof(_bodyonload)) { _bodyonload(); }">

<script type="text/javascript">

function check()
{
	$("submit").disabled = true;
	var r = false;
	var options = document.form1.paintype;
	for(var i=0 ; i<options.length ; i++)
	{
		if(options[i].checked)
		{
			r = true;
		}
	}
	if(r == false)
	{
		$("submit").disabled = false;
	}
	return r;
}
</script>

<div style="display:block;width:445px;margin:0 auto;">
	<div   style="height:390px;">
	<?php echo $form->create(array('action'=>'fawn')); ?>
	<input type="hidden" name="slaveuid" value="<?= $slaveuser["User"]["uid"] ?>">
	<div  style="padding:20px 0 20px 145px;">
		<div class="dealimg"><img src="http://img.kaixin001.com.cn/i/120_0_0.gif" /></div>
		<div class="c"></div>
	</div>
	<div class="tac f14 mb10"><b>你要怎么讨好<span class="sl"><?= $slaveuser["userinfo"]["nickname"] ?></span>呢？</b></div>
	<div class="comp_list mb10">
	<?
	$i = -3;
	foreach($done_fawn as $key => $value)
	{ 
	$i++;
	//if($i > $sell_count)break;
	?>
	<ul class="fc">
		<li><input type="radio" name="fawntype" value="<?= $key ?>"><?= $value ?></li>
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