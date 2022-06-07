<?php
    function koneksi(){
        $conn=mysqli_connect("localhost", "root","", "hospital") or die('Koneksi gagal!');
        return $conn;
    }

    function query($query){
        $conn = koneksi();
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        // siapkan data  $mahasiswa
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        
        return $rows;
    }

    function app($data){
        $conn = koneksi();
        $nama = htmlspecialchars($data["nama"]);
        $no_telp = htmlspecialchars($data["no_telp"]);
        $keluhan = htmlspecialchars($data["keluhan"]);
        $status = htmlspecialchars($data["status"]);
 
        $query = 
        "INSERT INTO appointment 
        VALUES (null, 
        '$nama',
        '$no_telp',
        '$keluhan',
        '$status'
        )";
        // var_dump($query);
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }