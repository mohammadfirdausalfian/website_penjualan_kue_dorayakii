<?php 
include "../../config/connect.php";
$module=$_GET['dorayaki'];
$act=$_GET['act'];
session_start();


if($module=='supplier' AND $act=='input' ){
	mysqli_query($conn, "INSERT INTO supplier (supplier_nama,supplier_alamat,supplier_nohp)
				VALUE ('$_POST[nama]','$_POST[alamat]','$_POST[telepon]')");
	header('location:../../tampil.php?dorayaki='.$module);
}

elseif($module=='supplier' AND $act=='edit' ){
	mysqli_query($conn, "UPDATE supplier SET supplier_nama='$_POST[nama]',
							  supplier_alamat='$_POST[alamat]',
							  supplier_nohp='$_POST[telepon]'
							  WHERE supplier_id='$_POST[kode_supplier]'");
	header('location:../../tampil.php?dorayaki='.$module);
}

elseif($module=='supplier' AND $act=='hapus' ){
	$hapus=mysqli_query($conn, "DELETE FROM supplier WHERE supplier_id='$_GET[kode]'");
	header('location:../../tampil.php?dorayaki='.$module);
}


?>