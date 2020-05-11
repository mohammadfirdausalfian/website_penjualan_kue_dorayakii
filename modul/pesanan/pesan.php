<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/pesanan/aksi_pesan.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	echo"<h3 class='head'><span class='glyphicon glyphicon-shopping-cart'> Tambah Pesanan Anda</h3><br>
	<form method='POST' action='$aksi?dorayaki=pesan&act=input'>
		<div class='form-group'>
			<div class='col-sm-5'>
				<label for='nama'>Nama </label>
				<input type='text' class='form-control placeholder='nama' name='nama' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-7' style='margin-bottom:20px;'>
				<label for='alamat'>Alamat</label>
				<textarea name='alamat' class='form-control' required></textarea>
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-4'>
			<label for='telepon'>Nomor Telepon </label>
			<input type='text' class='form-control placeholder='nomor telp' name='telepon' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-3'>
				<label for='telepon'>Banyak Pesanan </label>
				<input type='text' class='form-control placeholder='Set' name='banyak' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5'>
				<label for='telepon'>* Harga 1 Buah Dorayaki : Rp. 7.000 </label>
			</div>
		</div>
		<div class='col-sm-12' style='margin-top:20px;'>
		<button type='submit' class='btn btn-info'>Pesan</button>
		</div>
	</form>";
	
	break;
	}
}	
?>	