<?php
 include "fn.php";
 
 $sql = mysqli_query($conn,"select * from Tmp_card");
 $data = mysqli_fetch_array($sql);
 $nokartu = $data['no'];
?>
<div class="form-group">
  <label>no.kartu</label>
  <input type="text" name="nokar" id="nokartu" placeholder="tempelkan kartu rfid Anda" class="form-control" style="width: 200px" value="<?php echo $nokartu; ?>">
</div>