<?php

    function koneksilogin(){
        $conn=mysqli_connect("localhost", "root","", "hospital") or die('Koneksi gagal!');
        return $conn;
    }

    function querylogin($query){
        $conn = koneksilogin();
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        // siapkan data  $mahasiswa
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        
        return $rows;
    }

    function register($data){
        $conn = koneksilogin();
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

    if(isset($_POST['login'])){
        $conn = koneksilogin();
        $username = $_POST['username'];
        $password = $_POST['password'];

        $cekuser = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
        $hitung = mysqli_num_rows($cekuser);

        // var_dump($hitung);

        if($hitung>0){
            // kalau data ditemukan
            $ambildatarole = mysqli_fetch_array($cekuser);
            $role = $ambildatarole['role'];

            if($role=='admin'){
                // kalau dia admin
                $_SESSION['log'] = 'Logged';
                $_SESSION['role'] = 'Admin';
                header('location:admin/dashboard.php');
            } else {
                // kalau bukan admin
                $_SESSION['log'] = 'Logged';
                $_SESSION['role'] = 'User';
                header('location:user');
            }

        } else {
            // kalau tidak ditemukan

            echo 'Data tidak ditemukan';
        }
    };
?>