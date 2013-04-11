<?php

$DB_Host = "localhost";//website invullen
$DB_User = "root";//laten staan
$DB_Pass = "";//wachtwoord db


$dbcon = mysql_connect($DB_Host, $DB_User, $DB_Pass)
or die ('Fout Connectie DB');//foutmelding

mysql_select_db("dcmr") or die(mysql_error());//database naam
?>