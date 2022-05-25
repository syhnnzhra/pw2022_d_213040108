<?php
    include('../../koneksi.php');
    $nama_poliklinik=$_POST['nama_poliklinik'];
    $sql = "INSERT INTO poliklinik (nama_poliklinik)
    VALUES ('$nama_poliklinik')";

    if ($koneksi->query($sql) === TRUE) {
    // echo "New record created successfully";
    } else {
    // echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
?>
<script type="text/javascript">
	window.location="poliklinik.php";
</script>