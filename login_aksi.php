<?php
include "config/connect.php";
$cari=mysqli_query($conn,"select* FROM user WHERE username='$_POST[username]' AND password='$_POST[password]'");
$ketemu=mysqli_num_rows($cari);
$r=mysqli_fetch_array($cari);

if ($ketemu>0){
	session_start();
  $_SESSION[username]     		= $r[username];
  $_SESSION[password]    		= $r[password];
  $_SESSION[leveluser]	    	= $r[level_user];
  
  if($_SESSION[leveluser]==1){
	header('location:tampil.php?dorayaki=pemberitahuan');
  }else if($_SESSION[leveluser]==2){
	header('location:tampil.php?dorayaki=pemberitahuan');
  }else if($_SESSION[leveluser]==3){
	header('location:tampil.php?dorayaki=profil');
  }
  
}
else{
header("location:index.php?pesan=gagal")or die(mysql_error());;
}
?>