<?php
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];
//Jika download plugin mpdf dengan composer (versi baru)
include '../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
 
//Menggabungkan dengan file koneksi yang telah kita buat
include '../../asset/koneksi/koneksi.php';
 
$nama_dokumen='RUANGAN ANAK';
ob_start();

    $query    =mysqli_query($koneksi, "SELECT * FROM tb_pengukuran WHERE bulan LIKE '$bulan' and indikator like 'Waktu pelayanan puskesmas dan kepuasan pelanggan' AND tahun LIKE '$tahun'");
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
                <td><?php echo $bulan ?> <?php echo $tahun ?></td>
            </tr>
            <tr>
                <td>RUANGAN &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:</td>
                <td>RUANGAN PENDAFTARAN DAN REKAM MEDIS</td>
            </tr>
            <tr>
                <td>PENANGGUNG JAWAB :</td>
            </tr>
        </table>

		<table style="border-collapse:collapse;border-spacing:0;" align="center" border="1">
            <thead>
                <tr>
                    <td align="center" rowspan="2">INDIKATOR MUTU KLINIS</td>
                    <td align="center" rowspan="2">TARGET</td>
                    <td align="center" rowspan="2">TANGGAL</td>
                    <td align="center" rowspan="2">JUMLAH KUNJUNGAN PASIEN</th>
                    <td align="center" colspan="2">WAKTU PELAKSANAAN PUSEKSMAS</th>
                    <td align="center" colspan="2">TINGKAT KEPUASAN PASIEN YANG BERKUNJUNG</th>
                    <td align="center" rowspan="2">NAMA & TTD PENANGGUNG JAWAB</td>
                </tr>
                <tr>
                    <td >JAM BUKA</td>
                    <td>JAM BUKA</td>
                    <td>PUAS</td>
                    <td>TIDAK PUAS</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $ambilData = mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran` WHERE bulan LIKE '$bulan' AND tahun LIKE '$tahun' and indikator LIKE 'Waktu pelayanan puskesmas dan kepuasan pelanggan'");
                    $data = mysqli_fetch_array($ambilData)
                    ?>
                    <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>">
                    <b>1.Waktu pelayanan puskesmas</b>
                    <br>
                    a. Senin- Kamis(08.00-12.00)WITA
                    <br>
                    b. Jum'ani(08.00-10.00)WITA
                    <br>
                    c. Jum'ani(08.00-11.30)WITA
                    <br>
                    <br>
                    <br>
                    <b>2.kepuasan Pelanggan</b>
                </td>
                    <td align="center" rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>">
                    100% 
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>100%
                </td>
                  <td height="1"></td>
                  <td height="1"></td>
                  <td height="1"></td>
                  <td height="1"></td>
                  <td height="1"></td>
                  <td height="1"></td>
                        <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>"></td>
                   
                    <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_pengukuran` WHERE bulan LIKE '$bulan' AND tahun LIKE '$tahun' and indikator LIKE 'Waktu pelayanan puskesmas dan kepuasan pelanggan'");
                        
                        while($dt=mysqli_fetch_array($data) ){
                    ?>
                    <tr>
                    <td><?php echo $dt['tanggal']?> <?php echo $dt['bulan']?> <?php echo $dt['tahun']?></td>
                    <td align="center"><?php echo $dt['data_1']?></td>
                    <td align="center"><?php echo $dt['data_2']?></td>
                    <td align="center"><?php echo $dt['data_3']?></td>
                    <td align="center"><?php echo $dt['data_4']?></td>
                    <td align="center"><?php echo $dt['data_5']?></td>
                    
                    </tr>
                  
                    <?php } ?>
                    <tr>
                    <td colspan="3" align="center" >Total</td>
                    <td align="center" colspan="6" >
                        <?php 
                            //total
                            $data_1 = $data_1;
                            //Tampilkan
                            echo "$data_1";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">Pencapaian</td>
                    <td align="center" colspan="6" >
                        <?php 
                            $ambilData1= mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran` WHERE bulan LIKE '$bulan' AND tahun LIKE '$tahun'and indikator like 'Waktu pelayanan puskesmas dan kepuasan pelanggan'");
                            $bagi = mysqli_fetch_array($ambilData1);
                            //total
                            
                            
                            $total = $total1/$bagi['tgl'];

                            //Tampilkan
                            $output = number_format($total, 2, '.', '');

                            echo "$output";
                        ?>%
                    </td>
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