
<body style="background:white; color:black">


	
		<div class="col-sm-1"></div>
        <div class="col-sm-10">
<?php
error_reporting(0);
include"simple_html_dom.php";
$html=new simple_html_dom();


if(isset($_POST['btn1']) && $_POST['selectweb']=='affordable.pk')
	{ 
		if($_POST['search'])
		{
			?>
      <input type="text" value="you have searched '<?php echo $_POST['search'] ?>' from <?php echo $_POST['selectweb'] ?>"  style="border:1px solid #ebebeb; border-radius:0px; margin-bottom:20px; color:tomato; width:100%; font-size:24px; height:40px;padding:20px" readonly="readonly" />
      <?php 

			$html->load(curl('https://www.affordable.pk/search?q='.$_POST['search'].''));
	?>  <?php 
foreach($html->find('div[class=pro-item]') as $key)
{
		$out['out']= $key->find('div[class=pro-content text_ac] span  b ',0)->plaintext;
	$stock=html_entity_decode(trim($out['out']));
	//echo $name."<br>";
	 if($stock!='Out of Stock')
	 { 
		
$item['name']= $key->find('div[class=desc] p[class=title]  a ',0)->innertext;
	$name=html_entity_decode(trim($item['name']));
	 $name."<br>";
	
	

	
	
	$price['amount']= $key->find('ul[class=h-list price-area] li[class=price] span',0)->plaintext;
	$amount=html_entity_decode(trim($price['amount']));
	 $amount."<br>";;

$del['del']= $key->find('ul[class=h-list price-area] li[class=price] span[class=cut]',0)->plaintext;
	$delprice=html_entity_decode(trim($del['del']));
	$delprice."<br><br>";

$discount['discount']= $key->find('span[class=discount]',0)->plaintext;
	$discountprice=html_entity_decode(trim($discount['discount']));
	 $discountprice."<br>";
	
 //$off=100-(($real_amount/$real_disc)*100);

	$img['image']= $key->find('figure[class=image-holder] a img',0)->getAttribute('src');
	$image=html_entity_decode(trim($img['image']));
	
	$image."</br>";
	?>

      <div class="col-sm-3 maindiv">
      <?php  if($discountprice!=""){?>	<span class="off"><?php echo $discountprice;} ?></span>
      	<span class="clearfix"></span>
      	<img src="<?php echo $image ?>" class="img-thumbnail img-responsive" style="height:250px; width:300px" />
      	<span class="clearfix"></span>
      	<?php echo "<p style='  text-align:center;   overflow: hidden;
    padding: 0px;
    width: 200px;
    height: 20px;'>".$name."</p>"; ?>
      	<span class="clearfix"></span>
    <span class="col-sm-6"><?php echo "<b>".$amount."</b>"; ?></span>
    <span class="col-sm-6"><?php echo "<b><del style='color:#57585c'>".$delprice."</del></b>"; ?></span>

</div>


      <?php /* */
	 }


	else
	{
		}
}	
	
	

	}
	
	else{echo "<h4 class='alert alert-danger'>please type something to search!</h4>";}
}
	?>

	</div>
<div class="col-sm-1"></div>
 

