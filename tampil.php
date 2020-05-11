<!DOCTYPE html>
<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<script language='javascript' type='text/javascript'>
	alert('Anda Harus Login Terlebih Dahulu...!!!');
	</script>
	<meta http-equiv='refresh' content='0; url=index.php'>";  
}
else{
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Dorayaki qu</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
		
		<link rel="stylesheet" href="css/AdminLTE.min.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/dataTables.bootsrap.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">	

		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.form.js"></script>
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.js"></script>
		<script type="text/javascript">
			$(document).ready( function () {
				$('#tabel').DataTable({
				})
			});
		</script>
	</head>
	<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#	" class="navbar-brand">Dorayaki qu</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Selamat Datang, <?php echo $_SESSION['username']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>


	
		<div class="row">
		<div class="col-md-2">
			<div class="row"> 
				<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="img-responsive" src="material/images/dorayakii.jpg">
					</a>
				</div>
			</div>

	<?php
	if ($_SESSION['leveluser']=='1'){
	?>


		<ul class="nav nav-pills nav-stacked" style="width:180px;" >
				<li><a href="?dorayaki=profil"><span class="glyphicon glyphicon-home"> Profil</a></li>
				<li class="treeview">
          <!--<a href="#">
            <i class="glyphicon glyphicon-menu-hamburger"></i>
            <span class="glyphicon glyphicon-book"> Data Toko</span>
            <span class="pull-right-container">
              <span class="fa fa-angle-left pull-right"></span>            </span>          </a>
          		<ul class="treeview-menu">
            	<li><a href="?RotanRian=struktur"><span class="glyphicon glyphicon-picture"> Struktur&nbsp;Produk</a></li>
				<li><a href="?RotanRian=bom"><span class="glyphicon glyphicon-picture"> BOM</a></li>
				<li><a href="?RotanRian=peramalan"><span class="glyphicon glyphicon-picture"> Peramalan</a></li>
				<li><a href="?RotanRian=agregat"><span class="glyphicon glyphicon-picture"> Agregat&nbsp;Planning</a></li>
				<li><a href="?RotanRian=mrp"><span class="glyphicon glyphicon-picture"> MRP</a></li>
          </ul>
        </li>-->
				<li><a href="?dorayaki=barang"><span class="glyphicon glyphicon-tasks"> Barang</a></li>
				<li><a href="?dorayaki=supplier"><span class="glyphicon glyphicon-user"> Supplier</a></li>
				<li><a href="?dorayaki=pemberitahuan"><span class="glyphicon glyphicon-inbox"> Notifikasi</a></li>
				<li><a href="?dorayaki=pesanan"><span class="glyphicon glyphicon-inbox"> Pesanan</a></li>
				<li><a href="?dorayaki=pembelian"><span class="glyphicon glyphicon-shopping-cart"> Pembelian</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</a></li>
		</ul>
	<?php } ?>
	<?php
	if ($_SESSION['leveluser']=='2'){
	?>
		<ul class="nav nav-pills nav-stacked" style="width:180px;">
				<li><a href="?dorayaki=pemberitahuan"><span class="glyphicon glyphicon-inbox"> Notifikasi</a></li>
				<li><a href="?dorayaki=pesanan"><span class="glyphicon glyphicon-inbox"> Pesanan</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</a></li>
		</ul>
	<?php } ?>
	<?php
	if ($_SESSION['leveluser']=='3'){
	?>
		<ul class="nav nav-pills nav-stacked" style="width:180px;">
				<li><a href="?dorayaki=profil"><span class="glyphicon glyphicon-home"> Profil</a></li>
				<li><a href="?dorayaki=stok"><span class="glyphicon glyphicon-tasks"> Stok</a></li>
				<li><a href="?dorayaki=pesan"><span class="glyphicon glyphicon-shopping-cart"> Pesan</a></li>
				<li><a href="?dorayaki=konfirmasi1"><span class="glyphicon glyphicon-list-alt"> Pesan Dorayaki</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</a></li>
		</ul>
	<?php } ?>		
		</div>
		
		<div class="col-sm-10">
			<?php include "data.php"; ?>
		</div>
		</div> 
	</div>
	
</body>
</html>
<?php } ?>