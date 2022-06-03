<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="footer, address, phone, icons" />
    <title>Raincoat Hospital</title>

    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

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
                <li> <a href="#app"> Appointment</a></li>
                <li> <a href="#dokter"> Doctors</a></li>
                <li> <a href="#kontak"> Contact</a></li>
                <li><a href="#" class="login"> Login</a></li>
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

        <div class="container" id="app">
            <h2 class="text-center pb-5">Buat janji dengan dokter!</h2>
            <div class="row">
                <div class="col-sm-6">
                    <!-- <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                          <a href="#" class="card-link">Card link</a>
                          <a href="#" class="card-link">Another link</a>
                        </div>
                    </div> -->
                </div>
                <div class="col-sm-6">
                    <div class="bg-custom-1 card shadow-0 mb-3">
                        <div class="card-body">
                            <h5 class="card-title text-center pb-4 pt-4">Daftar Sekarang!</h5>
                            <form action="">
                                <div class="col-sm mb-3">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                                </div>
                                <div class="col-sm mb-3">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat">
                                </div>
                                <div class="col-sm mb-3">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir">
                                </div>
                                <div class="col-sm mb-3">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Gender">
                                </div>
                                <div class="col-sm mb-3">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                </div>
                                <h4>
                                    <a href="#app" class="button-app"> Buat Janji</a>
                                </h4>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-5 pb-5" id="dokter">
            <div class="dokter">
                <h2 class="text-center pb-5">Dokter Kami</h2>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <img src="../img/dokter1.jpg" height="50%" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Nama</h5>
                              <h6 class="card-subtitle mb-2 text-muted">Spesialis</h6>
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- footer -->
    <footer class="bg-custom-ft1" id="kontak">
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
        </div>
    
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

<!-- <script>
    var menuList = document.getElementById("menuList");
    menuList.style.maxHeight = "0px";
    function togglemenu(){
        if(menuList.style.maxHeight == "0px"){
            menuList.style.maxHeight = "130px";
        } else{
            menuList.style.maxHeight = "0px";
        }
    }
</script> -->