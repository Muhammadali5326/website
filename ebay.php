<link rel="stylesheet" href="bootstrap.css">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
<?php
//error_reporting(0);
include"simple_html_dom.php";

$html=new simple_html_dom();
	 $html->load_file('https://www.ebay.com/sch/i.html?_odkw=watches&_oac=1&_osacat=0&_from=R40&_trksid=m570.l1313&_nkw=watches&_sacat=0');

foreach($html->find('li[class=sresult gvresult]') as $key)
{
		
/*$item['name']= $key->find('h3 a ',0)->innertext;
	$name=html_entity_decode(trim($item['name']));
		//echo $name."<br>";


	$price['price']= $key->find('div[class=bin] span[class=bold] ',0)->plaintext;
	$prices=html_entity_decode(trim($price['price']));
	//echo $prices."<br>";

	$off['off']= $key->find('span[class=stk-thr] ',0)->plaintext;
	$offprice=html_entity_decode(trim($off['off']));
	//echo $offprice."<br>";
	
$watching['watching']= $key->find('div[class=hotness-signal red] ',0)->plaintext;
	$online=html_entity_decode(trim($watching['watching']));
	//echo $online."<br>";
*/
	$imgurl['imgurl']= $key->find('img',0)->getAttribute('imgurl');

	$imageurl=html_entity_decode(trim($imgurl['imgurl']));
	//echo $imageurl."<br>";

	$imgsrc['imgsrc']= $key->find('img',0)->getAttribute('src');

	$imagesrc=html_entity_decode(trim($imgsrc['imgsrc']));
	//echo $imagesrc."__________<br>";
	if($imageurl)
	{
	$image=$imageurl."___";
}
elseif($imagesrc)
{
$image=$imagesrc;;

}
echo $image.'<br>';

/*
?>


     <div class="col-sm-4 maindiv"><span class="off" style="color: red"><?php echo  
      $offprice; ?>%off</span><span class="clearfix"></span><img src="<?php echo $image ?>" class="img-thumbnail img-responsive" style="height:250px; width:300px" /><span class="clearfix"></span><?php echo "<p style='  text-align:center;   overflow: hidden;
    padding: 0px;
    width: 200px;
    height: 20px;'>".$name."</p>"; ?><span class="clearfix"></span><span class="col-sm-12"><?php echo "<b>".$prices."</b>"; ?></span></span></div>
      <?php
*/






	}

//cho count($count);
	?>
	</div></div></div>