<?php
    require 'functions.php';
    // query ke table mahasiswa 
    $mahasiswa = query('SELECT * FROM mahasiswa');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Daftar Mahasiswa </title>
  </head>
  <body>
    <div class="container">
        <h1> Daftar Mahasiswa</h1>
        <a href="tambah.php" class="btn btn-primary btn-sm">Tambah Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">nama</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach ($mahasiswa as $mhs) :?>
                <tr>
                    <th scope="row" class="align-middle"><?= $i++; ?></th>
                    <td><img src="img/<?= $mhs["gambar"] ?>" height="80" class="rounded" alt=""></td>
                    <td class="align-middle"><?= $mhs["nama"]; ?></td>
                    <td class="align-middle"><?= $mhs["npm"]; ?></td>
                    <td class="align-middle"><?= $mhs["email"]; ?></td>
                    <td class="align-middle"><?= $mhs["jurusan"]; ?></td>
                    <td class="align-middle">
                        <a href="" class="btn badge bg-warning">Edit</a>
                        <a href="hapus.php?id=<?= $mhs['id'];?>" class="btn badge bg-danger" onclick="return confirm('Data Akan Dihapus')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

  </body>
</html>