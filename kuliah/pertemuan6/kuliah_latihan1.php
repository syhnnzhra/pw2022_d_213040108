<?php
    // array associative
    // array yang key-nya ber-asosiasi / berpasangan dengan string
    $mahasiswa = [
        [
            "nama"=> "Syahnan", 
            "npm"=> "213040108", 
            "email"=> "syhnnzhra@gmail.com", 
            "jurusan" => "Teknik Informatika"
        ], 
        [
            "nama"=> "Barra", 
            "npm"=> "213040013", 
            "email"=> "barragaming@gmail.com", 
            "jurusan" => "Teknik Informatika"
        ],
        [
            "nama"=> "Aulia", 
            "npm"=> "214010000", 
            "email"=> "azulmii@gmail.com", 
            "jurusan" => "Design Komunikasi Visual"
        ]
    ];
    // var_dump($mahasiswa[2]["email"]);
?>
<html>
    <?php foreach ($mahasiswa as $mhs){ ?>
        <ul>
            <li> Nama : <?php echo $mhs["nama"]; ?></li>
            <li> NRP : <?php echo $mhs["npm"]; ?></li>
            <li> Email : <?php echo $mhs["email"]; ?></li>
            <li> Prodi : <?php echo $mhs["jurusan"]; ?></li>
        </ul>
    <?php }    ?>
</html>