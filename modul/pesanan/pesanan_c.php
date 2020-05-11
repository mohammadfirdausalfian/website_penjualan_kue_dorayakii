<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/pesanan/aksi_pesanan_c.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	$tampil=mysqli_query($conn, "select * from pesan_online order by kode_pesan desc");
	echo"<h3 class='head'><span class='glyphicon glyphicon-inbox'></span> Pesanan Masuk</h3>
	";
?>
	<table class="table table-hover">
		<thead>
				<th>Nama Pemesan</th>
				<th>Alamat Pemesan</th>
				<th>Telepon Pemesan</th>
				<th>Jumlah Pesanan</th>
				<th>Total Biaya</th>
				<th>Status</th>
				<th>Aksi</th>
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
			<td>$r[banyak_pesan] Porsi</td>
			<td><span class='btn btn-success'>Rp. $r[total_biaya]</td>
			<td><span class='btn btn-info'>$r[status]</td>
			<td id='edit'><center><a href='?dorayaki=pesanan&act=edit&kode=$r[kode_pesan]'><span class='glyphicon glyphicon-pencil'>&nbsp;</a></td></td>
		
		</tr>
	";
	}					
	break;
	case "edit":
	$baca=mysqli_query($conn, "select * from pesan_online where kode_pesan='$_GET[kode]'");
	$r=mysqli_fetch_array($baca);
	echo"<h2 class='head'>Pesanan Masuk</h2>
	<table border='1'>
	<Form method='POST' action='$aksi?dorayaki=pesanan&act=edit'>
	<input type='hidden' name='kode_pesan' value='$r[kode_pesan]' size='15'>
	<input type='hidden' name='banyak' value='$r[banyak_pesan]' size='15'>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='barang'>Status Pesanan</label>
			<select class='form-control m-bot15' name='status'>
			";
				if($r['status']=='Proses'){
				?>
					<option value="Proses">Proses</option>
					<option value="Gagal">Gagal</option>
					<option value="Terkirim">Terkirim</option>
				<?php
				}else{
				?>
					<option value="Proses">Proses</option>
					<option value="Gagal">Gagal</option>
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