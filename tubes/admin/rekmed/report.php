<?php
    include('../crud.php');
    require_once("../dompdf/autoload.inc.php");
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();
    $query = query("SELECT * FROM rekam_medis, dokter, pasien, poliklinik WHERE rekam_medis.id_dokter=dokter.id_dokter AND rekam_medis.id_pasien=pasien.id_pasien AND rekam_medis.id_poliklinik=poliklinik.id_poliklinik");
    $html = '<center><h3>Data Rekam Medis</h3></center><hr/><br/>';
    // foreach($query as $row):
    // $row= ['nama_poliklinik'];
    // endforeach;
    // var_dump($row);
    $html .= '<table border="1" width="100%">
    <tr>
    <th>No</th>
    <th>Nama Dokter</th>
    <th>Nama Pasien</th>
    <th>Poliklinik</th>
    <th>Riwayat Penyakit</th>
    <th>Keluhan</th>
    <th>Diagnosa</th>
    <th>Hasil Pemeriksaan</th>
    <th>Tanggal Input</th>
    </tr>';
    $no = 1;
    foreach ($query as $row) :
    $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['nama_dokter']."</td>
    <td>".$row['nama_pasien']."</td>
    <td>".$row['nama_poliklinik']."</td>
    <td>".$row['riwayat_penyakit']."</td>
    <td>".$row['keluhan']."</td>
    <td>".$row['diagnosa']."</td>
    <td>".$row['hasil_pemeriksaan']."</td>
    <td>".$row['tgl_input']."</td>
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
    $dompdf->stream('report_rekam_medis.pdf');
?>