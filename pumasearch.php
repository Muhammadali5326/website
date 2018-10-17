


	
		<div class="col-sm-1"></div>
        <div class="col-sm-10" style="">
      <?php 
//echo file_get_contents('https://www.telemart.pk/men-s-fashion/men-s-watches.html');



	if(isset($_POST['btn1']) && $_POST['selectweb']=='puma.us')
	{

		if($_POST['search'])
		{
					?>
      <input type="text" value="you have searched '<?php echo $_POST['search'] ?>' from <?php echo $_POST['selectweb'] ?>"  style="border:1px solid #ebebeb; border-radius:0px; margin-bottom:20px; color:#666; width:100%; font-size:24px; height:40px;padding:20px" readonly="readonly" />
<h3 style="color: tomato">Puma Footwear</h3>


<?php 



	 $html->load(curl('https://us.puma.com/en/us/search?q='.$_POST['search'].''));

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




}
	
	

else{echo "<h4 class='alert alert-danger'>please type something to search!</h4>";}
}	
	
?>


	</div>
<div class="col-sm-1"></div>
 <div class="clearfix"></div>

