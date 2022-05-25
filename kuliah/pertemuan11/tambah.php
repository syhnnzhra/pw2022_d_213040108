<?php
    require 'functions.php';

    if(isset($_POST['tambah'])){
        // tambah data ke table
        if (tambah($_POST) > 0){
            echo "<script> 
                alert('data berhasil ditambahkan');
                document.location.href='kuliah_latihan1.php';
            </script>";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Tambah Data Mahasiswa </title>
  </head>
  <body>
    <div class="container">
        <h1> Tambah Data Mahasiswa</h1>
        <a href="kuliah_latihan1.php" class="btn btn-outline-primary btn-sm mb-4">Kembali ke daftar mahasiswa</a>
        <div class="row">
            <form action="" method="post">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" required name="nama">
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">NPM</label>
                        <input type="number" class="form-control" id="exampleFormControlInput2" maxlength="9" name="npm" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput3" required name="email">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput4" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" required name="jurusan">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput5" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="exampleFormControlInput5" required name="gambar">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-sm" name="tambah">Tambah Data</button>
            </form>
        </div>
    </div>

  </body>
</html>