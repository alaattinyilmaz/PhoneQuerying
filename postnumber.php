<?php

include "config.php";

$postnumber = $_POST["number"];

$badchars = array("+","(",")","-"," ");
$deletechars = array("","","","","");

$number = str_replace($badchars,$deletechars,$postnumber);


if(strlen($number) < 7 || strlen($number) > 12 || !is_numeric($number))
{
	echo "Invalid number.";
	
}

else {
	

	$querynumber = substr($number, -10);
	
	$search_query=mysql_query("select * from contacts where number like '%$querynumber' GROUP BY contact ORDER by count DESC");
	
	
		if (mysql_num_rows($search_query)>0){
				
				$result = mysql_fetch_array($search_query);
				
				echo "Most Recorded: ";
				echo $result[contact]."<br>";
				echo "Saved on ".$result[count]." contacts<br>";
				
				
		while($result = mysql_fetch_array($search_query))
		{	
			echo $result[contact]."<br>";
			echo "Saved on ".$result[count]." contacts<br>";
			
			
		}
		
		}
		
		else
		{
			echo 'Nothing found.';
		}
	
}




?>
