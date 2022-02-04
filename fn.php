<?php
  //  $conn = mysqli_connect("127.0.0.1","root","root","db_karyawan");
   $conn = mysqli_connect("127.0.0.1","root","","db_karyawan");
    if (mysqli_connect_errno($conn)){
        echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
    }
    
    
function query($query){
  global $conn;
  $result = mysqli_query($conn,$query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}

function addkar($data){
  global $conn;
  $nokartu =htmlspecialchars( $data["nokar"]);
  $nama =htmlspecialchars( $data["namakar"]);
  $jobd = htmlspecialchars($data["job"]);
  $alamat = htmlspecialchars($data["alamat"]);
  
  
  $query = "insert into Karyawan(no_rfid,nama_karyawan,job_desk,alamat)VALUES('$nokartu','$nama','$jobd','$alamat')";
  $simpan = mysqli_query($conn,$query);
  
  return mysqli_affected_rows($conn);
  
   mysqli_query($conn, "delete from Tmp_card");
}
function datatmp(){
  global $conn;

}

function totalkaryawan(){
  global $conn;
  $data_barang = mysqli_query($conn,"SELECT * FROM Karyawan");
  $total = mysqli_num_rows($data_barang);
  return $total;
}
?>