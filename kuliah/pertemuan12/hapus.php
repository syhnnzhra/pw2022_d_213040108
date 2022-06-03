<?php
    $id = $_GET['id'];
    require 'functions.php';
    if(hapus($id)>0){
        echo "<script> alert('data berhasil di hapus'); document.location.href='kuliah_latihan1.php';</script>";
    }
?>