<?php 

$xmldata = 'https://api.twitter.com/1/statuses/user_timeline/dcmrtest.xml';
$open = fopen($xmldata, 'r');
$content = stream_get_contents($open);
fclose($open);
$xml = new SimpleXMLElement($content);



?>
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:400px;
	height:29px;
	z-index:1;
	left: 103px;
	top: 123px;
}
#apDiv2 {
	position:absolute;
	width:403px;
	height:32px;
	z-index:1;
	left: 103px;
	top: 122px;
}
#apDiv3 {
	position:absolute;
	width:403px;
	height:35px;
	z-index:2;
	left: 103px;
	top: 156px;
}
#apDiv4 {
	position:absolute;
	width:402px;
	height:31px;
	z-index:3;
	left: 103px;
	top: 193px;
}
#apDiv5 {
	position:absolute;
	width:404px;
	height:35px;
	z-index:4;
	left: 101px;
	top: 280px;
}
#apDiv6 {
	position:absolute;
	width:403px;
	height:31px;
	z-index:5;
	left: 101px;
	top: 316px;
}
#apDiv7 {
	position:absolute;
	width:403px;
	height:32px;
	z-index:6;
	left: 102px;
	top: 349px;
}
</style>



<div style="background-image:url(images/demo/ddddd.jpg);padding:5px;width:600px;height:600px;border:1px solid black;background-repeat:no-repeat;">

</div>


<div id="apDiv2"><?php echo $xml->status[0]->user->name; ?></div>
<div id="apDiv3"><?php echo $xml->status[0]->text; ?></div>
<div id="apDiv4"><?php echo $xml->status[0]->created_at; ?></div>
<div id="apDiv5"><?php echo $xml->status[1]->user->name; ?></div>
<div id="apDiv6"><?php echo $xml->status[1]->text; ?></div>
<div id="apDiv7"><?php echo $xml->status[1]->created_at; ?></div>
