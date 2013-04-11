<?php

include 'database.php';//je gebruikt database php bestand

if( $_POST['klacht'] == ""){ //naam dropdown menu
	echo "Er is geen klacht ingediend";
	$klacht = "";//klacht gedefinieerd
}
else{
    $klacht = $_POST['klacht'];//klacht gedefinieerd met waarde
}
echo $klacht;//print klacht

/*
String array[30] = new array;

$var1 = array ("rotzooi","vies","vervuiling","olie","rivier","sloot","afval","container","bodem","schepen","boot","prullenbak");
$var2 = array("lawaai","harde","muziek","geluid","vliegtuig","claxon","speakers","boxen","alarm","sirene","buren","horeca","feest","feestje","bouw","verbouwing");
$var3 = array("stank","stinkt","lucht","geur","gas","gassen","rook","ruik","mest","schimmel","zuur","chemisch","roet","gezondheid","ademenen");
*/

$var1= "rotzooi";
$var2= "lawaai";
$var3= "stank";

echo '<br>';
echo '<br>';

//vervuiling = 1;
//geluid = 2;
//stank = 3;

if(strpos($klacht,$var1) !== false) {	
$Soortklacht = "vervuiling";
}
else if (strpos($klacht,$var2) !== false){
$Soortklacht = "lawaai";
}
else if (strpos($klacht,$var3) !== false){
$Soortklacht = "stank";
}
else if ($klacht != $var1,$var2,$var3,$var4){//als het geen van de woorden in de lijst bevat dan is de Soort klacht overig.
$Soortklacht = "overig";
}


mysql_query("INSERT klachten2 (Soortklacht, omschrijving, behandeld) VALUES('$Soortklacht', '$klacht','0')") or die(mysql_error());//insert moet bij values zelfde volgorde hebben

$result = mysql_query("SELECT * FROM klachten WHERE type = '2'") or die(mysql_error());//beginn informatie opvragen van db

echo '<br>';
echo '<br>';
echo '<br>';
/*
echo "<table border='1'>";
echo "<tr><th>ID</th> <th>Type</th> <th>Behandeld</th> <th>Omschrijving</th></tr>";

while($row = mysql_fetch_array( $result )) {
echo "<tr><td>";
echo $row['ID'];
echo "</td><td>";
echo $row['Type'];
echo "</td><td>";
echo $row['Behandeld'];
echo "</td><td>";
echo $row['Omschrijving'];
echo "</td></tr>";
}//eind informatie opvragen van db
*/










?>