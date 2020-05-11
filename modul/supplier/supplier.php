<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=../../index.php'>";  
}
else{

$aksi="modul/supplier/aksi_supplier.php";
$act = isset($_GET['act']) ? $_GET['act'] : ''; 
switch($act){
	default:
	$tampil=mysqli_query($conn, "select * from supplier");
	echo"<h3 class='head'><span class='glyphicon glyphicon-user'></span> Data Supplier</h3>
	<input type=button class='btn btn-info col-md-2' value='+ Tambah Supplier' onclick=\"window.location.href='?dorayaki=supplier&act=input';\"><br><br>
	";
?>
	<table class="table table-hover">
		<thead>
				<th>Kode Supplier</th>
				<th>Nama Supplier</th>
				<th>Alamat Supplier</th>
				<th>Telepon Supplier</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
<?php
	while($r = mysqli_fetch_array($tampil)){
	echo"
		<tr>
			<td>$r[supplier_id]</td>
			<td>$r[supplier_nama]</td>
			<td>$r[supplier_alamat]</td>
			<td>$r[supplier_nohp]</td>
			<td id='edit'><center><a href='?dorayaki=supplier&act=edit&kode=$r[supplier_id]'><span class='glyphicon glyphicon-pencil'>&nbsp;</a>
			<a href='$aksi?dorayaki=supplier&act=hapus&kode=$r[supplier_id]' onclick=\"return confirm('Anda Yakin ?')\"><span class='glyphicon glyphicon-trash'></a></td>
		
		</tr>
	";
	}					
	break;
	
	case "input":
	echo"<h2 class='head'>Tambah supplier</h2>
	<form method='POST' action='$aksi?dorayaki=supplier&act=input'>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='name' >Nama Supplier</label>
			<input type='text' class='form-control' id='nama' placeholder='Nama supplier' name='nama' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5' >
			<label for='email'>Telepon Supplier</label>
			<input type='text' class='form-control' id='rop' placeholder='Telepon' name='telepon' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-8' style='margin-top:20px;margin-bottom:20px;'>
			<label for='email'>Alamat Supplier</label>
			<textarea name='alamat' class='form-control'></textarea>
			</div>
		</div>
		
		<div class='col-sm-12'>
		<button type='submit' class='btn btn-info'>Save</button>
		<input type=button value=Cancel class='btn btn-danger' onclick=self.history.back()>
		</div>

	</form>";
	
	break;
	
	case "edit":
	$baca=mysqli_query($conn, "select * from supplier where supplier_id='$_GET[kode]'");
	$r=mysqli_fetch_array($baca);
	echo"<h2 class='head'>Edit Supplier</h2>
	<table border='1'>
	<Form method='POST' action='$aksi?dorayaki=supplier&act=edit'>
	<input type='hidden' name='kode_supplier' value='$r[supplier_id]' size='15'>
		<div class='form-group'>
			<div class='col-sm-5' >
			<label for='supplier'>Nama Supplier</label>
			<input type='text' class='form-control' id='nama' placeholder='Nama' name='nama' value='$r[supplier_nama]' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-5'>
			<label for='pengiriman'>Telepon Supplier</label>
			<input type='text' class='form-control' id='nama' placeholder='Telepon' name='telepon' value='$r[supplier_nohp]' required />
			</div>
		</div>
		<div class='form-group'>
			<div class='col-sm-8' style='margin-top:20px;'>
			<label for='pengiriman'>Alamat Suppplier</label>
			<textarea name='alamat' class='form-control'>$r[supplier_alamat]</textarea>
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