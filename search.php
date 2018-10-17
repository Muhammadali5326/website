<?php 
error_reporting(0);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Home ::</title>
</head>
<link type="text/css" rel="stylesheet" href="bootstrap.css" />

<body style="background:white; color:black">
<style>
.off
{
    background: red;
    position: absolute;
    color: white;
    font-weight: 800;
    padding: 1px;
    margin: 1px;
    border: 1px solid red;
	border-top-left-radius:3px;
    font-size: 11px;	
	}
.maindiv{
 float:left;
 padding:10px;
 
 cursor:pointer;
 border:1px solid #eee;
 margin-bottom:10px;
}
.maindiv:hover
{
	background:white:
	color:black;
	
	
}


</style>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <nav class="navbar navbar-inverse" style="">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="#">DEMO WEBSITE</a> </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#" data-toggle="modal" data-target="#myModal3"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#" data-toggle="modal" data-target="#set-alert"><span class="glyphicon glyphicon-star"></span> set alert</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
   
  </div>
</div>
</body>
</html>
<div class="container">
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <?php 
//echo file_get_contents('https://www.telemart.pk/men-s-fashion/men-s-watches.html');

include"simple_html_dom.php";
$html=new simple_html_dom();

	?>
      <input type="text" value="you have searched '<?php echo $_GET['search'] ?>'"  style="border:1px solid #ebebeb; border-radius:0px; margin-bottom:20px; color:#666; width:100%; font-size:24px; height:40px;padding:20px" readonly="readonly" />
      <?php 
      if($_GET['url']=='pak'){
			$html->load_file('https://www.pakstyle.pk/search/'.$_GET['search'].'');
      

foreach($html->find('div[class=single-product]') as $key)
{

	$price['amount']= $key->find('div[class=pro-content text_ac] p  span ',0)->plaintext;
	$amount=html_entity_decode(trim($price['amount']));
	
	
	$real_amount=str_replace("Rs.","",$amount);
	//echo $amount."<br>";
	
$del['del']= $key->find('div[class=pro-content text_ac] p  del ',0)->plaintext;
	$disc=html_entity_decode(trim($del['del']));
	$real_disc=str_replace("Rs.","",$disc);
	//echo $disc."<br>";
	
 $off=100-(($real_amount/$real_disc)*100);
	if($off<$_GET['off'])
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
      <div class="col-sm-4 maindiv"><span class="off"><?php echo ceil($off); ?>%off</span><span class="clearfix"></span><img src="<?php echo $image ?>" class="img-thumbnail img-responsive" style="height:250px; width:300px" /><span class="clearfix"></span><?php echo "<p style='  text-align:center;   overflow: hidden;
    padding: 0px;
    width: 200px;
    height: 20px;'>".$name."</p>"; ?><span class="clearfix"></span><span class="col-sm-6"><?php echo "<b>".$amount."</b>"; ?></span><span class="col-sm-6"><?php echo "<b><del style='color:#57585c'>".$disc."</del></b>"; ?></span></span></div>
      <?php
	 }
	 }
	}

	}
	elseif( $_GET['url']=='afford')
	{


$html->load_file('https://www.affordable.pk/search?q='.$_GET['search'].'');

foreach($html->find('div[class=pro-item]') as $key)
{
	//	$out['out']= $key->find('div[class=pro-content text_ac] span  b ',0)->plaintext;
	//$stock=html_entity_decode(trim($out['out']));
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
      	<span class="off"><?php echo $discountprice; ?></span>
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
      <?php
	
	}
}


	}
	elseif($_GET['url']=='sport')
	{




				$html->load_file('http://thesportstore.pk/index.php?route=product/search&search='.$_GET['search'].'');
 //$html->load_file('http://thesportstore.pk/Cricket/Footwear');

foreach($html->find('div[class=product-list-item]') as $key)
{
	$sale['sale']=  $key->find('span[class=label-sale] b',0)->innertext;
	$amountsale=html_entity_decode(trim($sale['sale'])); 
	echo $amountsale;


	//if($amountsale<=$off){}
	/*
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
*/
}
	}

?>
	<div styl>
		






	</div>