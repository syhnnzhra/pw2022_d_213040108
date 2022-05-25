<?php
    include('../../koneksi.php');
    $nama_dokter=$_POST['nama_dokter'];
    $gender=$_POST['gender'];
    $no_telp=$_POST['no_telp'];
    $id_poliklinik=$_POST['id_poliklinik'];
    $foto=$_POST['foto'];
    
    

    $sql = "INSERT INTO dokter (nama_dokter, gender, no_telp, id_poliklinik, foto)
    VALUES ('$nama_dokter', '$gender', '$no_telp', '$id_poliklinik', '$foto')";

    if ($koneksi->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
    // mysqli_query($koneksi , $query) or die(mysqli_error($koneksi));
    // var_dump($query);
    // echo "Data tersimpan";
?>
<!-- <script type="text/javascript">
	window.location="pasien.php";
</script> -->