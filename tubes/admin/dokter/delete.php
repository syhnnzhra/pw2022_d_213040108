<?php
    include '../../koneksi.php';
    $id_dokter = $_GET['id_dokter'];
    mysqli_query($koneksi,"delete from dokter where id_dokter='$id_dokter'");
?>
<script>
	window.location.href="dokter.php";
</script>