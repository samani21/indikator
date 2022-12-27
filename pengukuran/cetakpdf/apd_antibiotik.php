<?php
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];
//Jika download plugin mpdf dengan composer (versi baru)
include '../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
 
//Menggabungkan dengan file koneksi yang telah kita buat
include '../../asset/koneksi/koneksi.php';
 
$nama_dokumen='RUANGAN APD GIGI DAN MULUT';
ob_start();

    $query    =mysqli_query($koneksi, "SELECT * FROM tb_pengukuran WHERE bulan LIKE '$bulan' AND indikator like 'apd dan antibiotik'AND tahun LIKE '$tahun'");
    while ($data    =mysqli_fetch_array($query)){
        $total1[]    =$data['total1'];
        $data_1[]    =$data['data_1'];
        $data_2[]    =$data['data_2'];
    }
    $total1     =array_sum($total1);
    $data_1     =array_sum($data_1);
    $data_2     =array_sum($data_2);
?>
 
<!DOCTYPE html>
<html>
<body>
	<div>
		<h4 align="center">PENGUMPULAN DATA PENGUKURAN INDIKATOR MUTU LAYANAN KLINIS</h4>
        
        <table>
            <tr>
                <td>BULAN &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</td>
                <td><?php echo $bulan?> <?php echo $tahun?></td>
            </tr>
            <tr>
                <td>RUANGAN &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:</td>
                <td>RUANGAN GIGI DAN MULUT</td>
            </tr>
            <tr>
                <td>PENANGGUNG JAWAB :</td>
            </tr>
        </table>

		<table style="border-collapse:collapse;border-spacing:0;" align="center" border="1">
            <thead>
                <tr>
                    <td align="center">INDIKATOR MUTU KLINIS</td>
                    <td align="center">TARGET</td>
                    <td align="center">TANGGAL</td>
                    <td align="center">Kepatuhan petugas menggunakan APD saat bertugas</td>
                    <td align="center">Pemberian obat antibiotik  pada pasien dengan diagnosis abses gingiva</td>
                    <td align="center">Jumlah pasien yang berkunjung dengan abses gingiva</td>
                    <td align="center">NAMA & TTD PENANGGUNG JAWAB</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $ambilData = mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran` WHERE bulan LIKE '$bulan' and indikator like 'apd dan antibiotik'and tahun LIKE '$tahun'");
                    $data = mysqli_fetch_array($ambilData)
                    ?>
                    <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>">
                        <br>
                        <br>
                        <b>1.Kepatuhan petugas menggunakan APD saat bertugas</b>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b>2.Pemberian obat antibiotik  pada pasien dengan diagnosis abses gingivan</b></td>
                    <td align="center" rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>">
                        <b>100%</b>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b>90%</b>
                    </td>
                  <td height="1"></td>
                  <td height="1"></td>
                  <td height="1"></td>
                  <td height="1"></td>
                        <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>"></td>
                   
                    <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_pengukuran` WHERE bulan LIKE '$bulan'and indikator like 'apd dan antibiotik' and tahun LIKE '$tahun'");
                        
                        while($dt=mysqli_fetch_array($data) ){
                    ?>
                    <tr>
                    <td><?php echo $dt['tanggal']?> <?php echo $dt['bulan']?> <?php echo $dt['tahun']?></td>
                    <td align="center"><?php echo $dt['data_1']?></td>
                    <td align="center"><?php echo $dt['data_2']?></td>
                    
                    </tr>
                  
                    <?php } ?>
                    <tr>
                    <td colspan="3" align="center" >Total</td>
                    <td align="center">
                        <?php 
                            //total
                            $data_1 = $data_1;
                            //Tampilkan
                            echo "$data_1";
                        ?>
                    </td>
                    <td align="center">
                        <?php 
                            //total
                            $data_2 = $data_2;
                            //Tampilkan
                            echo "$data_2";
                        ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">Pencapaian</td>
                    <td align="center">
                        <?php 
                            $ambilData1= mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran` WHERE bulan LIKE '$bulan' and indikator LIKE 'apd dan antibiotik'and tahun LIKE '$tahun'");
                            $bagi = mysqli_fetch_array($ambilData1);
                            //total
                            
                            
                            $total = $total1/$bagi['tgl'];

                            //Tampilkan
                            $output = number_format($total, 2, '.', '');

                            echo "$output";
                        ?>%
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                   
                </tr>
                
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