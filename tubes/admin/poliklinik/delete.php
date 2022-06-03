<?php
    require "../crud.php";
    if(hapuspoliklinik($_GET["id_poliklinik"]) > 0) {
        echo "<script>
        alert('data berhasil dihapus');
        document.location.href = 'poliklinik.php'
        </script>";
    }
?>