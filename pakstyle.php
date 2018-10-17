<h3 style="color: tomato">Footwear</h3>
<?php 

		$html->load(curl('https://www.pakstyle.pk/search/shoes'));

foreach($html->find('div[class=single-product]') as $key)
{
		$out['out']= $key->find('div[class=pro-content text_ac] span  b ',0)->plaintext;
	$stock=html_entity_decode(trim($out['out']));
	//echo $name."<br>";
	 if($stock!='Out of Stock')
	 { 
		
$item['name']= $key->find('div[class=pro-content text_ac] p  b ',0)->innertext;
	$name=html_entity_decode(trim($item['name']));
	//echo $name."<br>";
	
	

	
	
	$price['amount']= $key->find('div[class=pro-content text_ac] p  span ',0)->plaintext;
	$amount=html_entity_decode(trim($price['amount']));
	
	
	$real_amount=str_replace("Rs.","",$amount);
	//echo $amount."<br>";
	
$del['del']= $key->find('div[class=pro-content text_ac] p  del ',0)->plaintext;
	$disc=html_entity_decode(trim($del['del']));
	$real_disc=str_replace("Rs.","",$disc);
	//echo $disc."<br>";
	
 $off=100-(($real_amount/$real_disc)*100);

	$img['image']= $key->find('div[class=pro-img] img',0)->getAttribute('src');
	$image=html_entity_decode(trim($img['image']));
	
	//echo $image."</br>";
	?>
      <div class="col-sm-4 maindiv"><span class="off"><?php echo ceil($off);  ?>%off</span><span class="clearfix"></span><img src="<?php echo $image ?>" class="img-thumbnail img-responsive" style="height:250px; width:300px" /><span class="clearfix"></span><?php echo "<p style='  text-align:center;   overflow: hidden;
    padding: 0px;
    width: 200px;
    height: 20px;'>".$name."</p>"; ?><span class="clearfix"></span><span class="col-sm-6"><?php echo "<b>".$amount."</b>"; ?></span><span class="col-sm-6"><?php echo "<b><del style='color:#57585c'>".$disc."</del></b>"; ?></span></span></div>
      <?php
	 }
	else
	{
	
	
	
		
		}
}
	
	?>