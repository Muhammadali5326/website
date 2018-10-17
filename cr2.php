<?php 
include "head/header.php";
include"curl.php";
include"web2.php";
include"web3.php";
include"pumasearch.php";

      

?>
<div id="loadpage" hidden="">
	<?php 
//include"head/spinner.html";
?></div>
<?php 
$items='sandels sandel clothes cloth cap caps cup cups';
    




 // include"web1.php";
  ?>
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <?php 
//echo file_get_contents('https://www.telemart.pk/men-s-fashion/men-s-watches.html');



	if(isset($_POST['btn1']) && $_POST['selectweb']=='pakstyle.pk')
	{
		
		if($_POST['search'])
		{
			?>
      <input type="text" value="you have searched '<?php echo $_POST['search'] ?>' from <?php echo $_POST['selectweb'] ?>"  style="border:1px solid #ebebeb; border-radius:0px; margin-bottom:20px; color:#666; width:100%; font-size:24px; height:40px;padding:20px" readonly="readonly" />
      <?php 
      //$url=curl("https://www.pakstyle.pk/search/'.$_POST['search'].'");
	$html->load(curl('https://www.pakstyle.pk/search/'.$_POST['search'].''));

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



      <div class="col-sm-4 maindiv"><span class="off"><?php echo ceil($off); ?>%off</span><span class="clearfix"></span><img src="<?php echo $image ?>" class="img-thumbnail img-responsive" style="height:250px; width:300px" /><span class="clearfix"></span><?php echo "<p style='  text-align:center;   overflow: hidden;
    padding: 0px;
    width: 200px;
    height: 20px;'>".$name."</p>"; ?><span class="clearfix"></span><span class="col-sm-6"><?php echo "<b>".$amount."</b>"; ?></span><span class="col-sm-6"><?php echo "<b><del style='color:#57585c'>".$disc."</del></b>"; ?></span></span></div>
      <?php


	 }


	else
	{
		}


}	
	
	

	}
	
	else
	{
		
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
	}
	}
		
	?>
    </div>
    <div class="col-sm-1"></div>
 
<?php
	//$price['amount']= $key->find('p[class=price]',0)->innertext;
	//$amount=html_entity_decode(trim($price['amount']));
	
	//echo $amount."<br>";

	
	//$img['image']= $key->find('img[class=lazy first-image]',0)->getAttribute('data-src');
	//$image=html_entity_decode(trim($img['image']));
	
	//echo $image."</br>";
	
	/* $insert="INSERT INTO fac(Name,Image,Price) VALUES 
	(
	'".$name."',
	'".$image."',
	'".$amount."'

	)";
	mysql_query($insert);*/
	?>
	<div class="clearfix"></div>
<div class="col-sm-1"></div>

<div class="col-sm-10" id="with-out-search">
 <?php 
/*$html->load_file('https://www.pakstyle.pk/search/shoes');

foreach($html->find('div[class=single-product]') as $key)
{
		$out['out']= $key->find('div[class=pro-content text_ac] span  b ',0)->plaintext;
	$stock=html_entity_decode(trim($out['out']));
	//echo $name."<br>";
	
		
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
    
   <div class="col-sm-4 maindiv">

<span class="off"><?php echo ceil($off); ?>%off</span>

<span class="clearfix"></span>
 <img src="<?php echo $image ?>" class="img-thumbnail img-responsive" style="height:250px; width:300px" />
 <span class="clearfix"></span>
 
 <?php echo "<p style='  text-align:center;   overflow: hidden;
    padding: 0px;
    width: 200px;
    height: 20px;'>".$name."</p>"; ?>


 
  <span class="clearfix"></span>
  <span class="col-sm-6">
 <?php echo "<b>".$amount."</b>"; ?>
</span>

 <span class="col-sm-6">
 <?php echo "<b><del style='color:#57585c'>".$disc."</del></b>"; ?>
</span>
 
 </span>

</div>

    
    
    
    
    
    
    
    
    
  
	
	
	
	
	
	<?php*/
	
if($_GET['page']=='puma')
{ include"puma.php";}
elseif($_GET['page']=='affordable')
{ include"afford.php";}
elseif($_GET['page']=='pak')
{ include"pakstyle.php";}
elseif($_GET['page']=='sport')
{ include"sport.php";}
else
{
/*
curl('http://thesportstore.pk/Cricket/Footwear');


		$html->load(curl('http://thesportstore.pk/Cricket/Footwear'));


	
	

foreach($html->find('div[class=product-list-item]') as $key)
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
*/
echo"nothing";

}

