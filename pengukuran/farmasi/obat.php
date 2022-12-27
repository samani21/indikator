<?php
include "header.php";

include '../../asset/koneksi/koneksi.php';
 
$nama_dokumen='RUANGAN REKAM MEDIS';
ob_start();

?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Data pendaftran dan rekam medis
                </h3>
                <table>
                    <th>
                        <a href="tambahpelayanan.php"class="btn btn-primary" >Tambah Data</a>
                    </th>
                    <th>
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Cetak PDF
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php
                                include "../../asset/koneksi/koneksi.php";
                                $query= mysqli_query($koneksi,"SELECT DISTINCT(bulan),tahun FROM tb_pengukuran WHERE indikator LIKE 'obat'");
                                while ($da = mysqli_fetch_array($query)){
                            ?>
                                <li><a class="dropdown-item" href="../cetakpdf/obat.php?bulan=<?php echo $da['bulan'];?>&tahun=<?php echo $da['tahun']?>"><?php echo $da['bulan'];?> <?php echo $da['tahun']?></a></li>
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
                    <td align="center" rowspan="2">INDIKATOR MUTU KLINIS</td>
                    <td align="center" rowspan="2">TARGET</td>
                    <td align="center" rowspan="2">TANGGAL</td>
                    <td align="center" colspan="2">Rerata waktu pelayanan obat</td>
                    <td align="center" rowspan="2">Tidak terjadinya kesalahan pemberian obat kepada pasien</td>
                    <td align="center" rowspan="2">PENCAPAIAN</td>
                    <td align="center" rowspan="2">AKSI</td>
                </tr>
                <tr>
                    <td >Obat jadi</td>
                    <td>Obat racikan</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $ambilData = mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran` WHERE indikator LIKE 'obat'");
                    $data = mysqli_fetch_array($ambilData)
                    ?>
                    <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>" data-title="indikator">
                    <b>1.Waktu Pelayanan Obat</b>
                    <br>
                   <b> a.Obat jadi 10 menit</b>
                    <br>
                   <b> b.Racikan 15 menit</b>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b>2.Tidak terjadinya kesalahan pemberian obat kepada pasien</b>
                </td>
                    <td align="center" rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>" data-title="Target">
                    90% 
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>90%
                </td>
                   
                    <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_pengukuran` WHERE indikator LIKE 'obat'");
                        
                        while($dt=mysqli_fetch_array($data) ){
                    ?>
                    <tr>
                    <td data-title="Tanggal"><?php echo $dt['tanggal']?> <?php echo $dt['bulan']?> <?php echo $dt['tahun']?></td>
                    <td align="center" data-title="Jumlah kunjungan"><?php echo $dt['data_1']?></td>
                    <td align="center" data-title="Jam buka"><?php echo $dt['data_2']?></td>
                    <td align="center" data-title="Jam tutup"><?php echo $dt['data_3']?></td>
                    <td data-title="Pencapaian" align="center">
                        <?php 
                            $jml=(($dt['data_1']-$dt['data_5'])/$dt['data_1'])*100;  
                            $output = number_format($jml, 2, '.', '');
                            echo "$output";
                        ?>%
                    </td>
                    <td data-title="Action" align="center"><a href="edit_pelayanan.php?id=<?php echo $dt['id']; ?>"class="btn btn-warning">Edit</a>
                        <a href="hapus_pelayanan.php?id=<?php echo $dt['id']; ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                  
                    <?php } ?>
                    <tr>
                
            </tbody>
            
                  </table>
            </div>
        </div>
      </div>
</body>
</html>
  