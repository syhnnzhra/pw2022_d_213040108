<?php
    include('../crud.php');
    require_once("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $query = query("SELECT * FROM dokter, poliklinik where dokter.id_poliklinik=poliklinik.id_poliklinik");
    $html = '<center><h3>Data Dokter</h3></center><hr/><br/>';
    // var_dump($query);
    $html .= '<table border="1" width="100%">
    <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Gender</th>
    <th>No Telephone</th>
    <th>Poliklinik</th>
    </tr>';
    $no = 1;
    foreach ($query as $row) :
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['nama_dokter']."</td>
    <td>".$row['gender']."</td>
    <td>".$row['no_telp']."</td>
    <td>".$row['nama_poliklinik']."</td>
    </tr>";
    $no++;
    endforeach;
    $html .= "</html>";
    $tes = $dompdf->loadHtml($html);
    // var_dump($tes);
    // Setting ukuran dan orientasi kertas
    $dompdf->setPaper('A4', 'potrait');
    // Rendering dari HTML Ke PDF
    $dompdf->render();
    // Melakukan output file Pdf
    $dompdf->stream('report_dokter.pdf');
?>