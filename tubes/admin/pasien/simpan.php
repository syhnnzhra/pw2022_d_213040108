<html>
<body>
<?php
    include '../../koneksi.php';
    $nama_pasien=$_POST['nama_pasien'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $tgl_lahir=$_POST['tgl_lahir'];
    $sql = "INSERT INTO pasien( nama_pasien, alamat, gender, tgl_lahir ) 
        VALUES( '$nama_pasien', '$alamat', '$gender', '$tgl_lahir' );";
  
    if (mysqli_query($koneksi, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
    
    mysqli_close($koneksi);
?>
<script type="text/javascript">
	window.location="pasien.php";
</script>