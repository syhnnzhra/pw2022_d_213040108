<?php 
    require_once '../functions.php';
    if (!isset($_SESSION["role"])) { session_start();
        echo " <script>
            alert('Anda tidak mempunyai akses');
            document.location.href='../login.php'; </script>";
        exit;
    }

    require 'functions.php';
    if(isset($_POST["janji"])) {
        // jalankan fungsi tambah()
        if(app($_POST) > 0) {
            echo "<script>
            alert('Data kamu sedang di proses, tunggu panggilan dari kami, Terima Kasih');
            document.location.href = 'index.php'
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="footer, address, phone, icons" />
    <title>Raincoat Hospital</title>

    <!-- css -->
    <link rel="stylesheet" href="op.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.jpg" alt="" width="40px" class="d-inline-block">
                Raincoat Hospital
            </a>
            <ul class="nav justify-content-end">
                <li> <a href="#home"> Home</a></li>
                <li> <a href="#dokter"> Doctors</a></li>
                <li> <a href="#app"> Appointment</a></li>
                <!-- <li> <a href="#kontak"> Contact</a></li> -->
                <li><a href="logout.php" class="login"> Logout</a></li>
            </ul>
        </div>
      </nav>
    <div class="container">

        <div class="header" id="home">
            <div class="row">
                <div class="header col-4">
                    <h3>Solusi Kesehatan Terlengkap</h3>
                    <p>kunjungi rumah sakit, buat janji rumah sakit dan update informasi seputar kesehatan, semua bisa di Raincoat Hospital!</p>
                    <h4>
                        <a href="#app" class="button btn btn-primary"> Buat Janji</a>
                    </h4>
                </div>
                <div class="header col-5">
                    <img src="../img/doc-n-patient.png" alt="" class="doc-n-patient">
                    <!-- <div class="color-box"></div> -->
                </div>
            </div>
        </div>

        <div class="container pt-5 pb-5" id="dokter">
            <div class="dokter">
                <h2 class="text-center pb-5">Dokter Kami</h2>
                <form action="">
                <div class="row mb-5">
                        <div class="live-search col-sm-4">
                            <input type="text" class="form-control" autocomplete="off" id="keyword" name="keyword" placeholder="Cari dokter...">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary" name="cari" id="tombol-cari"><i class="bi bi-search" style="color:white;"></i></button>
                        </div>
                    </div>
                </form>
                <div id="container">
                    <div class="row">
                        <?php
                            $dokter = query("SELECT * FROM dokter, poliklinik WHERE dokter.id_poliklinik=poliklinik.id_poliklinik");
                            foreach ($dokter as $a) :
                        ?>
                        <div class="col-sm-3 mb-3">
                            <div class="card">
                                <img src="../admin/dokter/img/<?= $a["foto"] ?>" height="200px" width="200px" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title"><?php echo $a ['nama_dokter'];?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $a ['nama_poliklinik'];?></h6>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                </div>
                            </div>
                        </div>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="app">
            <h2 class="text-center pb-5">Buat janji dengan dokter!</h2>
            <div class="row">
                <div class="col-sm-6">
                    <h3>Contact us!</h3>
                    <p> <i class="bi bi-telephone-fill"></i> 081-2345-6789</p>
                    <p> <i class="bi bi-envelope-paper"></i> raincoat@gmail.com</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31688.290288054453!2d107.5236119683663!3d-6.886257181527717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e43e8ebf7617%3A0x501e8f1fc2974e0!2sCimahi%2C%20Kec.%20Cimahi%20Tengah%2C%20Kota%20Cimahi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1654521056935!5m2!1sid!2sid" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-sm-6">
                    <div class="bg-custom-1 card shadow-0 mb-3">
                        <div class="card-body">
                            <h5 class="card-title text-center pb-4 pt-4">Daftar Sekarang!</h5>
                            <form action="" method="POST">
                                <div class="col-sm mb-3">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama">
                                </div>
                                <div class="col-sm mb-3">
                                    <input type="text" class="form-control" name="no_telp" placeholder="No Telephone">
                                </div>
                                <div class="col-sm mb-3">
                                    <textarea class="form-control" name="keluhan" placeholder="Keluhan"></textarea>
                                </div>
                                <input type="hidden" class="form-control" name="status" value="pending">
                                <div style="font-size: 14px;">
                                    <button type="submit" name="janji" value="simpan" class="button-app"> Buat Janji</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- footer -->
    <!-- <footer class="bg-custom-ft1" id="kontak">
        <div class="container py-5">
          <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="img/logo.png" alt="" width="180" class="mb-3">
              <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
              <ul class="list-inline mt-4">
                <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fa fa-vimeo"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
              <h6 class="text-uppercase font-weight-bold mb-4">Shop</h6>
              <ul class="list-unstyled mb-0">
                <li class="mb-2"><a href="#" class="text-muted">For Women</a></li>
                <li class="mb-2"><a href="#" class="text-muted">For Men</a></li>
                <li class="mb-2"><a href="#" class="text-muted">Stores</a></li>
                <li class="mb-2"><a href="#" class="text-muted">Our Blog</a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
              <h6 class="text-uppercase font-weight-bold mb-4">Company</h6>
              <ul class="list-unstyled mb-0">
                <li class="mb-2"><a href="#" class="text-muted">Login</a></li>
                <li class="mb-2"><a href="#" class="text-muted">Register</a></li>
                <li class="mb-2"><a href="#" class="text-muted">Wishlist</a></li>
                <li class="mb-2"><a href="#" class="text-muted">Our Products</a></li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-6 mb-lg-0">
              <h6 class="text-uppercase font-weight-bold mb-4">Newsletter</h6>
              <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
              <div class="p-1 rounded border">
                <div class="input-group">
                  <input type="email" placeholder="Enter your email address" aria-describedby="button-addon1" class="form-control border-0 shadow-0">
                  <div class="input-group-append">
                    <button id="button-addon1" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
    
        <!-- Copyrights -->
        <div class="bg-custom-ft py-4">
          <div class="container text-center">
            <p class="text mb-0 py-2">© 2022 Sprinx All rights reserved.</p>
          </div>
        </div>
      </footer>
      <!-- End -->
</body>
</html>

<script type="text/javascript">
    // ambil elemen2 yang dibutuhkan
    var keyword = document.getElementById('keyword');
    var tombolCari = document.getElementById('tombol-cari');
    var container = document.getElementById('container');

    // tambahkan event ketika keyword ditulis
    keyword.addEventListener('keyup', function() {

        // buat object ajax
        var xhr = new XMLHttpRequest();

        // cek kesiapan ajax
        xhr.onreadystatechange = function() {
            if( xhr.readyState == 4 && xhr.status == 200 ) {
                container.innerHTML = xhr.responseText;
            }
        }

        // eksekusi ajax
        xhr.open('GET', 'ajax/dokter.php?keyword=' + keyword.value, true);
        xhr.send();

    });
</script>