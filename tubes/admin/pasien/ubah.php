<?php
    include '../../koneksi.php';
    $id_pasien=$_POST['id_pasien'];
    $nama_pasien=$_POST['nama_pasien'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $tgl_lahir=$_POST['tgl_lahir'];
    $sql = mysqli_query($koneksi,"update pasien set nama_pasien='$nama_pasien', alamat='$alamat', gender='$gender', tgl_lahir='$tgl_lahir' where id_pasien='$id_pasien'");
    if (mysqli_query($koneksi, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
    
    mysqli_close($koneksi);
?>
<!-- <script> window.location.href="pasien.php";</script> -->