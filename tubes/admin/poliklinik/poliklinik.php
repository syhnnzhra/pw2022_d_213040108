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
                    <a href="../dokter/dokter.php"><span class="las la-stethoscope"></span><span>Dokter</span></a>
                </li>
                <li>
                    <a href="poliklinik.php" class="active"><span class="las la-briefcase-medical"></span><span>Poliklinik</span></a>
                </li>
                <li>
                    <a href="../rekmed/rekmed.php"><span class="las la-notes-medical"></span><span>Rekam Medis</span></a>
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
                        <h3 class="mt-3 mb-5"> <center>Data Poliklinik</center></h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="create.php" class="btn btn-outline-info btn-sm">Tambah Data</a>
                            </div>
                            <div class="col-sm-6">
                                <input type="search" name="" id="">
                                <a href="" class="btn btn-outline-info btn-sm">Search</a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Poliklinik</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../../koneksi.php';
                                    $i=1;
                                    $data=mysqli_query($koneksi, 'SELECT*FROM poliklinik');
                                    while ($a=mysqli_fetch_array($data)) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?php echo $a ['id_poliklinik'];?></td>
                                    <td><?php echo $a ['nama_poliklinik'];?></td>
                                    <td>
                                        <a href="edit.php?id_poliklinik=<?php echo$a['id_poliklinik'];?>" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <a href="delete.php?id_poliklinik=<?php echo$a['id_poliklinik'];?>" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    };
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>