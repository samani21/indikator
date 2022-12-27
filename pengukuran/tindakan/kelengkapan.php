<?php
include "header.php";

include '../../asset/koneksi/koneksi.php';
 
$nama_dokumen='RUANGAN ANAK';
ob_start();

?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Data ruang tindakan
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
                                $query= mysqli_query($koneksi,"SELECT DISTINCT(bulan),tahun FROM tb_pengukuran WHERE indikator LIKE 'kelengkapan tindakan'");
                                while ($da = mysqli_fetch_array($query)){
                            ?>
                                <li><a class="dropdown-item" href="../cetakpdf/kelengkapan.php?bulan=<?php echo $da['bulan'];?>&tahun=<?php echo $da['tahun']?>"><?php echo $da['bulan'];?> <?php echo $da['tahun']?></a></li>
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
                    <td align="center">KETERSEDIAAN OBAT EMERGENCY DI RUANG TINDAKAN</td>
                    <td align="center">KETERSEDIAAN PETUGAS KHUSUS YANG BERTUGAS DI R. TINDAKAN</td>
                    <td align="center">JUMLAH PASIEN YANG BERKUNJUNG</td>
                    <td align="center">PENCAPAIAN PERHARI</td>
                    <td align="center">AKSI</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $ambilData = mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran`WHERE indikator LIKE 'kelengkapan tindakan' ");
                    $data = mysqli_fetch_array($ambilData)
                    ?>
                    <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>" data-title="Indikator">
                        <b>1.Kelengkapan Obat Emergency di ruang tindakan</b>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b>2.Ketersediaan Petugas khusus yang bertugas di ruang tindakan</b>
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
                        <b>100%</b>
                    </td>
                   
                    <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_pengukuran` WHERE indikator LIKE 'kelengkapan tindakan'");
                        
                        while($dt=mysqli_fetch_array($data) ){
                    ?>
                    <tr>
                    <td data-title="Tanggal"><?php echo $dt['tanggal']?> <?php echo $dt['bulan']?> <?php echo $dt['tahun']?></td>
                    <td align="center" data-title="Pasien Nunggu"><?php echo $dt['data_1']?></td>
                    <td align="center" data-title="Pasien Berkunjung"><?php echo $dt['data_2']?></td>
                    <td></td>
                    <td data-title="Pencapaian" align="center">
                        <?php 
                            $jml=($dt['data_1']/$dt['data_2'])*100;  
                            $output = number_format($jml, 2, '.', '');
                            echo "$output";
                        ?>%
                    </td>
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
  