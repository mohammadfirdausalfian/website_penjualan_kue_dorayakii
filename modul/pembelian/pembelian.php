<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/pembelian/aksi_pembelian.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	$tampil = mysqli_query($conn, "SELECT * from pesan_barang order by tgl_pesan desc");
	echo"<h3 class='head'><span class='glyphicon glyphicon-shopping-cart'></span> Pemesanan Barang</h3>
	<input type=button class='btn btn-info col-md-2' value='+ Tambah Pembelian' onclick=\"window.location.href='?dorayaki=pembelian&act=input';\"><br><br>
	";
?>
	<table class="table table-hover">
		<thead>

				<th>Nama Barang</th>
				<th>Tanggal Pembelian</th>
				<th>Jumlah Pembelian</th>
				<th>Tanggal Diterima</th>
				<th>Status Barang</th>
				<th>Status Pengiriman</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
<?php
	while($r = mysqli_fetch_array ($tampil)){
	echo"
		<tr>
			<td>$r[nama_barang]</td>
			<td>$r[tgl_pesan]</td>
			<td>$r[banyak_barang]</td>
			<td>$r[tgl_terima]</td>
			<td><span class='btn btn-info'>$r[status_barang]</td>
			<td><span class='btn btn-success'>$r[status_pengiriman]</td>
			<td id='edit'><center><a href='?dorayaki=pembelian&act=edit&kode=$r[kode_pesan_barang]'><span class='glyphicon glyphicon-pencil'>&nbsp;</a></td></td>
		
		</tr>
	";
	}					
	break;
	
	case "input":
	echo"<h2 class='head'>Pemesanan Barang</h2>
	<form method='POST' action='$aksi?dorayaki=pembelian&act=input'>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='name'>Nama Supplier</label>
			<select class='form-control m-bot15' name='nama_s'>
			";
				$query = mysqli_query($conn,"SELECT * FROM supplier");
                while ($d = mysqli_fetch_array($query)) {
                ?>      
                    <option value="<?php echo $d['supplier_nama'];?>"><?php echo $d['supplier_nama'] ?></option>
				<?php
				}
			echo "
			</select>
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='name'>Nama Barang</label>
			<select class='form-control m-bot15' name='nama_b'>
			";
				$query = mysqli_query($conn,"SELECT * FROM barang");
                while ($d = mysqli_fetch_array($query)) {
                ?>      
                    <option value="<?php echo $d['nama_barang'];?>"><?php echo $d['nama_barang'] ?></option>
				<?php
				}
			echo "
			</select>
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5' style='margin-top:20px;margin-bottom:20px;'>
			<label for='email'>Jumlah Barang</label>
			<input type='text' class='form-control' id='stok' placeholder='Jumlah' name='banyak' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5' style='margin-top:20px;margin-bottom:20px;'>
			<label for='email'>Tanggal Pembelian</label>
			<input type='date' class='form-control' id='rop' placeholder='Tanggal Pembelian' name='tgl_p' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5' style='margin-bottom:20px;'>
			<label for='email'>Tanggal Terima *</label>
			<input type='date' class='form-control' id='rop' placeholder='Tanggal Terima' name='tgl_t' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5' style='margin-bottom:20px;'>
			<label for='email'>* Tanggal Terima = Max 4 hari setelah pembelian</label>
			</div>
		</div>
		<div class='col-sm-12'>
		<button type='submit' class='btn btn-info'>Save</button>
		<input type=button value=Cancel class='btn btn-danger' onclick=self.history.back()>
		</div>

	</form>";
	
	break;
	
	case "edit":
	$baca=mysqli_query($conn, "SELECT * from pesan_barang where kode_pesan_barang='$_GET[kode]'");
	$r=mysqli_fetch_array($baca);
	echo"<h2 class='head'>Pemesanan Barang</h2>
	<table border='1'>
	<Form method='POST' action='$aksi?dorayaki=pembelian&act=edit'>
	<input type='hidden' name='kode_pesan_barang' value='$r[kode_pesan_barang]' size='15'>
	<input type='hidden' name='banyak_barang' value='$r[banyak_barang]' size='15'>	
	<input type='hidden' name='nama_barang' value='$r[nama_barang]' size='15'>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='pengiriman'>Status Pengiriman</label>
			<select class='form-control m-bot15' name='status_p'>
			";
				if($r['status_pengiriman']=='Terkirim'){
				?>
					<option value="Diterima">Diterima</option>
					<option value="Tidak Diterima">Tidak Diterima</option>
				<?php
				}else if($r['status_pengiriman']=='Proses'){
				?>
					<option value="Diterima">Diterima</option>
					<option value="Tidak Diterima">Tidak Diterima</option>
				<?php
				}else{
				?>
					<option value="Diterima">Diterima</option>
					<option value="Tidak Diterima">Tidak Diterima</option>
				<?php
				}
			echo "
			</select>
			</div>
		</div>";
	echo"
		<div class='col-sm-12' style='margin-top:20px;'>
		<button type='submit' class='btn btn-info'>Update </button>&nbsp;
		<input type=button value=Cancel class='btn btn-danger' onclick=self.history.back()>
		</div>
	</form>
	</table>";
	
	break;
	}
}	
?>	