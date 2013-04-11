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

$var1 = "rotzooi";
$var2 = "lawaai";
$var3 = "stinkt";

echo '<br>';
echo '<br>';

//vervuiling = 1;
//geluid = 2;
//stank = 3;

if(strpos($klacht,$var1) !== false) {	
$type = 1;
}
else if (strpos($klacht,$var2) !== false){
$type = 2;
}
else if (strpos($klacht,$var3) !== false){
$type = 3;
}


mysql_query("INSERT klachten (type, behandeld, omschrijving) VALUES('$type', '0', '$klacht')") or die(mysql_error());//insert moet bij values zelfde volgorde hebben

$result = mysql_query("SELECT * FROM klachten WHERE type = '2'") or die(mysql_error());//beginn informatie opvragen van db

echo '<br>';
echo '<br>';
echo '<br>';

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













?>