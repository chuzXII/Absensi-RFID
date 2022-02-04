  <script>
     $(document).ready(function(){
       setInterval(function(){
         $("#ak").load('/pages/Card.php')
       },0)
     });
   </script>
<?php
$job = query("SELECT * FROM Job_kategori");
if(isset($_POST["btnsimpan"])){
  if(addkar($_POST)>0){
    echo"
        <script>
          alert('Data Berhasil Ditambahkan);
          document.location.href'/?page=karyawan';
        </script>
    ";
  }
  else{
    echo"
        <script>
          alert('Data Gagal );
          document.location.href='/?page=addkaryawan';
        </script>
    ";
  }
}
?>
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Karyawan</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Tambah Karyawan</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tambah Karyawan</h6>
            </div>
            <div class="card-body">
            <form method="POST">
              <div id="ak"></div>
              <div class="mb-3">
                <label for="exampleNama" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" name="namakar" id="exampleNama">
              </div>
              <div class="mb-3">
                <label for="exampleAlamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="exampleAlamat" name="alamat" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="exampleJob" class="form-label">Job Desk</label>
                <select class="form-select form-select-sm" aria-label="Default select example" name="job" id="exampleJob">
                  <?php foreach($job as $jb):?>
                  <option value=<?=$jb["id"];?>><?= $jb["nama_job"];?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <button type="submi" name="btnsimpan" class="btn btn-primary">Submit</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Chuzx</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">zauzj</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>