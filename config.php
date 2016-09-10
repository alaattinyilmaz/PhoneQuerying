<?php

mysql_connect("localhost","root","aloscuk1") or die("Not connected");

mysql_select_db("cia") or die("Not connected");

mysql_query("SET NAMES 'utf8'"); 
mysql_query("SET CHARACTER SET utf8"); 
mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");  


?>
