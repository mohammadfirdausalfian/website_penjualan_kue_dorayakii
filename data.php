<?php
include "config/connect.php";

if ($_SESSION['leveluser']=='1'){
	if($_GET['dorayaki']=="profil"){
	include "modul/profil/profil.php";
	}
	if($_GET['dorayaki']=="struktur"){
	include "modul/profil/struktur.php";
	}
	if($_GET['dorayaki']=="bom"){
	include "modul/profil/bom.php";
	}
	if($_GET['dorayaki']=="peramalan"){
	include "modul/profil/peramalan.php";
	}
	if($_GET['dorayaki']=="agregat"){
	include "modul/profil/agregat.php";
	}
	if($_GET['dorayaki']=="mrp"){
	include "modul/profil/mrp.php";
	}
	if($_GET['dorayaki']=="barang"){
	include "modul/barang/barang.php";
	}
	if($_GET['dorayaki']=="supplier"){
	include "modul/supplier/supplier.php";
	}
	if($_GET['dorayaki']=="pemberitahuan"){
	include "modul/pemberitahuan/pemberitahuan_m.php";
	}
	if($_GET['dorayaki']=="pesanan"){
	include "modul/pesanan/pesanan_c.php";
	}
	if($_GET['dorayaki']=="pembelian"){
	include "modul/pembelian/pembelian.php";
	}
}
if ($_SESSION['leveluser']=='2'){
	if($_GET['dorayaki']=="pemberitahuan"){
	include "modul/pemberitahuan/pemberitahuan_s.php";
	}
	if($_GET['dorayaki']=="pesanan"){
	include "modul/pesanan/pesanan_m.php";
	}
}
if ($_SESSION['leveluser']=='3'){
	if($_GET['dorayaki']=="profil"){
	include "modul/profil/profil.php";
	}
	if($_GET['dorayaki']=="stok"){
	include "modul/stok/stok.php";
	}
	if($_GET['dorayaki']=="pesan"){
	include "modul/pesanan/pesan.php";
	}
	if($_GET['dorayaki']=="konfirmasi"){
	include "modul/pesanan/konfirmasi1.php";
	}
	if($_GET['dorayaki']=="konfirmasi1"){
	include "modul/pesanan/konfirmasi.php";
	}
	if($_GET['dorayaki']=="konfirmasigagal"){
	include "modul/pesanan/konfirmasigagal.php";
	}
}
?>
	