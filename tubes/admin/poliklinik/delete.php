<?php
    include '../../koneksi.php';
    $id_poliklinik = $_GET['id_poliklinik'];
    mysqli_query($koneksi,"delete from poliklinik where id_poliklinik='$id_poliklinik'");
?>
<script>
	window.location.href="poliklinik.php";
</script>