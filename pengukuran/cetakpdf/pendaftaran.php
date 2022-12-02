<?php
$bulan = $_GET['bulan'];
//Jika download plugin mpdf dengan composer (versi baru)
include '../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
 
//Menggabungkan dengan file koneksi yang telah kita buat
include '../../asset/koneksi/koneksi.php';
 
$nama_dokumen='RUANGAN ANAK';
ob_start();
?>
 
<!DOCTYPE html>
<html>
<body>
	<div>
		<h4 align="center">PENGUMPULAN DATA PENGUKURAN INDIKATOR MUTU LAYANAN KLINIS</h4>
        
        <table>
            <tr>
                <td>BULAN &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</td>
                <td>JANUARI 2022</td>
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
                    <td align="center">INDIKATOR MUTU KLINIS</td>
                    <td align="center">TARGET</td>
                    <td align="center">TANGGAL</td>
                    <td align="center">JUMLAH PASIEN YANG MENUNGGU REGISTRASI < 10 MENIT</th>
                    <td align="center">JUMLAH PASIEN YANG BERKUNJUNG</th>
                    <td align="center">NAMA & TTD PENANGGUNG JAWAB</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $ambilData = mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran` WHERE bulan LIKE '$bulan'");
                    $data = mysqli_fetch_array($ambilData)
                    ?>
                    <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>">Waktu tunggu registrasi pasien < 10 menit</td>
                    <td align="center" rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>">90%</td>
                  <td></td>
                  <td></td>
                  <td></td>
                        <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>"></td>
                   
                    <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_pengukuran` WHERE bulan LIKE '$bulan'");
                        
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
                    <td>
                    <?php 
                    $query    =mysqli_query($koneksi, "SELECT * FROM tb_pengukuran WHERE bulan LIKE '$bulan'");
                    while ($data    =mysqli_fetch_array($query)){
                        // looping atribut jumlah dan harga
                        $data_1[]    =$data['data_1'];
                        $data_2[]   =$data['data_2'];
                    }

                    $ambilData1= mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran` WHERE bulan LIKE '$bulan'");
                    $data5 = mysqli_fetch_array($ambilData1);
                    //total
                    $data1     =array_sum($data_1);
                    $data2     =array_sum($data_2);
                    
                    $total = $data1;

                    //Tampilkan
                    echo "Jumlah barang    =$total<br>";?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" align="center">Pencapaian</td>
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