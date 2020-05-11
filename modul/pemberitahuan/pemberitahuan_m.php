<h3 class='head'><span class='glyphicon glyphicon-inbox'></span> Informasi</h3><br>
<?php 
$periksa=mysqli_query($conn,"select * from barang where stok_barang <=500");
while($q=mysqli_fetch_array($periksa)){	
	if($q['stok_barang']<=500){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama_barang']."</a> yang tersisa sudah kurang dari 500 . silahkan pesan lagi ke supplier !!</div>";	
	}
}
?>