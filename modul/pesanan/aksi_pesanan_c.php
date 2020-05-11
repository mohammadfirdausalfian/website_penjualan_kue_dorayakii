<?php 
include "../../config/connect.php";
$module=$_GET['dorayaki'];
$act=$_GET['act'];
session_start();


if($module=='pesanan' AND $act=='edit' ){
	if($_POST['status']=='Gagal'){
		mysqli_query($conn, "UPDATE pesan_online SET status='$_POST[status]' 
							WHERE kode_pesan='$_POST[kode_pesan]'");
		header('location:../../tampil.php?dorayaki='.$module);
		
		$banyak=$_POST['banyak']*120;
		mysqli_query($conn, "update barang set stok_barang=stok_barang+$banyak where nama_barang='Kentang'");

		$banyak1=$_POST['banyak']*1400;
		mysqli_query($conn, "update barang set stok_barang=stok_barang+$banyak1 where nama_barang='Minyak Goreng'");
		
		$banyak2=$_POST['banyak']*0.2;
		mysqli_query($conn, "update barang set stok_barang=stok_barang+$banyak2 where nama_barang='Garam'");
		
	}else{
		mysqli_query($conn, "UPDATE pesan_online SET status='$_POST[status]' 
							WHERE kode_pesan='$_POST[kode_pesan]'");
		header('location:../../tampil.php?dorayaki='.$module);
	}
}

?>