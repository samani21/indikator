<?php
include "header.php";
?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Data persalinan
                </h3>
                <table>
                    <th>
                        <a href="aksi/tambah_persalinan.php"class="btn btn-primary" >Tambah Data</a>
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
                                <li><a class="dropdown-item" href="cetakexcel/persalinan.php?tahun=<?php echo $da['tahun'];?>"><?php echo $da['tahun'];?></a></li>
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
                                $query= mysqli_query($koneksi,"SELECT DISTINCT(tahun) FROM tb_indikator");
                                while ($da = mysqli_fetch_array($query)){
                            ?>
                                <li><a class="dropdown-item" href="cetakpdf/persalinan.php?tahun=<?php echo $da['tahun'];?>"><?php echo $da['tahun'];?></a></li>
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
                          <th scope="col" rowspan="2">No</th>
                          <th scope="col" rowspan="2">Indikator</th>
                          <th scope="col" rowspan="2" >Target</th>
                          <th scope="col" colspan="12">Capaian</th>
                          <th scope="col" rowspan="2">Rerata</th>
                          <th scope="col" rowspan="2" colspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>JAN</th>
                            <th>FEB</th>
                            <th>MAR</th>
                            <th>APR</th>
                            <th>MEi</th>
                            <th>JUN</th>
                            <th>JUL</th>
                            <th>AGT</th>
                            <th>SEP</th>
                            <th>OKT</th>
                            <th>NOV</th>
                            <th>DES</th>
                        </tr>
                      </thead>
                        <?php
                            include "../asset/koneksi/koneksi.php";
                            $no=1;
                            $query= mysqli_query($koneksi,"SELECT * FROM `tb_indikator` WHERE ruangan LIKE 'Ruangan persalinan' ORDER BY tahun DESC");
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                      <tbody>
                        <tr>
                            <td data-title="No"><?php echo $no++;?></td>
                            <td data-title="Indikator"><?php echo $data['indikator'];?></td>
                            <td data-title="Target"><?php echo $data['target'];?>%</td>
                            <td data-title="Januari"><?php echo $data['jan'];?>%</td>
                            <td data-title="Februari"><?php echo $data['feb'];?>%</td>
                            <td data-title="Maret"><?php echo $data['mar'];?>%</td>
                            <td data-title="April"><?php echo $data['apr'];?>%</td>
                            <td data-title="Mei"><?php echo $data['mei'];?>%</td>
                            <td data-title="Juni"><?php echo $data['jun'];?>%</td>
                            <td data-title="Juli"><?php echo $data['jul'];?>%</td>
                            <td data-title="Agustus"><?php echo $data['agt'];?>%</td>
                            <td data-title="September"><?php echo $data['sep'];?>%</td>
                            <td data-title="Oktober"><?php echo $data['okt'];?>%</td>
                            <td data-title="November"><?php echo $data['nov'];?>%</td>
                            <td data-title="Desember"><?php echo $data['des'];?>%</td>
                            <td data-title="Rerata"><?php echo $data['rata'];?>%</td>
                            <td data-title="Action" align="center"><a href="aksi/edit_persalinan.php?id=<?php echo $data['id']; ?>"class="btn btn-warning">Edit</a>
                        <a href="aksi/hapus_persalinan.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Hapus</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                      </tbody>
                  </table>
            </div>
        </div>
      </div>
</body>
</html>
  