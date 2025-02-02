<?php
session_start();
	include "connect.php";

?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Blog - Food &amp; Recipes Web Template</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<div>
			<a href="home.html"><img src="images/logo.png" alt="Logo"></a>
		</div>
		<form action="home.html">
			<input type="text" value="Search from our 10,000+ Recipes around the world" id="search">
			<input type="submit" value="" id="searchbtn">
		</form>
	</div>
	<div class="body">
		<div>
			<div class="header">
				<ul>
					<li>
						<a href="home.html">Home</a>
					</li>
					<li>
						<a href="recipes.html">A to Z Recipes</a>
					</li>
					<li>
						<a href="featured.html">Featured Recipes</a>
					</li>
					<li>
						<a href="videos.html">Videos</a>
					</li>
					<li>
						<a href="about.html">About</a>
					</li>
					<li class="current">
						<a href="üyegirisi.php">LOGIN</a>
					</li>
				</ul>
			</div>
			<div class="body">
				<div id="content">
					<div>
						<?php
	if(isset($_SESSION["kayit"]))
	{
		if($_SESSION["kayit"]	== "true")
		{
			echo "Kayıt başarıyla gerçekleştirilmiştir. Giriş yapabilirsiniz.";
			unset($_SESSION["kayit"]);
		}
	}
	
	if(isset($_SESSION["dosya"]))
	{
	if($_SESSION["dosya"]	== "true")
		{
			echo "<td><p align=\"center\"><font color=\"orange\"><b><i>!!! YORUM YAZABİLMEK İÇİN LÜTFEN GİRİŞ YAPINIZ EĞER ÜYE DEĞİLSENİZ ÜYE OLMAK İSTİYORUM BUTONUNA BASINIZ !!!.</i></b></font></p></td>";
			
			unset($_SESSION["dosya"]);
		}
	}
	
?>
<form align="center" method = "post" action = "login.php">
<p><b>KULLANICI ADI : </b><input type="text"  name="ad"  />    </p>

<p><b> ŞİFRE : </b><input  style="margin-left:80px; " type="password" name="sifre" />     </p>

<p> <input class="buton" type="submit" style="margin-left:145px; " value="Giriş"  />   </p>

<a href="uyeol.php">ÜYE OLMAK İSTİYORUM </a>

 </form> 
 
 <?php
 
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$kullaniciadi = mysql_real_escape_string($_POST['ad']);
		$sifre = mysql_real_escape_string($_POST['sifre']);

		$result = mysql_query("select `kullanici_adi` from `kullanici` where `kullanici_adi`= '".$kullaniciadi."' and `parola`='".$sifre."'") OR	 die(mysql_error());
		$row = mysql_fetch_row($result);
		if($row[0] != $kullaniciadi)
		{
			echo "kullanici adı veya şifre yanlış";
		}
		else
		{			
			$_SESSION['user'] = $kullaniciadi;
			header('location: home.html');
			exit();
		}	
	}
 
 
 ?>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div>
				<h3>Cooking Video</h3>
				<a href="videos.html"><img src="images/cooking-video.png" alt="Image"></a>
				<span>Vegetable &amp; Rice Topping</span>
			</div>
			<div>
				<h3>Featured Recipes</h3>
				<ul id="featured">
					<li>
						<a href="recipes.html"><img src="images/sandwich.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.html">Ham Sandwich</a></h2>
							<span>by: Anna</span>
						</div>
					</li>
					<li>
						<a href="recipes.html"><img src="images/biscuit-and-coffee.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.html">Biscuit &amp; Sandwich</a></h2>
							<span>by: Sarah</span>
						</div>
					</li>
					<li>
						<a href="recipes.html"><img src="images/pizza.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.html">Delicious Pizza</a></h2>
							<span>by: Rico</span>
						</div>
					</li>
				</ul>
			</div>
			<div>
				<h3>Blog</h3>
				<ul id="blog">
					<li>
						<a href="blog.html">This is just a place holder, so you can see what the site would look like.</a>
						<span class="date">Jan 9, by Liza</span>
					</li>
					<li>
						<a href="blog.html">This is just a place holder, so you can see what the site would look like.</a>
						<span class="date">Feb 16, by Myk</span>
					</li>
					<li>
						<a href="blog.html">This is just a place holder, so you can see what the site would look like.</a>
						<span class="date">March 15, by Xaxan</span>
					</li>
				</ul>
			</div>
			<div>
				<h3>Get Updates</h3>
				<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" id="facebook">Facebook</a>
				<a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" id="twitter">Twitter</a>
				<a href="http://freewebsitetemplates.com/go/youtube/" target="_blank" id="youtube">Youtube</a>
				<a href="http://freewebsitetemplates.com/go/flickr/" target="_blank" id="flickr">Flickr</a>
				<a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" id="googleplus">Google&#43;</a>
			</div>
		</div>
	</div>
	<div class="footer">
		<div>
			<p>
				&copy; Copyright 2012. All rights reserved
			</p>
		</div>
	</div>
</body>
</html>