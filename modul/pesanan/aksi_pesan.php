<?php 
include "../../config/connect.php";
$module=$_GET['dorayaki'];
$act=$_GET['act'];
session_start();

if($module=='pesan' AND $act=='input'){
	$tampil=mysqli_query($conn, "select * from barang where nama_barang='Dorayaki'");
	$r = mysqli_fetch_array($tampil);
	$stok= $r['stok_barang'];
	
	if($stok>=$_POST['banyak']){
	
		$total=($_POST['banyak']*7000);
		mysqli_query($conn, "INSERT INTO pesan_online (nama_pemesan,alamat_pemesan,telp_pemesan,banyak_pesan,total_biaya,status)
				VALUE ('$_POST[nama]','$_POST[alamat]','$_POST[telepon]','$_POST[banyak]',$total,'Proses')");
				
		$banyak=$_POST['banyak'];
		mysqli_query($conn, "update barang set stok_barang=stok_barang-$banyak where nama_barang='Dorayaki'");

		$banyak1=$_POST['banyak']*150;
		mysqli_query($conn, "update barang set stok_barang=stok_barang-$banyak1 where nama_barang='Tepung Terigu'");
		
		$banyak2=$_POST['banyak']*2;
		mysqli_query($conn, "update barang set stok_barang=stok_barang-$banyak2 where nama_barang='Telur'");

		$banyak3=$_POST['banyak']*100;
		mysqli_query($conn, "update barang set stok_barang=stok_barang-$banyak3 where nama_barang='Gula Pasir'");

		$banyak4=$_POST['banyak']*50;
		mysqli_query($conn, "update barang set stok_barang=stok_barang-$banyak4 where nama_barang='Coklat'");

		
		header('location:../../tampil.php?dorayaki=konfirmasi');
		
	}else{
		header('location:../../tampil.php?dorayaki=konfirmasigagal');
	}
}

?>