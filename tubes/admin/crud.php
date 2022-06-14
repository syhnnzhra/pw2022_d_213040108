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

    function tambahdokter($data) {
        $conn = koneksi();
        // apakah ada gambar yang di upload
        if($_FILES['foto']['error'] === 4){
            // kalo user tidak milih gambar beri gambar default
            $foto = 'nophoto.jpg';
        } else{
            // jika user memilih gambar jalan kan fungsi upload
            $foto = upload();
            // cek kalo upload berhasil
            if(!$foto){
                return false;
            }
        }
        $nama_dokter = htmlspecialchars($data["nama_dokter"]);
        $gender = htmlspecialchars($data["gender"]);
        $no_telp = htmlspecialchars($data["no_telp"]);
        $id_poliklinik = htmlspecialchars($data["id_poliklinik"]);
        // $foto = htmlspecialchars($data["foto"]);

        $query = "INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `gender`, `no_telp`, `id_poliklinik`, `foto`) VALUES (NULL, '$nama_dokter', '$gender', '$no_telp', '$id_poliklinik', '$foto');";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    
    }

    function upload() {

        // siapkan data gambar
        $filename = $_FILES['foto']['name'];
        $filesize = $_FILES['foto']['size'];
        $filetmpname = $_FILES['foto']['tmp_name'];

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
    

    function caridokter($keyword) {
        $query = "SELECT * FROM dokter
                    WHERE
                        id_dokter LIKE '%$keyword%' OR
                        nama_dokter LIKE '%$keyword%' OR
                        gender LIKE '%$keyword%' OR
                        no_telp LIKE '%$keyword%' OR
                        id_poliklinik LIKE '%$keyword%' 
                ";
        return query($query);
    }

    function ubahdokter($data) {
        $conn = koneksi();
        $id_dokter = $data["id_dokter"];
        $nama_dokter = htmlspecialchars($data["nama_dokter"]);
        $gender = htmlspecialchars($data["gender"]);
        $no_telp = htmlspecialchars($data["no_telp"]);
        $id_poliklinik = htmlspecialchars($data["id_poliklinik"]);
        $oldpic = $data["oldpic"];

        // cek apakah user pilih gambar baru atau tidak
        if( $_FILES['foto']['error'] === 4 ) {
            $foto = $oldpic;
        } else {
            $foto = upload();
        }
    
        $query = "UPDATE dokter SET
            nama_dokter = '$nama_dokter',
            gender = '$gender',
            no_telp = '$no_telp',
            id_poliklinik = '$id_poliklinik',
            foto = '$foto'
            WHERE id_dokter = $id_dokter   
        "; 
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }

    function hapusdokter ($id_dokter){
        $conn = koneksi();

        // ambil data mahasiswa
        $dokter = query ("SELECT * FROM dokter WHERE id_dokter = $id_dokter")[0];

        // hapus data gambar
        if($dokter['foto'] !== 'nophoto.jpg' ){
            unlink('img/' . $dokter["foto"]);

        }

        mysqli_query($conn, "DELETE FROM dokter WHERE id_dokter = $id_dokter") or die(mysqli_error($conn));

        return mysqli_affected_rows($conn);
    }

    function tambahpasien($data) {
        $conn = koneksi();
        $nama_pasien = htmlspecialchars($data["nama_pasien"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
        $gender = htmlspecialchars($data["gender"]);

        
        $query = 
        "INSERT INTO pasien 
        VALUES (null, 
        '$nama_pasien', 
        '$alamat', 
        '$tgl_lahir', 
        '$gender')";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    
    }
    
    function hapuspasien($id_pasien) {
        $conn = koneksi();
        mysqli_query($conn, "DELETE FROM pasien WHERE id_pasien = $id_pasien") or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }

    function ubahpasien($data) {
        $conn = koneksi();
        $id_pasien = $data["id_pasien"];
        $nama_pasien = htmlspecialchars($data["nama_pasien"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
        $gender = htmlspecialchars($data["gender"]);
    
        $query = "UPDATE pasien SET
            nama_pasien = '$nama_pasien',
            alamat = '$alamat',
            tgl_lahir = '$tgl_lahir',
            gender = '$gender'
            WHERE id_pasien = $id_pasien   
        "; 
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }

    function caripasien($keyword) {
        $query = "SELECT * FROM pasien
                    WHERE
                        id_pasien LIKE '%$keyword%' OR
                        nama_pasien LIKE '%$keyword%' OR
                        alamat LIKE '%$keyword%' OR
                        tgl_lahir LIKE '%$keyword%' OR
                        gender LIKE '%$keyword%'
                ";
        return query($query);
    }
    
    function tambahpoliklinik($data) {
        $conn = koneksi();
        $nama_poliklinik = htmlspecialchars($data["nama_poliklinik"]);

        
        $query = 
        "INSERT INTO poliklinik 
        VALUES (null, 
        '$nama_poliklinik')";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    
    }
    function ubahpoliklinik($data) {
        $conn = koneksi();
        $id_poliklinik = $data["id_poliklinik"];
        $nama_poliklinik = htmlspecialchars($data["nama_poliklinik"]);
    
        $query = "UPDATE poliklinik SET
            nama_poliklinik = '$nama_poliklinik'
            WHERE id_poliklinik = $id_poliklinik   
        "; 
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }

    function hapuspoliklinik($id_poliklinik) {
        $conn = koneksi();
        mysqli_query($conn, "DELETE FROM poliklinik WHERE id_poliklinik = $id_poliklinik") or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }

    function caripoliklinik($keyword) {
        $query = "SELECT * FROM poliklinik
                    WHERE
                        id_poliklinik LIKE '%$keyword%' OR
                        nama_poliklinik LIKE '%$keyword%'
                ";
        return query($query);
    }

    function tambahrekmed($data) {
        $conn = koneksi();
        $id_dokter = htmlspecialchars($data["id_dokter"]);
        $id_pasien = htmlspecialchars($data["id_pasien"]);
        $id_poliklinik = htmlspecialchars($data["id_poliklinik"]);
        // $id_jadwal = htmlspecialchars($data["id_jadwal"]);
        $riwayat_penyakit = htmlspecialchars($data["riwayat_penyakit"]);
        $keluhan = htmlspecialchars($data["keluhan"]);
        $diagnosa = htmlspecialchars($data["diagnosa"]);
        $hasil_pemeriksaan = htmlspecialchars($data["hasil_pemeriksaan"]);
        $tgl_input = date('Y-m-d H:i:s');

        $query = "INSERT INTO rekam_medis SET id_dokter='$id_dokter',id_pasien='$id_pasien',id_poliklinik='$id_poliklinik',riwayat_penyakit='$riwayat_penyakit', keluhan='$keluhan', diagnosa='$diagnosa', hasil_pemeriksaan='$hasil_pemeriksaan', tgl_input='$tgl_input'";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    
    }

    function ubahrekmed($data) {
        $conn = koneksi();
        $id_rekmed = $data["id_rekmed"];
        $id_dokter = htmlspecialchars($data["id_dokter"]);
        $id_pasien = htmlspecialchars($data["id_pasien"]);
        $id_poliklinik = htmlspecialchars($data["id_poliklinik"]);
        $riwayat_penyakit = htmlspecialchars($data["riwayat_penyakit"]);
        $keluhan = htmlspecialchars($data["keluhan"]);
        $diagnosa = htmlspecialchars($data["diagnosa"]);
        $hasil_pemeriksaan = htmlspecialchars($data["hasil_pemeriksaan"]);
        $tgl_input = date('Y-m-d H:i:s');
    
        $query = "UPDATE rekam_medis SET
            id_dokter = '$id_dokter',
            id_pasien = '$id_pasien',
            id_poliklinik = '$id_poliklinik',
            riwayat_penyakit = '$riwayat_penyakit',
            keluhan = '$keluhan',
            diagnosa = '$diagnosa',
            hasil_pemeriksaan = '$hasil_pemeriksaan',
            tgl_input = '$tgl_input'
            WHERE id_rekmed = $id_rekmed   
        "; 
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }

    function hapusrekmed($id_rekmed) {
        $conn = koneksi();
        mysqli_query($conn, "DELETE FROM rekam_medis WHERE id_rekmed = $id_rekmed") or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }

    function carirekmed($keyword) {
        $query = "SELECT * FROM rekam_medis
                    WHERE
                        id_rekmed LIKE '%$keyword%' OR
                        id_dokter LIKE '%$keyword%' OR
                        id_poliklinik LIKE '%$keyword%' OR
                        -- id_jadwal LIKE '%$keyword%' OR
                        riwayat_penyakit LIKE '%$keyword%' OR
                        keluhan LIKE '%$keyword%' OR
                        diagnosa LIKE '%$keyword%' OR
                        hasil_pemeriksaan LIKE '%$keyword%' OR
                        tgl_input LIKE '%$keyword%'
                ";
        return query($query);
    }

    function cariapp($keyword) {
        $query = "SELECT * FROM appointment
                    WHERE
                        id_app LIKE '%$keyword%' OR
                        nama LIKE '%$keyword%' OR
                        no_telp LIKE '%$keyword%' OR
                        keluhan LIKE '%$keyword%' OR
                        status LIKE '%$keyword%' 
                ";
        return query($query);
    }

    function ubahapp($data) {
        $conn = koneksi();
        $id_app = $data["id_app"];
        $nama = htmlspecialchars($data["nama"]);
        $no_telp = htmlspecialchars($data["no_telp"]);
        $keluhan = htmlspecialchars($data["keluhan"]);
        $status = htmlspecialchars($data["status"]);
    
        $query = "UPDATE appointment SET
            nama = '$nama',
            no_telp = '$no_telp',
            keluhan = '$keluhan',
            status = '$status'
            WHERE id_app = $id_app   
        "; 
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        return mysqli_affected_rows($conn);
    }