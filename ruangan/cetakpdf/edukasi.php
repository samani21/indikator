<?php
$tahun = $_GET['tahun'];
//Jika download plugin mpdf dengan composer (versi baru)
include '../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
 
//Menggabungkan dengan file koneksi yang telah kita buat
include '../../asset/koneksi/koneksi.php';
 
$nama_dokumen='RUANGAN EDUKASI';
ob_start();
?>
 
<!DOCTYPE html>
<html>
<body>
	<div>
		<h2 align="center">RUANGAN EDUKASI</h2>
        <hr>
 
		<table style="border-collapse:collapse;border-spacing:0;" align="center" border="1">
        <thead>
                        
                        <tr align="center">
                          <th scope="col" rowspan="2">No</th>
                          <th scope="col" rowspan="2">Indikator</th>
                          <th scope="col" rowspan="2" >Target</th>
                          <th scope="col" colspan="12">Capaian</th>
                          <th scope="col" rowspan="2">Rerata</th>
                        </tr>
                        <tr>
                            <th>JAN</th>
                            <th>FEB</th>
                            <th>MAR</th>
                            <th>APR</th>
                            <th>MEi</th>
                            <th>JUN</th>
                            <th>JUL</th>
                            <th>AGT</th>
                            <th>SEP</th>
                            <th>OKT</th>
                            <th>NOV</th>
                            <th>DES</th>
                        </tr>
                      </thead>
                      <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_indikator` WHERE ruangan LIKE 'Ruangan edukasi' AND tahun LIKE '$tahun'");
                        while($dt=mysqli_fetch_array($data)){
                            ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $dt['indikator']?></td>
                        <td><?php echo $dt['target']?>%</td>
                        <td align="center"><font color="<?php if($dt['jan'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['jan'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['jan']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['feb'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['feb'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['feb']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['mar'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['mar'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['mar']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['apr'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['apr'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['apr']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['mei'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['mei'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['mei']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['jun'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['jun'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['jun']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['jul'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['jul'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['jul']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['agt'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['agt'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['agt']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['sep'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['sep'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['sep']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['okt'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['okt'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['okt']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['nov'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['nov'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['nov']; echo '%';
                                } ?></font>
                        </td>
                        <td align="center"><font color="<?php if($dt['des'] < $dt['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($dt['des'] ==''){
                                    echo '';
                                }else{
                                    echo $dt['des']; echo '%';
                                } ?></font>
                        </td>
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