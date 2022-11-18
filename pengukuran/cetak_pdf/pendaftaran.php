<?php
$tahun = $_GET['tahun'];
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
                    <td align="center">NAMA & TTD PENANGGUNG JAWAB</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="5">Waktu tunggu registrasi pasien < 10 menit</td>
                    <td align="center" rowspan="5">90%</td>
                    <td>ada</td>
                    <td rowspan="5"></td>
                    <td rowspan="5"></td>
                </tr>
                <tr>
                    <td>1 asdas 22</td>
                </tr>
                <tr>
                    <td>1 asdas 22</td>
                </tr>
                <tr>
                    <td>1 asdas 22</td>
                </tr>
                <tr>
                    <td>1 asdas 22</td>
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