<h3 style="color: tomato">Puma Footwear</h3>
<?php
	 $html->load(curl('https://us.puma.com/on/demandware.store/Sites-NA-Site/en_US/Search-UpdateGrid?cgid=21100&sz=120&start=143'));

foreach($html->find('div[class=grid-tile col-6 col-sm-4 col-md-3]') as $key)
{
	


		
$item['name']= $key->find('div[class=pdp-link] a ',0)->innertext;
	$name=html_entity_decode(trim($item['name']));
		//echo $name."<br>";


	$price['price']= $key->find('span[class=sales] span[class=value] ',0)->plaintext;
	$prices=html_entity_decode(trim($price['price']));
	//echo $prices."<br>";

	$off['off']= $key->find('span[class=strike-through list] span ',0)->plaintext;
	$offprice=html_entity_decode(trim($off['off']));
	//echo $offprice."<br>";


		$realprice=str_replace("$","",$prices);
 		"<b>";
 		$realoff=str_replace("$","",$offprice);	
 		"<b>";
	
 $sale=100-(($realprice/$realoff)*100);
 $sale=ceil($sale);


$imgurl['imgurl']= $key->find('div[class=image-container] a img',0)->getAttribute('src');
$image=html_entity_decode(trim($imgurl['imgurl']));
	

?>


     <div class="col-sm-4 maindiv">
<?php 
if($offprice){
     ?>	<span class="off" ><?php echo  
      $sale; ?>%off</span>
<?php }?>
      <span class="clearfix"></span><img src="<?php echo $image ?>" class="img-thumbnail img-responsive" style="height:250px; width:300px" /><span class="clearfix"></span><?php echo "<p style='  text-align:center;   overflow: hidden;
    padding: 0px;
    width: 200px;
    height: 20px;'>".$name."</p>"; ?><span class="clearfix"></span>
    <span class="col-sm-6"><?php echo "<b>".$prices."</b>"; ?></span>
     <span class="col-sm-6"><?php echo "<del>".$offprice."</del>"; ?></span>
</span></div>
      <?php







	}

//cho count($count);
	?>
