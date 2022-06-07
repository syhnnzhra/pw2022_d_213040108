<?php 
    require '../functions.php';

    $keyword = $_GET["keyword"];

    $query = "SELECT * FROM dokter, poliklinik WHERE nama_dokter LIKE '%$keyword%' OR nama_poliklinik LIKE '%$keyword%' AND dokter.id_poliklinik=poliklinik.id_poliklinik";
    $dokter = query($query);
    // var_dump($a);
?>
<div class="row">
    <?php foreach( $dokter as $a ) : ?>
    <div class="col-sm-3 mb-3">
        <div class="card">
            <img src="../admin/dokter/img/<?= $a["foto"] ?>" height="200px" width="200px" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title"><?php echo $a ['nama_dokter'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $a ['nama_poliklinik'];?></h6>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
    <?php
        endforeach;
    ?>
</div>