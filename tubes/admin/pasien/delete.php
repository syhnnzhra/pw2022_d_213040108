<?php
    include '../../koneksi.php';
    $id_pasien = $_GET['id_pasien'];
    mysqli_query($koneksi,"delete from pasien where id_pasien='$id_pasien'");
?>
<script>
	window.location.href="pasien.php";
</script>