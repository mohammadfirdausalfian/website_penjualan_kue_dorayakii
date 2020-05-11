<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/pesanan/aksi_pesanan_m.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	$tampil=mysqli_query($conn, "select * from pesan_barang order by tgl_pesan desc");
	echo"<h3 class='head'><span class='glyphicon glyphicon-inbox'></span> Pesanan Masuk</h3>
	";
?>
	<table id="tabel1" class="table table-bordered">
		<thead>
				<th>Nama Barang</th>
				<th>Tanggal Pesanan</th>
				<th>Jumlah Pesanan</th>
				<th>Tanggal Diterima</th>
				<th>Status Barang</th>
				<th>Status Pengiriman</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
<?php
	while($r = mysqli_fetch_array($tampil)){
	echo"
		<tr>
			<td>$r[nama_barang]</td>
			<td>$r[tgl_pesan]</td>
			<td>$r[banyak_barang]</td>
			<td>$r[tgl_terima]</td>
			<td><span class='btn btn-info'>$r[status_barang]</td>
			<td><span class='btn btn-success'>$r[status_pengiriman]</td>
			<td id='edit'><center><a href='?dorayaki=pesanan&act=edit&kode=$r[kode_pesan_barang]'><span class='glyphicon glyphicon-pencil'>&nbsp;</a></td></td>
		
		</tr>
	";
	}					
	break;
	case "edit":
	$baca=mysqli_query($conn, "select * from pesan_barang where kode_pesan_barang='$_GET[kode]'");
	$r=mysqli_fetch_array($baca);
	echo"<h2 class='head'>Pesanan Masuk</h2>
	<table border='1'>
	<Form method='POST' action='$aksi?dorayaki=pesanan&act=edit'>
	<input type='hidden' name='kode_pesan_barang' value='$r[kode_pesan_barang]' size='15'>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='barang'>Status Barang</label>
			<select class='form-control m-bot15' name='status_b'>
			";
				if($r['status_barang']=='Tersedia'){
				?>
					<option value="Tersedia">Tersedia</option>
					<option value="Tidak Tersedia">Tidak Tersedia</option>
				<?php
				}else{
				?>
					<option value="Tidak Tersedia">Tidak Tersedia</option>
					<option value="Tersedia">Tersedia</option>
				<?php
				}
			echo "
			</select>
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='pengiriman'>Status Pengiriman</label>
			<select class='form-control m-bot15' name='status_p'>
			";
				if($r['status_pengiriman']=='Terkirim'){
				?>
					<option value="Terkirim">Terkirim</option>
					<option value="Proses">Proses</option>
					<option value="Gagal">Gagal</option>
				<?php
				}else if($r['status_pengiriman']=='Proses'){
				?>
					<option value="Proses">Proses</option>
					<option value="Terkirim">Terkirim</option>
					<option value="Gagal">Gagal</option>
				<?php
				}else{
				?>
					<option value="Gagal">Gagal</option>
					<option value="Proses">Proses</option>
					<option value="Terkirim">Terkirim</option>
				<?php
				}
			echo "
			</select>
			</div>
		</div>";
	echo"
		<div class='col-sm-12' style='margin-top:20px;'>
		<button type='submit' class='btn btn-success'>Update </button>&nbsp;
		<input type=button value=Cancel class='btn btn-warning' onclick=self.history.back()>
		</div>
	</form>
	</table>";
	
	break;
	}
}	
?>	