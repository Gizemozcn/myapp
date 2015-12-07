
<?php
	session_start();


	include "connect.php";


	$ad=mysql_real_escape_string($_POST["firstname"]);
	$soyisim=mysql_real_escape_string($_POST["lastname"]);
	$kullaniciadi=mysql_real_escape_string ($_POST["username"]);
	$sifre=mysql_real_escape_string($_POST["password"]);
	$mail=mysql_real_escape_string($_POST["email"]);
	$gender = mysql_real_escape_string($_POST["sex"]);
	
	
	
	$result1 = mysql_query("SELECT COUNT(*) as `number` FROM `kullanici` WHERE `kullanici_adi` = $kullaniciadi");
	$result2 = mysql_query("SELECT COUNT(*) as `number` FROM `kullanici` WHERE `eposta` = $mail");
	
	if($result1 != 0)
	{
		echo "Bu kullanici adı daha önceden kullanılmıştır.";
	}
	
	if($result2 != 0)
	{
		echo "Bu email adresi daha önceden kullanılmıştır.";
	}	
	
	if($result1 == 0 && $result2 == 0)
	{
		$result = mysql_query("INSERT INTO `kullanici` (`kullanici_adi`, `parola`, `eposta`, `tarih`,`yetki`, `ad`, `soyad`, `gender`) values('$kullaniciadi','$sifre','$mail','getdate()','0','$ad','$soyisim','$gender')") or die(mysql_error());
	}
	if($result)
	{
		$_SESSION["kayit"] = "true";
		header('location: login.php');
		exit();
	}
	
	else
	{
		echo "Kayıt esnasında bir sorun oluştu! Lütfen tekrar deneyiniz";
	}
?>