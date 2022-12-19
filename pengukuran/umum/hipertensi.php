<?php
include "header.php";

include '../../asset/koneksi/koneksi.php';
 
$nama_dokumen='RUANGAN ANAK';
ob_start();

    $query    =mysqli_query($koneksi, "SELECT * FROM tb_pengukuran where indikator LIKE 'Waktu tunggu pasien rawat jalan'");
    while ($data    =mysqli_fetch_array($query)){
        $total1[]    =$data['total1'];
        $data_1[]    =$data['data_1'];
        $data_2[]    =$data['data_2'];
    }
    $total1     =array_sum($total1);
    $data_1     =array_sum($data_1);
    $data_2     =array_sum($data_2);
?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Data pendaftran dan rekam medis
                </h3>
                <table>
                    <th>
                        <a href="tambahpemeriksaan.php"class="btn btn-primary" >Tambah Data</a>
                    </th>
                    <th>
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Cetak PDF
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php
                                include "../../asset/koneksi/koneksi.php";
                                $query= mysqli_query($koneksi,"SELECT DISTINCT(bulan),tahun FROM tb_pengukuran WHERE indikator LIKE 'Waktu tunggu pasien rawat jalan'");
                                while ($da = mysqli_fetch_array($query)){
                            ?>
                                <li><a class="dropdown-item" href="../cetakpdf/hipertensi.php?bulan=<?php echo $da['bulan'];?>&tahun=<?php echo $da['tahun']?>"><?php echo $da['bulan'];?> <?php echo $da['tahun']?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </th>
                </table>
            </section>
        </div>
        <hr>
        <div class="row">
            <div class="table-responsive" id="no-more-tables">
                <table class="table table-bordered">
                <thead>
                <tr>
                    <td align="center">INDIKATOR MUTU KLINIS</td>
                    <td align="center">TARGET</td>
                    <td align="center">TANGGAL</td>
                    <td align="center">Pemberi Layanan adalah dokter</td>
                    <td align="center">Tingkat kepatuhan SOP Penatalaksanaan Hipertensi dalam 1 bulan</td>
                    <td align="center">Jumlah pasien Hipertensi yang berkunjung</td>
                    <td align="center">Pencapaian perhari</td>
                    <td align="center">AKsi</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $ambilData = mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran`WHERE indikator LIKE 'Waktu tunggu pasien rawat jalan' ");
                    $data = mysqli_fetch_array($ambilData)
                    ?>
                    <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>" data-title="Indikator">
                        <b>1.Pemberi layanan adalah dokter</b>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b>2.Tingkat kepatuhan SOP Penatalaksanaan Hipertensi dalam 1 bulan</b>
                    </td>
                    <td align="center" rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>" data-title="target">
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
                   
                    <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_pengukuran` WHERE indikator LIKE 'Waktu tunggu pasien rawat jalan'");
                        
                        while($dt=mysqli_fetch_array($data) ){
                    ?>
                    <tr>
                    <td data-title="Tanggal"><?php echo $dt['tanggal']?> <?php echo $dt['bulan']?> <?php echo $dt['tahun']?></td>
                    <td align="center" data-title="Pasien Nunggu"><?php echo $dt['data_1']?></td>
                    <td align="center" data-title="Pasien Berkunjung"><?php echo $dt['data_2']?></td>
                    <td data-title="Pencapaian" align="center">
                        <?php 
                            $jml=($dt['data_1']/$dt['data_2'])*100;  
                            $output = number_format($jml, 2, '.', '');
                            echo "$output";
                        ?>%
                    </td>
                    <td></td>
                    <td data-title="Action" align="center"><a href="edit_pemeriksaan.php?id=<?php echo $dt['id']; ?>"class="btn btn-warning">Edit</a>
                        <a href="hapus_pemeriksaan.php?id=<?php echo $dt['id']; ?>" class="btn btn-danger">Hapus</a></td>
                    
                    </tr>
                  
                    <?php } ?>
                   
                
            </tbody>
                  </table>
            </div>
        </div>
      </div>
</body>
</html>
  