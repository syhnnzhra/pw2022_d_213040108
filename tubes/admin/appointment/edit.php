<?php
require '../crud.php';
//query mhs berdasarkan id
$id_app = $_GET["id_app"];
$app = query("SELECT * FROM appointment WHERE id_app = $id_app")[0]; 

//ketika tombol tambah diklik
if(isset($_POST["submit"])) {
    // jalankan fungsi tambah()
    if(ubahapp($_POST) > 0) {
        echo "<script>
        alert('data berhasil diedit');
        document.location.href = 'app.php'
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
    <title>Raincoat Hospital - Admin</title>

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="../css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>

    <input type="checkbox" id="nav-toggle">

    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-accusoft"></span> <span>Raincoat Hospital</span> </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../dashboard.php"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="../pasien/pasien.php"><span class="las la-user-injured"></span><span>Pasien</span></a>
                </li>
                <li>
                    <a href="dokter.php"><span class="las la-stethoscope"></span><span>Dokter</span></a>
                </li>
                <li>
                    <a href="../poliklinik/poliklinik.php"><span class="las la-briefcase-medical"></span><span>Poliklinik</span></a>
                </li>
                <li>
                    <a href="../rekmed/rekmed.php"><span class="las la-notes-medical"></span><span>Rekam Medis</span></a>
                </li>
                <li>
                    <a href="../appointment/app.php" class="active"><span class="las la-notes-medical"></span><span>Appointment</span></a>
                </li>
                <li>
                    <a href="../profile.php"><span class="las la-user"></span><span>Ubah Profile</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="user-wrapper">
                <img src="../img/logo.jpg" alt="" width="40px">
                <div>
                    <h4>Jane Doe</h4>
                    <small class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Admin</small>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../profile.php">Ubah Profile</a></li>
                        <li><a class="dropdown-item" href="#">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <main>
            <div class="row">
                <div class="card col-sm">
                    <div class="card-body">
                        <h3 class="mt-3 mb-5"> <center>Edit Status Janji bertemu dokter</center></h3>
                        <form action="" method="post">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo $app['nama'];?>"  readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_telp" class="col-sm-2 col-form-label">No telephone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" required value="<?php echo $app['no_telp'];?>"  readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keluhan" name="keluhan" required value="<?php echo $app['keluhan'];?>"  readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="Pending" <?php if($app['status'] == "Pending") { echo "checked"; }?>>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Pending
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="Waiting" <?php if($app['status'] == "Waiting") { echo "checked"; }?>>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Waiting
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="flexRadioDefault3" value="Finished" <?php if($app['status'] == "Finished") { echo "checked"; }?>>
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Finished
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="id_app" required value="<?php echo $app['id_app'];?>">
                            <div class="submit">
                                <button class="btn btn-outline-info" type="submit" name="submit" value="simpan"> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>