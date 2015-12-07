<html>
<head>
<?php
   include( "head.php" );
	
  ?>  
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>

<body>
<div id="wrapper">
<?php
   include( "header.php" );
   
  ?>  








<div id="page-wrapper" style="min-height: 426px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ürün/Kategori/ekle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Kategori ekleme paneli
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <?php 
								$id=$_GET["Id"];
								$sorgu=mysql_query("select * from kategori where Id ='". $id ."' "); 
								while($kayit=mysql_fetch_array($sorgu)){
								?>
                                    <form action="kat_ekle_islem.php"  method="post" onSubmit="return false;">
                                        
                                        <input type="hidden" name="id" value="<?php echo $kayit["Id"];  ?>">
                                        <div class="form-group">
                                            <label>Kategori Adı :</label>
                                            <input class="form-control" name="ad" value="<?php echo $kayit["ad"];  ?>">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label>Kategori hakkında :</label>
                                            <textarea class="form-control" rows="3" name="detay" ><?php echo $kayit["detay"];  ?></textarea>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        <button type="submit" class="btn btn-default" onClick="guncelle()">guncelle</button>
                                        <button type="reset" class="btn btn-default">Temizle</button>
                                    </form>
                                    <?php }?>
                                </div>
                                
                                
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        
        <script type='text/javascript'>
        	function guncelle()
			{
				var ad = $("input[name=ad]").val();
				var id = $("input[name=id]").val();
				var detay = $("textarea[name=detay]").val();
				/*var get = "success.php?ad="+ad+"&detay="+detay;*/
				$.ajax(
				{
					type:"POST",
					url:"kat_islem.php",
					data:{ad  : ad , detay : detay ,id : id , islem:2},
					success: function(sonuc)
					{
						if(sonuc == 1)
						{
							
							window.location = "kategoriler.php";	//alert("Kategori ekleme işlemi başarı ile gerçekleştirildi");
						}
						else
						{
							alert("Kategori Güncelleme sırasında bir hata oluştu");
						}
					}
				});
			};
        </script>
        
          
  <?php
   include( "footer.php" );
  ?>  
</div>
</body>
</html>