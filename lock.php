<?php
include "connect.php";
		$kullanici_adi = $_SESSION['user'];
		
		$result = mysql_query("select * from kullanici where kullanici_adi = '".$kullanici_adi."'") or die(mysql_error());
		$count = mysql_num_rows($result);
	
		if($count == 0)
		{
			header('location: login.php');
		}
	
	
?>