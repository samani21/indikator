<?php
include "header.php";
?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Data laboratorium
                </h3>
                <table>
                    <th>
                        <a href="aksi/Tambah_lab.php"class="btn btn-primary" >Tambah Data</a>
                    </th>
                    <th>
                        <a href="cetakexcel/lab.php"class="btn btn-warning" >Cetak Data Excel</a>
                    </th>
                    <th>
                        <a href="cetakpdf/lab.php"class="btn btn-warning" >Cetak Data PDF</a>
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
                          <th scope="col" colspan="4">Capaian</th>
                          <th scope="col" rowspan="2">Rerata</th>
                          <th scope="col" rowspan="2" colspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>JUN</th>
                            <th>JUL</th>
                            <th>AGT</th>
                            <th>SEP</th>
                        </tr>
                      </thead>
                        <?php
                            include "../asset/koneksi/koneksi.php";
                            $no=1;
                            $query= mysqli_query($koneksi,"SELECT * FROM `tb_indikator` WHERE ruangan LIKE 'Ruangan laboratorium'");
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                      <tbody>
                        <tr>
                            <td data-title="No"><?php echo $no++;?></td>
                            <td data-title="Indikator"><?php echo $data['indikator'];?></td>
                            <td data-title="Target"><?php echo $data['target'];?>%</td>
                            <td data-title="Juni"><?php echo $data['jun'];?>%</td>
                            <td data-title="Juli"><?php echo $data['jul'];?>%</td>
                            <td data-title="Agustus"><?php echo $data['agt'];?>%</td>
                            <td data-title="September"><?php echo $data['sep'];?>%</td>
                            <td data-title="Rerata"><?php echo $data['rata'];?>%</td>
                            <td data-title="Action" align="center"><a href="aksi/edit_lab.php?id=<?php echo $data['id']; ?>"class="btn btn-warning">Edit</a>
                        <a href="aksi/hapus_lab.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Hapus</a></td>
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
  