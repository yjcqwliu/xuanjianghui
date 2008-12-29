<?php echo $form->create(array('action'=>'pain')); ?>
<br><br>
<div class="comp_list mb10">
<?
	if(!empty($slaveusers))
	{
		foreach($slaveusers as $s);
		{
		?>
		<ul class="fc">
			<li><?= $html->link($s["userinfo"]["nickname"],"../home/friend?id=".$s["User"]["uid"],array('class'=>'s12','target'=>'_top')) ?> 身价：&yen;<?= $s["User"]["sell_price"] ?></li>
		</ul>
		<?
		}
	}
	else
	{
		echo"目前没有能买的好友";
	}
?>
</div>
<style>
   .rbs1{border:1px solid #d7e7fe; float:left;}
   .rb1-12,.rb2-12{height:23px; color:#fff; font-size:12px; background:#355582; padding:3px 5px; border-left:1px solid #fff; border-top:1px solid #fff; border-right:1px solid #6a6a6a; border-bottom:1px solid #6a6a6a; cursor:pointer;}
   .rb2-12{background:#355582;}
	.comp_list{border:1px solid #cccccc; width:270px; height:125px; overflow-y:scroll; overflow-x:hidden ; margin:0 auto;} 
	.comp_list ul.fc{width:270px;list-style:none; margin:0px; padding:5px 0px; height:16px; border-bottom:dotted 1px #ccc;}
</style>