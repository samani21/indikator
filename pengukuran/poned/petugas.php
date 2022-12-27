<?php
include "header.php";

include '../../asset/koneksi/koneksi.php';
 
?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Data petugas
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
                                $query= mysqli_query($koneksi,"SELECT DISTINCT(bulan),tahun FROM tb_pengukuran WHERE indikator LIKE 'petugas'");
                                while ($da = mysqli_fetch_array($query)){
                            ?>
                                <li><a class="dropdown-item" href="../cetakpdf/petugas.php?bulan=<?php echo $da['bulan'];?>&tahun=<?php echo $da['tahun']?>"><?php echo $da['bulan'];?> <?php echo $da['tahun']?></a></li>
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
                    <td align="center">Kepatuhan petugas menggunakan APD saat bertugas</td>
                    <td align="center">Kepatuhan petugas terhadap penulisan partograph</td>
                    <td align="center">JUMLAH PASIEN YANG BERKUNJUNG</td>
                    <td align="center">Pencapaian perhari</td>
                    <td align="center">AKsi</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    $ambilData = mysqli_query($koneksi,"SELECT COUNT(tanggal) AS tgl FROM `tb_pengukuran`WHERE indikator LIKE 'petugas' ");
                    $data = mysqli_fetch_array($ambilData)
                    ?>
                    <td rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>" data-title="Indikator">
                        <b>Kepatuhan petugas terhadap penulisan partograph</b>
                    </td>
                    <td align="center" rowspan="<?php $tambah= $data['tgl'] + 1; echo $tambah ?>" data-title="target">
                        <b>90%</b>
                    </td>
                   
                    <?php
                        include "../../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_pengukuran` WHERE indikator LIKE 'petugas'");
                        
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
  