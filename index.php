<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
 <title>Dorayaki qu</title>    
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="icon" href="img/logobuku.png">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<?php include 'config/connect.php'; ?>
	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>

  

		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
			}
		}
		?>

<body style="background: url(img/bg1.jpg); background-size: 100% 100%; background-repeat: no-repeat;">
	<div class="container-fluid">
		<div class="container login">
			<img src="img/logobuku.png" width="200px">
			<br>
			<form name="loginform" class="login" action="login_aksi.php" method="post">
				<div>
					<label for="user_login">
						<input type="text" name="username" id="username" placeholder="Username">
					</label>
					<label for="user_pass">
						<input type="password" name="password" id="password" size="20" placeholder="Password">
					</label>
                                        </div>
				<div>
					<input type="submit" name="wp-submit" class="submit" value="L O G I N">
				</div>
			</form>
		</div>
	</div>	
</body>
</html>
