<?php
    // representasi data mahasiswa
    $mahasiswa = [
        ["Syahnan", "213040108", "syhnnzhra@gmail.com", "Teknik Informatika"], 
        ["Barra", "213040013", "barragaming@gmail.com", "Teknik Informatika"],
        ["Aulia", "214010000", "azulmii@gmail.com", "Design Komunikasi Visual"]
    ];
?>

<html>
    <?php foreach ($mahasiswa as $mhs){ ?>
        <ul>
            <li> Nama : <?php echo $mhs[0]; ?></li>
            <li> NRP : <?php echo $mhs[1]; ?></li>
            <li> Email : <?php echo $mhs[2]; ?></li>
            <li> Prodi : <?php echo $mhs[3]; ?></li>
        </ul>
    <?php }    ?>
</html>

