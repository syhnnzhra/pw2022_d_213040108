<?php
    // pertemuan 2, belajar mengenai sintaks php

    // echo untuk mencetak nilai ke layar
    echo (1+2)*3/4;
    echo "<hr>";

    // OPERATOR
    // Aritmatika
    // +, -, *, /, %
    echo 5%2;
    echo "<hr>";
    $x = 1;
    $y = 2;
    $z = $x+$y;
    echo $z;
    echo "<hr>";

    // Perbandingan
    // <, >, <=, >=, ==, !=
    echo 10 != 20; //true: 0, false=null
    echo '<hr>';

    // variable
    // Tempat menampung nilai
    // Tidak boleh melupakan spasi
    // boleh mengandung angka di awal seperti "$1nama"
    // snake_case : $nama_depan_mahasiswa
    // camel_case : namaDepanMahasiswa
    // kebab-case : nama-depan-mahasiswa
    $nama = "Syahnan";
    echo "<hr>";

    //Penugasan/Assigment
    //=, +=, -=, *=, /=, %=
    $a = 10;
    $a += 20;
    $a += 30;
    echo $a;
    echo "<hr>";

    // increment & decrements
    // ++, --
    $b = 10;
    echo $b++;
    echo "<br>";
    echo $b--;
    echo "<hr>";

    // identitas ===, !== (menyocokan tipe data)
    echo 10 === "10"; 
    // hasilnya false

    // note
    // hr = horizontal line
?>