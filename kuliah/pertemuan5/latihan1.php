<?php
    // Pertemuan 5 array
    // Array adalah sebuah variable yang dapat menyimpan banyak nilai sekaligus

    // membuat array
    $hari = ['senin', 'selasa', 'rabu', 'kamis']; //cara lama
    $bulan = array('Januari', 'Februari', 'Maret');

    // mencetak array
    // menggunakan index
    echo $hari[0];
    echo "<br>";
    echo $bulan[2];
    echo "<br>";
    echo "<hr>";

    // menggunakan var_dump() atau print_r()
    // hanya untuk debugging
    var_dump($hari);
    echo "<br>";
    print_r($bulan);
    echo "<hr>";

    // mencetak untuk user
    // menggunakan looping 
    for($i=0; $i < count($hari); $i++){
        echo $hari[$i];
        echo "<br>";
    }
    echo "<hr>";
    
    // menggunakan foreach 
    // pengulangan khusus Array 
    foreach($bulan as $b){
        echo $b;
        echo "<br>";
    }
    echo "<hr>";
    
    // memanipulasi array 
    // menambah 1 elemen di akhir
    $hari[] = "jumat";
    $hari[] = "sabtu";
    print_r($hari);
    echo "<br>";
    $bulan[] = "April";
    $bulan[] = "Mei";
    print_r($bulan);
    echo "<hr>";
    
    // array
    // variabel yang dapat memiliki banyak data
    // elemen pada array boleh memiliki tipe data yang berbeda
    // pasangan key dan value
    // key-nya adalah index, yang dimulai dari 0
    
    // membuat array
    // cara lama
    $hari = array("Senin", "Selasa", "Rabu");
    // cara baru
    $bulan = ["Januari", "Februari", "Maret"];
    $arr1 = [123, "tulisan", false];
    echo "<hr>";
    
    // Menampilkan Array
    // var_dump() / print_r()
    // var_dump($hari);
    // echo "<br>";
    // print_r($bulan);
    // echo "<br>";

    // Menampilkan 1 elemen pada array
    // echo $arr1[0];
    // echo "<br>";
    // echo $bulan[1];
    
    // menambahkan elemen baru pada array
    var_dump($hari);
    $hari[] = "Kamis";
    echo "<br>";
    var_dump($hari);
?>
