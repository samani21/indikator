<?php
include "header.php";

include '../../asset/koneksi/koneksi.php';
 
$nama_dokumen='RUANGAN ANAK';
ob_start();

    $query    =mysqli_query($koneksi, "SELECT * FROM tb_pengukuran WHERE indikator LIKE 'Waktu pelayanan puskesmas dan kepuasan pelanggan'");
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
                                $query= mysqli_query($koneksi,"SELECT DISTINCT(bulan) FROM tb_pengukuran WHERE indikator LIKE 'Waktu pelayanan puskesmas dan kepuasan pelanggan'");
                                while ($da = mysqli_fetch_array($query)){
                            ?>
                                <li><a class="dropdown-item" href="../cetakpdf/waktu_pelayanan.php?bulan=<?php echo $da['bulan'];?>"><?php echo $da['bulan'];?></a></li>
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
                    <td align="center" rowspan="2">JUMLAH KUNJUNGAN PASIEN</td>
                    <td align="center" colspan="2">WAKTU PELAKSANAAN PUSEKSMAS</td>
                    <td align="center" colspan="2">TINGKAT KEPUASAN PASIEN YANG BERKUNJUNG</td>
                    <td align="center" colspan="2">PENCAPAIAN</td>
                    <td align="center" rowspan="2">AKSI</td>
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
                    $ambilData = mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran` WHERE indikator LIKE 'Waktu pelayanan puskesmas dan kepuasan pelanggan'");
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
                   
                    <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_pengukuran` WHERE indikator LIKE 'Waktu pelayanan puskesmas dan kepuasan pelanggan'");
                        
                        while($dt=mysqli_fetch_array($data) ){
                    ?>
                    <tr>
                    <td><?php echo $dt['tanggal']?> <?php echo $dt['bulan']?> <?php echo $dt['tahun']?></td>
                    <td align="center"><?php echo $dt['data_1']?></td>
                    <td align="center"><?php echo $dt['data_2']?></td>
                    <td align="center"><?php echo $dt['data_3']?></td>
                    <td align="center"><?php echo $dt['data_4']?></td>
                    <td align="center" ><?php echo $dt['data_5']?></td>
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
  