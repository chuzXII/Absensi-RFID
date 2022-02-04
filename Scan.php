<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
  date_default_timezone_set('Asia/Jakarta') ;
	include "fn.php";

	//baca tabel status untuk mode absensi

	
	$Vsdatang = mysqli_fetch_assoc(mysqli_query($conn, "select value from Setting where nama_value = 'Start-Datang'"));
	$Vfdatang = mysqli_fetch_assoc(mysqli_query($conn, "select value from Setting where nama_value = 'Finish-Datang'"));
	$Vspulang = mysqli_fetch_assoc(mysqli_query($conn, "select value from Setting where nama_value = 'Start-Pulang'"));
	$Vfpulang = mysqli_fetch_assoc(mysqli_query($conn, "select value from Setting where nama_value = 'Finish-Pulang'"));
	
	$sdatang = $Vsdatang['value'];
	$fdatang = $Vfdatang['value'];
	$spulang = $Vspulang['value'];
	$fpulang = $Vfpulang['value'];
	
  $Ssdatang = strtotime($sdatang);
  $Sfdatang = strtotime($fdatang);
  $Sspulang = strtotime($spulang);
  $Sfpulang = strtotime($fpulang);
  
  $now = date('H:i:s');
  $Snow = strtotime($now);
  $tanggal = date('Y-m-d');
  
//var_dump($Ssdatang,$Sfdatang,$Sspulang,$Sfpulang,$Snow,$sh);
	//uji mode absen
	$mode = "";
	if($Snow >= $Ssdatang  && $Snow <= $Sfdatang){
		$mode = "Masuk";
	}
	else if($Snow >= $Sspulang  && $Snow <= $Sfpulang)
	{
		$mode = "Pulang";
	}
	else
 {
		$mode = "Terlambat";
 }

	//baca tabel tmprfid
	$baca_kartu = mysqli_query($conn, "select * from Tmp_card");
	$data_kartu = mysqli_fetch_array($baca_kartu);
	$nokartu    = $data_kartu['no'];
	$cari_absen = mysqli_query($conn, "select * from rekap where no_rfid='$nokartu' and Tanggal='$tanggal'");
	$data_rekap = mysqli_fetch_array($cari_absen);
	
?>


<div class="container-fluid" style="text-align: center;">
	<?php if($nokartu==null) { ?>

	<h3>Absen : <?php echo $mode; ?> </h3>
	<h3>Silahkan Tempelkan Kartu RFID Anda</h3>
	<img src="assets/img/rfid.png" style="width: 300px"> <br>
	<img src="assets/img/animasi2.gif">
	<h3>Jam : <?php echo date('H:i:s'); ?> </h3>

	<?php } else {
		//cek nomor kartu RFID tersebut apakah terdaftar di tabel karyawan
		$cari_karyawan = mysqli_query($conn, "select * from Karyawan where no_rfid='$nokartu'");
		$jumlah_data = mysqli_num_rows($cari_karyawan);

		if($jumlah_data==0)
			echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
		else
		{
			//ambil nama karyawan
			$data_karyawan = mysqli_fetch_array($cari_karyawan);
			$nama = $data_karyawan['nama_karyawan'];

			//cek di tabel absensi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
			$cari_absen = mysqli_query($conn, "select * from rekap where no_rfid='$nokartu' and Tanggal='$tanggal'");
			$data_rekap = mysqli_fetch_array($cari_absen);
			
			$wpulang = $data_rekap['waktu_pulang'];
			$wterlambat = $data_rekap['keterlambatan'];
			
			//hitung jumlah datanya
			$jumlah_absen = mysqli_num_rows($cari_absen);
			  if($jumlah_absen==0 && $mode=="Datang"){
			    if($jumlah_absen > 0){
			      echo "<h1>Maaf Anda Sudah melakukan Absensi</h1>";
			    }
			    else{
			      echo "<h1>Selamat Datang <br> $nama</h1>";
				    mysqli_query($conn, "insert into rekap(no_rfid, nama_karyawan,Tanggal, waktu_datang,waktu_pulang,keterlambatan)values('$nokartu', '$nama','$tanggal', '$now',NULL,NULL)");
			    }
			  
		  	} 
		  	else if($mode == "Pulang"){
		  	  if($jumlah_absen == 0){
		  	    echo "<h1> Maaf Anda Terlambat,Mohon Besok Tidak Untuk terlambat lagi :) <br> $nama</h1>";

				    mysqli_query($conn, "insert into rekap(no_rfid, nama_karyawan,Tanggal, waktu_datang,waktu_pulang,keterlambatan)values('$nokartu', '$nama','$tanggal', NULL,NULL,'$now')");
		  	  }
		  	  else if($wpulang == NULL){
		  	    echo "<h1> Selamat Jalan $nama,Semoga Selamat Sampai Tujuan </h1>";
		  	    
				    mysqli_query($conn, "update rekap set waktu_pulang = '$now' where no_rfid='$nokartu' and Tanggal='$tanggal'");
		  	  }
		  	  else{
		  	    echo "<h1>Maaf Anda Sudah melakukan Absensi</h1>";
		  	  }
		  	}
		  	elseif ($mode == "Terlambat") {
		  	  if($jumlah_absen == 0){
		  	    echo "<h1> Maaf Anda Terlambat,Mohon Besok Tidak Untuk terlambat lagii :) <br> $nama</h1>";

				    $a = mysqli_query($conn, "insert into rekap(no_rfid, nama_karyawan,Tanggal,keterlambatan)values('$nokartu', '$nama','$tanggal','$now')");
		  	  }else {
		  	    echo "<h1>Maaf Anda Sudah melakukan Absensi</h1>";
		  	  }
		  	}
		  	}


		//kosongkan tabel tmprfid
		mysqli_query($conn, "delete from Tmp_card");
	}
?>

</div>