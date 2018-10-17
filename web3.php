


	
		<div class="col-sm-1"></div>
        <div class="col-sm-10" style="">
      <?php 
//echo file_get_contents('https://www.telemart.pk/men-s-fashion/men-s-watches.html');



	if(isset($_POST['btn1']) && $_POST['selectweb']=='sport')
	{

		if($_POST['search'])
		{
					?>
      <input type="text" value="you have searched '<?php echo $_POST['search'] ?>' from <?php echo $_POST['selectweb'] ?>"  style="border:1px solid #ebebeb; border-radius:0px; margin-bottom:20px; color:#666; width:100%; font-size:24px; height:40px;padding:20px" readonly="readonly" />
      <?php 
			$html->load(curl('http://thesportstore.pk/index.php?route=product/search&search='.$_POST['search'].'#/sort=p.sort_order/order=ASC/limit=100'));
 //$html->load_file('http://thesportstore.pk/Cricket/Footwear');

foreach($html->find('div[class=product-list-item]') as $key)
{
	$out['out']= $key->find('div[class=product-thumb outofstock] p[class=price]',0)->innertext;
	$outofstock=html_entity_decode(trim($out['out']));
	//echo $outofstock;
	if(!$outofstock)
		{
$item['name']= $key->find('div[class=caption] a',0)->plaintext;
	$name=html_entity_decode(trim($item['name']));
	//echo $name."<br>";

	
	
	
	$price['amount']= $key->find('div[class=caption] p[class=price] span[class=price-new]',0)->innertext;
	$amount=html_entity_decode(trim($price['amount']));



	$just['just']= $key->find('p[class=price]',0)->innertext;
	$justamount=html_entity_decode(trim($just['just']));
	
	//echo $amount."<br>";

	
	$img['image']= $key->find('img[class=lazy first-image]',0)->getAttribute('data-src');
	$image=html_entity_decode(trim($img['image']));
	

	$sale['sale']=  $key->find('span[class=label-sale] b',0)->innertext;
	$amountsale=html_entity_decode(trim($sale['sale'])); 

	$oldprice['oldprice']= $key->find('span[class=price-old]',0)->innertext;
	$amount1=html_entity_decode(trim($oldprice['oldprice']));	


	?>


   <div class="col-sm-4 maindiv">
<?php if($amountsale){ 
?>
<span class="off"><?php echo $amountsale; ?>off</span>
<?php } ?>
<span class="clearfix"></span>
 <img src="<?php echo $image ?>" class="img-thumbnail img-responsive" style="height:250px; width:300px" />
 <span class="clearfix"></span>
 
 <?php echo "<p style='  text-align:center;   overflow: hidden;
    padding: 0px;
    width: 200px;
    height: 20px;'>".$name."</p>"; ?>


 
  <span class="clearfix"></span>
  <?php if(!$amountsale){ ?>
 <span class="col-sm-6">
 <?php echo "<b style='color:#57585c'>".$justamount."</b>"; ?>
</span>
 <?php 
}
else
{?>
 <span class="col-sm-6">
 <?php echo "<b style='color:#57585c'>".$amount."</b>"; ?>
</span>
 <?php 

}


if($amountsale){ ?>
 <span class="col-sm-6">
 <?php echo "<b><del style='color:red'>".$amount1."</del></b>"; ?>
</span>
 <?php }


 ?>
 </span>

</div>
<?php

}

}	}
	
	

else{echo "<h4 class='alert alert-danger'>please type something to search!</h4>";}
}	
	
?>


	</div>
<div class="col-sm-1"></div>
 <div class="clearfix"></div>

