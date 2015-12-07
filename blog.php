
<html>
<head>
	<meta charset="UTF-8">
	<title>Food &amp; Recipes Web Template</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<div>
			<a href="home.html"><img src="images/logo.png" alt="Logo"></a>
		</div>
		<form action="home.html">
			<input type="text" value="Search from our Recipes around the world" id="search">
			<input type="submit" value="" id="searchbtn">
		</form>
	</div>
	<div class="body">
		<div>
			<div class="header">
				<ul>
					<li >
						<a href="home.html">Home</a>
					</li>
					<li>
						<a href="recipes.html">A to Z Recipes</a>
					</li>
					<li  class="current">
						<a href="blog.php">Blog</a>
					</li>
					<li>
						<a href="videos.html">Videos</a>
					</li>
					<li>
						<a href="about.html">About</a>
					</li>
					<li>
						<a href="login.php">Login</a>
					</li>
				</ul>
			</div>








<?php
		include "connect.php";
		
		$query=mysql_query("Select * from yorumlar where onay='1' order by y_id desc");
		if(mysql_affected_rows()){
			while($row=mysql_fetch_array($query)){
$ekleyen=$row["ekleyen"];
$yorum=$row["yorum"];
$email=$row["email"];
$tarih=$row["tarih"];
echo"<div>
					<table>
						<tr>
<td width='350'><font color='red'><b>Ad-Soyad</b></font></td><td class='a'><font color='red'><b>Email</b></font></td></tr>
<tr><td width='450'><font color='0099FF'><b>$ekleyen</b></font></td><td class='a'><font color='0099FF'>$email</b></font></td></tr>
<tr><td width='450'>$tarih</td></tr>
<tr><td width='450' colspan='2'>$yorum</td><td></td></tr>
						</table>
				</div>";
			}
		}else{
echo "<div class='uyari' align='center'>Hiç Yorum Eklenmemiş</div>" ;
		}
	?></p>
              <p><form action="" method="post">
			<table>
				<tr>
		<td>Ekleyen</td>
	<td><input type="text" name="ekleyen" class="text"/></td>
				</tr>
				<tr>
		<td>E-Mail</td>
		<td><input type="text" class="text" name="email" /></td>
				</tr>
				<tr>
		<td>Yorumunuz</td>
		<td><textarea name="yorum" cols="78" rows="10"></textarea></td>
				</tr>
				<tr>
		<td><input type="submit" class="button" value="Yorumu Ekle" /></td>
				</tr>
			</table>
	</form>
	
	          <p>
	            <?php
			include "connect.php";
			
			if($_POST){
			
			$ekleyen=$_POST["ekleyen"];
			$email=$_POST["email"];
			$yorum=mysql_real_escape_string($_POST["yorum"]);
				
	if(!$ekleyen|| !$email ||!$yorum){
echo "<div class='uyari'align='center' style='color:red'>Tüm Alanları Eksiksiz Doldurunuz !</div>";
				
				}else{
				
	$query=mysql_query("INSERT INTO yorumlar
					(ekleyen,email,yorum,onay)values('$ekleyen','$email','$yorum','0')
				");
	if($query){
	echo "<div class='uyari'align='center'>Yorum Başarıyla Eklendi. Admin Onay Sürecindedir <a href='home.html'>Geri Dön</a></div>";
		}else{
	echo "<div class='uyari'align='center'>Yorum Eklenirken Bir Sorun Oluştu !</div>";
				}
				
				}
			}
	?>
	</div>
	</body>
</html>