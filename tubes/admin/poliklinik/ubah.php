<?php
    include '../../koneksi.php';
    $id_poliklinik=$_POST['id_poliklinik'];
    $nama_poliklinik=$_POST['nama_poliklinik'];
    $sql = mysqli_query($koneksi, "update poliklinik set nama_poliklinik='$nama_poliklinik' where id_poliklinik='$id_poliklinik'");

    if ($koneksi->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    
    $koneksi->close();
?>
<!-- <script> window.location.href="poliklinik.php";</script> -->