?>
</div>

<div class="col-sm-1"></div>
<script>
function hide_with_out_search_divs()
{
	$("#with-out-search").hide(500);
	
	}

</script>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php if(isset($_POST['signup']))
{
	$connect=mysql_connect("localhost","root","");
$db=mysql_select_db("crawler",$connect);
	
 $select="select * from User where Email='".$_POST['email1']."'";
	$pass=mysql_query($select);
	$rows=mysql_fetch_assoc($pass);

	
	if($_POST['email1']== $rows['Email'])
	{
		?>
      <div class="alert alert-danger" >Email already Exist</div>
      <?php
		

	}

 elseif($_POST['password1']=="" || $_POST['repassword']=="")
{
	?>
      <div class="alert alert-warning" >password can't be empty!</div>
      <?php

}

else if($_POST['password1']==$_POST['repassword'])
	{
		
	 $insert="insert into user (Name,Email,Password) values(
	'".$_POST['Name']."',
	'".$_POST['email1']."',
	'".$_POST['password1']."'
	

	)";
	mysql_query($insert);
	 $_SESSION['email']=$_POST['email1'];
  
	



}
else
{
	?>
      <span class="alert alert-danger" style="padding:0px;" >Password not matched!</span>
      <?php

}
}

?>
      <div class="modal-body modal-body-sub_agile">
        <div class="col-md-8 modal_body_left modal_body_left1">
          <h3 class="agileinfo_sign">Sign Up<span>Now</span></h3>
          <form  method="post">
            <div class="styled-input agile-styled-input-top">
              <label>Name</label>
              <input type="text" name="Name" class="form-control" required autofocus="autofocus">
              <span></span></div>
            <div class="styled-input">
              <label>Email</label>
              <input type="email" class="form-control" name="email1" required>
              <span></span></div>
            <div class="styled-input">
              <label>Password</label>
              <input type="password" class="form-control" name="password1" required>
              <span></span></div>
            <div class="styled-input">
              <label>Confirm Password</label>
              <input type="password" class="form-control" name="repassword" required>
              <span></span></div>
            <input type="submit" name="signup" class="btn btn-success" value="Sign Up" style="margin-top:10px;">
          </form>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- //Modal content-->
  </div>
</div>
<div class="modal fade" id="set-alert" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php if(isset($_POST['alerts']))
{
	$connect=mysql_connect("localhost","root","");
$db=mysql_select_db("crawler",$connect);
  $select="select * from user where Email='".$_POST['alert-email']."'";
	$pass=mysql_query($select);
	$rows=mysql_fetch_assoc($pass);

	
	if($_POST['alert-email']!= $rows['Email'])
	{
		?>
      <div class="alert alert-danger" >Email doesn't Exist</div>
      <?php
		

	}

else {
		
	 $insert="insert into alert (Email,Product,Off,Website) values(
	'".$_POST['alert-email']."',
	'".$_POST['alert-product']."',
	'".$_POST['alert-off']."',
	'".$_POST['searchweb']."'
	

	)";
	mysql_query($insert);




}

}

?>
      <div class="modal-body modal-body-sub_agile">
        <div class="col-md-8 modal_body_left modal_body_left1">
          <h3 class="agileinfo_sign">Set Alert<span>Now</span></h3>
          <form  method="post">
            <div class="styled-input">
              <label>Email</label>
              <input type="email" class="form-control" name="alert-email" required>
              <span></span></div>
            <div class="styled-input">
              <label>Product</label>
              <input type="text" class="form-control" name="alert-product" required>
              <span></span></div>
              	  <div class="styled-input">
              	  	<label>Choose Website</label>
<select name="searchweb" class="form-control">
	<option value="sport">thesportstore.pk</option>
	<option value="pakstyle">PakStyle.pk</option>
<option value="affordable">Affordable.pk</option>






</select></div>
              <div class="styled-input">
              <label>Off Percentage</label>
              <input type="number" class="form-control" name="alert-off" required>
              <span></span></div>
            <input type="submit" name="alerts" class="btn btn-success" value="Set Alert" style="margin-top:10px;">
          </form>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- //Modal content-->
  </div>
</div>

</div>
<div class="clearfix"></div>
<?php 
include"head/footer.php";
?></div></div>
<script type="text/javascript">
  /*
function myFunction()
{

  $('#loadpage').show();
}

  $(window).bind("load", function() {
   $('#loadpage').hide();
});
*/
</script>
</body></html>