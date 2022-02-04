
<?php $rekap = query("SELECT * FROM rekap"); 
?>
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Rekap</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Tabel Rekap</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
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
              <h6>Tabel Rekap</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div id="nokartu"></div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.Kartu</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Karyawan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Datang</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu Pulang</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterlambatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach ($rekap as $rk):?>
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=  $rk["no_rfid"];?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=  $rk["nama_karyawan"];?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=  $rk["Tanggal"];?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                        <p class="text-xs font-weight-bold mb-0"><?=  $rk["waktu_datang"];?></p>
                        </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="text-xs font-weight-bold mb-0"><?=  $rk["waktu_pulang"];?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <span class="badge badge-sm bg-gradient-danger"><?=  $rk["keterlambatan"];?></span>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php $i++?>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
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
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Chuzx</a>
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