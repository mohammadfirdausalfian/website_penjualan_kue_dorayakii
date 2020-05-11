<?php 
include "../../config/connect.php";
$module=$_GET['dorayaki'];
$act=$_GET['act'];
session_start();


if($module=='pesanan' AND $act=='edit' ){
	mysqli_query($conn, "UPDATE pesan_barang SET status_barang='$_POST[status_b]',
							  status_pengiriman='$_POST[status_p]'
							  WHERE kode_pesan_barang='$_POST[kode_pesan_barang]'");
	header('location:../../tampil.php?dorayaki='.$module);
}

?>