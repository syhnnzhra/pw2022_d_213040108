<?php
    require '../crud.php';
    $id_dokter = $_GET["id_dokter"];
    $dokter = query("SELECT * FROM dokter WHERE id_dokter = $id_dokter")[0];
    // cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil diubah atau tidak
        if( ubahdokter($_POST) > 0 ) {
            // echo "
            //     <script>
            //         alert('data berhasil diubah!');
            //         document.location.href = 'index.php';
            //     </script>
            // ";
        } else {
            // echo "
            //     <script>
            //         alert('data gagal diubah!');
            //         document.location.href = 'index.php';
            //     </script>
            // ";
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

    <!-- <link rel="stylesheet" href="../css/style.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- jquery datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                    <a href="dokter.php" class="active"><span class="las la-stethoscope"></span><span>Dokter</span></a>
                </li>
                <li>
                    <a href="../poliklinik/poliklinik.php"><span class="las la-briefcase-medical"></span><span>Poliklinik</span></a>
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
                        <h3 class="mt-3 mb-5"> <center>Edit Data Dokter</center></h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="id_dokter" value="<?php echo $dokter['id_dokter'];?>" required>
                        <div class="mb-3 row">
                                <label for="nama_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?php echo $dokter['nama_dokter'];?>" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="pria" <?php if($dokter['gender'] == "pria") { echo "checked"; }?>>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Pria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="wanita" <?php if($dokter['gender'] == "wanita") { echo "checked"; }?>>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Wanita
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row" id="only-number">
                                <label for="number" class="col-sm-2 col-form-label">No Telephone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="number" value="<?php echo $dokter['no_telp'];?>" name="no_telp" maxlength="13" minlength="12" required>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label for="formFile" class="col-sm-2 col-form-label">Poliklinik</label>
                                <div class="col-sm-10">
                                    <select id="inputState" class="form-select" required name="id_poliklinik">
                                        <option value="<?=$dokter['id_poliklinik']?>" selected><?=$dokter['id_poliklinik']?></option> 
                                    <?php 
                                        $koneksi=mysqli_connect("localhost", "root","", "hospital") or die('Koneksi gagal!');
                                        $sql=mysqli_query($koneksi, 'SELECT*FROM poliklinik');
                                        while ($data=mysqli_fetch_array($sql)) {
                                    ?>
                                        <option value="<?=$data['id_poliklinik']?>"><?=$data['nama_poliklinik']?></option> 
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                                <img src="img/<?php echo $dokter['foto'];?>" class="img-thumbnail col-sm-4 col-form label" style="width:200px; height: 200px;" id="img-preview">
                                <div class="col-sm-6">
                                    <input class="form-control" type="file" id="gambar" name="foto" onchange="previewImage()">
                                </div>
                            </div>
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
    <script>
        $(function() {
        $('#only-number').on('keydown', '#number', function(e){
            -1!==$
            .inArray(e.keyCode,[46,8,9,27,13,110,190]) || /65|67|86|88/
            .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
            || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
            && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
        });
        })
    </script>
    <script>
        function previewImage(){
            const gambar=document.querySelector('#gambar');
            const imgPreview = document.querySelector('#img-preview');
            imgPreview.style.display = 'block';
            var oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function (oFREvent){
                imgPreview.src = oFREvent.target.result;
            };
        }
    </script>