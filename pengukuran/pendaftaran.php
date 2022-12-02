<?php
include "header.php";
?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Data pendaftran dan rekam medis
                </h3>
                <table>
                    <th>
                        <a href="aksi/tambah_pendaftaran.php"class="btn btn-primary" >Tambah Data</a>
                    </th>
                    <th>
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Cetak Excel
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php
                                include "../asset/koneksi/koneksi.php";
                                $query= mysqli_query($koneksi,"SELECT DISTINCT(tahun) FROM tb_indikator");
                                while ($da = mysqli_fetch_array($query)){
                            ?>
                                <li><a class="dropdown-item" href="cetakexcel/pendaftran.php?tahun=<?php echo $da['tahun'];?>"><?php echo $da['tahun'];?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </th>
                    <th>
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Cetak PDF
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <?php
                                include "../asset/koneksi/koneksi.php";
                                $query= mysqli_query($koneksi,"SELECT DISTINCT(bulan) FROM tb_pengukuran");
                                while ($da = mysqli_fetch_array($query)){
                            ?>
                                <li><a class="dropdown-item" href="cetakpdf/pendaftaran.php?bulan=<?php echo $da['bulan'];?>"><?php echo $da['bulan'];?></a></li>
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
                        <tr align="center">
                            <th align="center">INDIKATOR MUTU KLINIS</th>
                            <th align="center">TARGET</th>
                            <th align="center">TANGGAL</th>
                            <th align="center" width="200px">JUMLAH PASIEN YANG MENUNGGU REGISTRASI < 10 MENIT</th>
                            <th align="center" width="200px">JUMLAH PASIEN YANG BERKUNJUNG</th>
                            <th align="center" width="200px">ACTION</th>
                </tr>
                        
                      </thead>
                      <tbody>
            <tr>
                    <?php
                    include "../asset/koneksi/koneksi.php";
                      $data1= mysqli_query($koneksi,"SELECT DISTINCT(indikator),target FROM `tb_pengukuran`WHERE indikator LIKE 'Waktu tunggu registrasi pasien < 10 menit'");
while($d1t=mysqli_fetch_array($data1) ){
                    ?>
                    <td rowspan="100"><?php echo $d1t['indikator']?></td>
                    <td align="center" rowspan="100"><?php echo $d1t['target']?>%</td>
                        <?php } ?>
                </tr>
            <?php
                        include "../asset/koneksi/koneksi.php";
                        $no=1;
                        $data= mysqli_query($koneksi,"SELECT * FROM `tb_pengukuran`");
                        
                        while($dt=mysqli_fetch_array($data) ){
                    ?>
               
                <tr>
                <td><?php echo $dt['tanggal']?> <?php echo $dt['bulan']?> <?php echo $dt['tahun']?></td>
                    <td align="center"><?php echo $dt['data_1']?></td>
                    <td align="center"><?php echo $dt['data_2']?></td>
                    <td data-title="Action" align="center"><a href="aksi/edit_pendaftaran.php?id=<?php echo $dt['id']; ?>"class="btn btn-warning">Edit</a>
                        <a href="aksi/hapus_pendaftaran.php?id=<?php echo $dt['id']; ?>" class="btn btn-danger">Hapus</a></td>
                </tr>
                <tr></tr>
                <?php } ?>
            </tbody>
                  </table>
            </div>
        </div>
      </div>
</body>
</html>
  