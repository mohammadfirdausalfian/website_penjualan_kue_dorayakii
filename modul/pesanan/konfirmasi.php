<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/pesanan/aksi_pesanan.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	$tampil=mysqli_query($conn, "select * from pesan_online");
	echo"<h3 class='head'><span class='glyphicon glyphicon-list-alt'> Data Pemesan</h3>
	<input type=button class='btn btn-info col-md-2' value='+ Tambah Pesanan' onclick=\"window.location.href='?dorayaki=pesan&act=input';\"><br><br>
	";
?>
	<table id="tabel1" class="table table-bordered">
		<thead>
			<tr bgcolor="#fff">
				<th>Nama Pemesan</th>
				<th>Alamat Pemesan</th>
				<th>Telepon Pemesan</th>
				<th>Jumlah Pesanan</th>
				<th>Total Biaya</th>
				<th>Staus</th>
			</tr>
		</thead>
		<tbody>
<?php
	while($r = mysqli_fetch_array($tampil)){
	echo"
		<tr>
			<td>$r[nama_pemesan]</td>
			<td>$r[alamat_pemesan]</td>
			<td>$r[telp_pemesan]</td>
			<td>$r[banyak_pesan]</td>
			<td>$r[total_biaya]</td>
			<td><span class='btn btn-info'>$r[status]</td>
		</tr>
	";
	}					
	break;
	
	case "input":
	echo"<h2 class='head'>Tambah Pesanan</h2>
	<form method='POST' action='$aksi?dorayaki=pesan&act=input'>
	</form>";
	
	break;
	
	case "edit":
	
	break;
	case "hapus":
	
	break;
	}
}	
?>	