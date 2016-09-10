<?php

include "config.php";

$postnumber = $_POST["number"];
$name = $_POST["name"];

$badchars = array("+","(",")","-"," ");
$deletechars = array("","","","","");

$number = str_replace($badchars,$deletechars,$postnumber);


if(strlen($number) < 7 || strlen($number) > 12 || !is_numeric($number) || strlen($name)>40)
{
	echo "Invalid number or name";
	
}

else {
	
		$querynumber = substr($number, -10);

		$check_query=mysql_query("select * from contacts where number like '%$querynumber' and contact = '$name'");

		if (mysql_num_rows($check_query)>0)
		{
			$catchcount = mysql_fetch_array($check_query);
			
			$count = $catchcount[count];
			$count++;
			
			$changecount = mysql_query("UPDATE contacts SET count='$count' WHERE number like '%$querynumber' and contact = '$name'");

		
		}

	else { $record_query = mysql_query("INSERT into `contacts` (number,contact) VALUES ('$number','$name')"); }
	
	echo "Your number has been recorded.";
	
}




?>
