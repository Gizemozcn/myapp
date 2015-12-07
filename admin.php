<?php


session_start();
ob_start();

?>

<a href="admin.php?islem=onaybekleyen">Onay Bekleyen Yorumlar</a>
<a href="admin.php?islem=onaylanan">Onaylanmış Yorumlar</a>


 <?php include("connect.php"); ?>
                      <?php
			
switch(@$_GET["islem"]){
	case "onaybekleyen":
				?>
   <div>
                      <table align='center' border='0' width="400px">
                          <tr>
                      <td align="left"><?php
	$query=mysql_query("select * from yorumlar where onay='0'");
		while($row=mysql_fetch_array($query)){
		$id=$row["y_id"];
		$ekleyen=$row["ekleyen"];
		$yorum=$row["yorum"];
		$email=$row["email"];
		$tarih=$row["tarih"];
				echo"<div>
		<table>
			<tr>
	<td width='200'><font color='red'><b>Ad-Soyad</b></font></td><td class='a'><font color='red'><b>Email</b></font></td></tr>
	<tr><td width='200'><font color='0099FF'><b>$ekleyen</b></font></td><td class='a'><font color='0099FF'>$email</b></font></td></tr>
	<tr><td width='200'>$tarih</td></tr>
	<tr><td width='450' colspan='2'>$yorum</td><td></td></tr>
						
												<tr>
		<td width='150'><br /><a href='admin.php?islem=onaylaislem&id=$id'><img src='images/onay.png' alt='onayla' title='onayla' height='100'  width='100' /></a></td>		<td><br /><a href='admin.php?islem=silislem&id=$id'><img src='images/sil.png' alt='sil' title='sil' height='100'  width='100'/></a></td>
<td></td>			</tr>
		</table>
		</div> <hr />";
					
			}			?></td>
                        </tr>
                      </table>
                      </div>
                    <?php
				break;
				case "onaylanan":
				?>
                      <div>
                        <table align='center' border='0' width="850px">
                          <tr>
                            <td align="center"><?php
$query=mysql_query("select * from yorumlar where onay='1' order by y_id desc");
while($row=mysql_fetch_array($query)){
					
		$ekleyen=$row["ekleyen"];
		$yorum=$row["yorum"];
		$email=$row["email"];
		$tarih=$row["tarih"];
		echo"<div>
		<table>
			<tr><td width='350'><font color='red'><b>Ad-Soyad</b></font></td><td class='a'><font color='red'><b>Email</b></font></td></tr>
		<tr><td width='450'><font color='0099FF'><b>$ekleyen</b></font></td><td class='a'><font color='0099FF'>$email</b></font></td></tr>
			<tr><td width='450'>$tarih</td></tr>
			<tr><td width='450' colspan='2'>$yorum</td><td></td></tr>
			</table>
	</div> <br /> <br />";
					
		}
		?></td>
                          </tr>
                        </table>
                      </div>
                      <?php
				break;
				case "onaylaislem":
	$id=$_GET["id"];
	$query=mysql_query("update yorumlar set onay='1' where y_id='$id'");
	if($query){header("Location:admin.php?islem=onaybekleyen");}else{echo"onaylama İşleminde hata oluştu";}
				break;
				case "silislem":
	$id=$_GET["id"];
	$query=mysql_query("delete from yorumlar where y_id='$id'");
	if($query){header("Location:admin.php?islem=onaybekleyen");}else{echo"Silme İşleminde hata oluştu";}
	break;
		case "cikis":
		session_destroy();
		header("Location:admin.php");
	break;
	default:
	?>
                      <div>
           <table align='center' border='0' width="700px">
                          <tr>
                            <td align="center">&nbsp;</td>
                          </tr>
                        </table>
                      </div>
                      <?php
				break;
			}
		
	?>


<?php 
mysql_close();
ob_end_flush();	
?>