<?php 
include "../../config/connect.php";
$module=$_GET['dorayaki'];
$act=$_GET['act'];
session_start();


if($module=='pembelian' AND $act=='input' ){
	mysqli_query($conn, "INSERT INTO pesan_barang (nama_supplier,nama_barang,banyak_barang,tgl_pesan,tgl_terima,status_barang,status_pengiriman)
				VALUE ('$_POST[nama_s]','$_POST[nama_b]','$_POST[banyak]','$_POST[tgl_p]','$_POST[tgl_t]','Belum diKonfirmasi','Proses')");
	header('location:../../tampil.php?dorayaki='.$module);
}

elseif($module=='pembelian' AND $act=='edit' ){

	if($_POST['status_p']=='Diterima'){
	mysqli_query($conn, "UPDATE pesan_barang SET status_pengiriman='$_POST[status_p]' 
						WHERE kode_pesan_barang='$_POST[kode_pesan_barang]'");
	mysqli_query($conn, "UPDATE barang SET stok_barang=stok_barang+'$_POST[banyak_barang]' 
						WHERE nama_barang='$_POST[nama_barang]'");
	header('location:../../tampil.php?dorayaki='.$module);
	}else{
	mysqli_query($conn, "UPDATE pesan_barang SET status_pengiriman='$_POST[status_p]' 
						WHERE kode_pesan_barang='$_POST[kode_pesan_barang]'");
	header('location:../../tampil.php?dorayaki='.$module);
	}
}

?>