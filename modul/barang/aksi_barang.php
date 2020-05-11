<?php 
include "../../config/connect.php";
$module=$_GET['dorayaki'];
$act=$_GET['act'];
session_start();


if($module=='barang' AND $act=='input' ){
	mysqli_query($conn, "INSERT INTO barang (kode_barang,nama_barang,stok_barang,ROP)
				VALUE ('$_POST[kode]','$_POST[nama]','$_POST[stok]','$_POST[rop]')");
	header('location:../../tampil.php?dorayaki='.$module);
}

elseif($module=='barang' AND $act=='edit' ){
	mysqli_query($conn, "UPDATE barang SET nama_barang='$_POST[nama]',
							  stok_barang='$_POST[stok]',
							  ROP='$_POST[rop]'
							  WHERE kode_barang='$_POST[kode_barang]'");
	header('location:../../tampil.php?dorayaki='.$module);
}

elseif($module=='barang' AND $act=='hapus' ){
	$hapus=mysqli_query($conn, "DELETE FROM barang WHERE kode_barang='$_GET[kode]'");
	header('location:../../tampil.php?dorayaki='.$module);
}


?>