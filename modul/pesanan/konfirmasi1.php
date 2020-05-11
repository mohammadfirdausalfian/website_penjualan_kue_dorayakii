<?php
	$tampil=mysqli_query($conn, "select * from pesan_online order by kode_pesan desc");
	$r = mysqli_fetch_array($tampil);
	echo "<h3 class='head'>Pesanan Anda</h3>
	<p style='font-size:20px;color:#333333;'><b>Dorayaki Berhasil Di Pesan</b></p>
	<p style='font-size:20px;color:#333333;'>Total biaya yang harus anda keluarkan adalah <b>Rp. $r[total_biaya],-";
?>