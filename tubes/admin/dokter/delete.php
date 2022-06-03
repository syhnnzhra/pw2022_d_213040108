<?php
    $id_dokter = $_GET['id_dokter'];
    require '../crud.php';
    if(hapusdokter($id_dokter)>0){
        echo "<script> alert('data berhasil di hapus'); document.location.href='dokter.php';</script>";
    } 

?>