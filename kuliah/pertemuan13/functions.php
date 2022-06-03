<?php 

function koneksi() {
    $conn = mysqli_connect('localhost','root','','pw2022_d_213040108') or die('Koneksi ke DB GAGAL!');

    return $conn;
}

function query($query){
    $conn = koneksi();
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $rows = [];
    while ($row = mysqli_fetch_assoc($result))
    {
    $rows[] = $row;
    }

    return $rows;
    }


    function tambah($data){
        $conn = koneksi();

        // apakah ada gambar yang di upload
        if($_FILES['gambar']['error'] === 4){
            // kalo user tidak milih gambar beri gambar default
            $gambar = 'nophoto.jpg';
        } else{
            // jika user memilih gambar jalan kan fungsi upload
            $gambar = upload();
            // cek kalo upload berhasil
            if(!$gambar){
                return false;
            }
        }

        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        // $gambar = htmlspecialchars($data["gambar"]);

        $query = "INSERT INTO mahasiswa VALUES (null, '$nama', '$npm', '$email','$jurusan', '$gambar')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));

        return mysqli_affected_rows($conn);

    }

    function hapus($id) {
        $conn = koneksi();

        // ambil data mahasiswa
        $mhs = query ("SELECT * FROM mahasiswa WHERE id = $id")[0];

        // hapus data gambar
        if($mhs['gambar'] !== 'nophoto.jpg' ){
            unlink('img/' . $mhs["gambar"]);

        }

        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));

        return mysqli_affected_rows($conn);
    }


    function ubah($data) {
        $conn = koneksi();

        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);


        $query = "UPDATE mahasiswa SET 
                    nama = '$nama',
                    npm = '$npm',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                  WHERE id = $id
                  ";

        mysqli_query($conn, $query) or die(mysqli_error($conn));

        return mysqli_affected_rows($conn);
    }
    function cari($keyword) {
        $query = "SELECT * FROM mahasiswa
                    WHERE
                  nama LIKE '%$keyword%' OR
                  npm LIKE '%$keyword%' OR
                  email LIKE '%$keyword%' OR
                  jurusan LIKE '%$keyword%'
                ";
        return query($query);
    }
    
    function upload(){
        // siapkan data gambar
        $filename = $_FILES['gambar']['name'];
        $filesize = $_FILES['gambar']['size'];
        $filetmpname = $_FILES['gambar']['tmp_name'];

        // ekstensi gambar nya
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        $allowedtype= ['jpg', 'jpeg', 'png'];

        // cek apakah file yang di upload bukan gambar kalo bukan ga bisa di upload
        if(!in_array($filetype, $allowedtype)){
            echo "<script>
                    alert('File yang di upload bukan JPG, JPEG atau PNG');
                </script>";
            return false;
        }

        // cek jika size lebih besar dari 2mb
        if($filesize > 2000000){
            echo "<script>
                    alert('Ukuran gambar terlalu besar');
                </script>";
            return false;
        }

        // lolos pengecekan gambar
        // buat nama file baru biar ga duplikat
        $newfilename = uniqid() . $filename;

        move_uploaded_file($filetmpname, 'img/' . $newfilename);

        return $newfilename;
    }