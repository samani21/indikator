<?php

//Jika download plugin mpdf dengan composer (versi baru)
include '../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
 
//Menggabungkan dengan file koneksi yang telah kita buat
include '../../asset/koneksi/koneksi.php';
 
$nama_dokumen='RUANGAN LABORATORIUM';
ob_start();
?>
 
<!DOCTYPE html>
<html>
<body>
	<div>
		<h2 align="center">RUANGAN LABORATORIUM</h2>
        <hr>
 
		<table style="border-collapse:collapse;border-spacing:0;" align="center" border="1">
        <thead>
                        
                        <tr align="center">
                          <th scope="col" rowspan="2">No</th>
                          <th scope="col" rowspan="2">Indikator</th>
                          <th scope="col" rowspan="2" >Target</th>
                          <th scope="col" colspan="4">Capaian</th>
                          <th scope="col" rowspan="2">Rerata</th>
                        </tr>
                        <tr>
                            <th>JUN</th>
                            <th>JUL</th>
                            <th>AGT</th>
                            <th>SEP</th>
                        </tr>
                      </thead>
                      <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_indikator` WHERE ruangan LIKE 'Ruangan laboratorium'");
                        while($dt=mysqli_fetch_array($data)){
                            ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $dt['indikator']?></td>
                        <td><?php echo $dt['target']?>%</td>
                        <td><?php echo $dt['jun']?>%</td>
                        <td><?php echo $dt['jul']?>%</td>
                        <td><?php echo $dt['agt']?>%</td>
                        <td><?php echo $dt['sep']?>%</td>
                        <td><?php echo $dt['rata']?>%</td>
                      </tr>
                          <?php
                          }
                          ?>
	    	</tbody>
	    </table>
 
    </div>
 
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
 
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output("".$nama_dokumen.".pdf" ,'I');
$db1->close();
?>