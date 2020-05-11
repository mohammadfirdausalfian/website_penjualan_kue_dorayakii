<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/barang/aksi_barang.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	$tampil=mysqli_query($conn, "select * from barang");
	echo"<h3 ><span class='glyphicon glyphicon-tasks'></span> Data Barang</h3>
	<input type=button class='btn btn-info col-md-2'value='+ Tambah Barang' onclick=\"window.location.href='?dorayaki=barang&act=input';\"><br><br>
	";
?>

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


	<table class="table table-hover">
		<thead>
			
				<th class="col-md-1">Kode Barang</th>
				<th class="col-md-4">Nama Barang</th>
				<th class="col-md-3">Stok Barang</th>
				<th class="col-md-1">ROP</th>
				<th class="col-md-3">Opsi</th>
			</tr>
		</thead>
		<tbody>
<?php
	while($r = mysqli_fetch_array($tampil)){
	echo"
		<tr>
			<td>$r[kode_barang]</td>
			<td>$r[nama_barang]</td>
			<td>$r[stok_barang]</td>
			<td>$r[ROP]</td>
			<td id='edit'><center><a href='?dorayaki=barang&act=edit&kode=$r[kode_barang]'><span class='glyphicon glyphicon-pencil'>&nbsp;</a>
			<a href='$aksi?dorayaki=barang&act=hapus&kode=$r[kode_barang]' onclick=\"return confirm('Anda Yakin ?')\"><span class='glyphicon glyphicon-trash'></a></td>
		
		</tr>
	";
	}					
	break;
	
	case "input":
	echo"<h2 class='head'>Tambah Barang</h2>
	<form method='POST' action='$aksi?dorayaki=barang&act=input'>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='name'>Kode Barang</label>
			<input type='text' class='form-control' id='kode' placeholder='Kode Barang' name='kode' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='name'>Nama Barang</label>
			<input type='text' class='form-control' id='nama' placeholder='Nama Barang' name='nama' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5' style='margin-top:20px;margin-bottom:20px;'>
			<label for='email'>Stok Barang</label>
			<input type='text' class='form-control' id='stok' placeholder='Stok' name='stok' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5' style='margin-top:20px;margin-bottom:20px;'>
			<label for='email'>ROP</label>
			<input type='text' class='form-control' id='rop' placeholder='ROP' name='rop' required />
			</div>
		</div>
		<div class='col-sm-12'>
		<button type='submit' class='btn btn-info'>Save</button>
		<input type=button value=Cancel class='btn btn-danger' onclick=self.history.back()>
		</div>

	</form>";
	
	break;
	
	case "edit":
	$baca=mysqli_query($conn, "select * from barang where kode_barang='$_GET[kode]'");
	$r=mysqli_fetch_array($baca);
	echo"<h2 class='head'>Edit Barang</h2>
	<table border='1'>
	<Form method='POST' action='$aksi?dorayaki=barang&act=edit'>
	<input type='hidden' name='kode_barang' value='$r[kode_barang]' size='15'>
		<div class='form-group'>
			<div class='col-sm-8' style='margin-bottom:20px;'>
			<label for='barang'>Nama Barang</label>
			<input type='text' class='form-control' id='nama' placeholder='Nama' name='nama' value='$r[nama_barang]' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='pengiriman'>Stok Barang</label>
			<input type='text' class='form-control' id='nama' placeholder='Stok' name='stok' value='$r[stok_barang]' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-3'>
			<label for='pengiriman'>ROP</label>
			<input type='text' class='form-control' id='nama' placeholder='ROP' name='rop' value='$r[ROP]' required />
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
	case "hapus":
	
	break;
	}
}	
?>

<!--<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="modul/barang/aksi_barang.php" method="post">
					<div class="form-group">
						<label>Kode Barang</label>
						<input name="kode" type="text" class="form-control" placeholder="Kode Barang ..">
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label>Stok Barang</label>
						<input name="stok" type="text" class="form-control" placeholder="Stock Barang ..">
					</div>
					<div class="form-group">
						<label>ROP</label>
						<input name="rop" type="text" class="form-control" placeholder="ROP">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>-->