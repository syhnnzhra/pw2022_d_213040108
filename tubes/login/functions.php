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

    function register($data){
        $conn = Koneksi();
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $role = mysqli_real_escape_string($conn, $data["role"]);

        // cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if( mysqli_fetch_assoc($result) ) {
            echo "<script>
                    alert('username sudah terdaftar!')
                </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan userbaru ke database
        $sql = mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$role')");

        return mysqli_affected_rows($conn);
    }
?>