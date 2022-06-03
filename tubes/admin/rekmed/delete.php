<?php
    require "../crud.php";
    if(hapusrekmed($_GET["id_rekmed"]) > 0) {
        echo "<script>
        alert('data berhasil dihapus');
        document.location.href = 'rekmed.php'
        </script>";
    }
?>