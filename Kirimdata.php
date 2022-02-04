<?php
include "fn.php";
	//baca nomor kartu dari NodeMCU
	$nokartu = $_GET['nokartu'];
	//kosongkan tabel tmprfid
	mysqli_query($conn, "delete from Tmp_card");

	//simpan nomor kartu yang baru ke tabel tmprfid
	$simpan = mysqli_query($conn, "insert into Tmp_card(no)values('$nokartu')");
	if($simpan)
	{
		echo "Berhasil";
	}
	else{
		echo "Gagal";
	}
?>