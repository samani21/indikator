<?php
include "header.php";
?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Data anak
                </h3>
                <table>
                    <th>
                        <a href="aksi/tambah_anak.php"class="btn btn-primary" >Tambah Data</a>
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
                                <li><a class="dropdown-item" href="cetakexcel/anak.php?tahun=<?php echo $da['tahun'];?>"><?php echo $da['tahun'];?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
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
                                <li><a class="dropdown-item" href="cetakpdf/anak.php?tahun=<?php echo $da['tahun'];?>"><?php echo $da['tahun'];?></a></li>
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
                            $query= mysqli_query($koneksi,"SELECT * FROM `tb_indikator` WHERE ruangan LIKE 'Ruangan anak' ORDER BY tahun DESC");
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                      <tbody>
                        <tr>
                            <td data-title="No"><?php echo $no++;?></td>
                            <td data-title="Indikator"><?php echo $data['indikator'];?></td>
                            <td data-title="Target"><?php echo $data['target'];?>%</td>
                            <td data-title="Januari"><font color="<?php if($data['jan'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['jan'] ==''){
                                    echo '';
                                }else{
                                    echo $data['jan']; echo '%';
                                } ?></font></td>
                            <td data-title="Februari"><font color="<?php if($data['feb'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['feb'] ==''){
                                    echo '';
                                }else{
                                    echo $data['feb']; echo '%';
                                } ?></font></td>
                            <td data-title="Maret"><font color="<?php if($data['mar'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['mar'] ==''){
                                    echo '';
                                }else{
                                    echo $data['mar']; echo '%';
                                } ?></font></td>
                            <td data-title="April"><font color="<?php if($data['apr'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['apr'] ==''){
                                    echo '';
                                }else{
                                    echo $data['apr']; echo '%';
                                } ?></font></td>
                            <td data-title="Mei"><font color="<?php if($data['mei'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['mei'] ==''){
                                    echo '';
                                }else{
                                    echo $data['mei']; echo '%';
                                } ?></font></td>
                            <td data-title="Juni"><font color="<?php if($data['jun'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['jun'] ==''){
                                    echo '';
                                }else{
                                    echo $data['jun']; echo '%';
                                } ?></font></td>
                            <td data-title="Juli"><font color="<?php if($data['jul'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['jul'] ==''){
                                    echo '';
                                }else{
                                    echo $data['jul']; echo '%';
                                } ?></font></td>
                            <td data-title="Agustus"><font color="<?php if($data['agt'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['agt'] ==''){
                                    echo '';
                                }else{
                                    echo $data['agt']; echo '%';
                                } ?></font></td>
                            <td data-title="September"><font color="<?php if($data['sep'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['sep'] ==''){
                                    echo '';
                                }else{
                                    echo $data['sep']; echo '%';
                                } ?></font></td>
                            <td data-title="Oktober"><font color="<?php if($data['okt'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['okt'] ==''){
                                    echo '';
                                }else{
                                    echo $data['okt']; echo '%';
                                } ?></font></td>
                            <td data-title="November"><font color="<?php if($data['nov'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php if($data['nov'] ==''){
                                    echo '';
                                }else{
                                    echo $data['nov']; echo '%';
                                } ?></font></td>
                            <td data-title="Desember"><font color="<?php if($data['des'] < $data['target']){
                                    echo "red";
                                }else{
                                    echo "black";
                                } ?>"><?php echo $data['des']?></font></td>
                                <td data-title="Rerata"><?php echo $data['rata'];?>%</td>
                            <td data-title="Action" align="center"><a href="aksi/edit_anak.php?id=<?php echo $data['id']; ?>"class="btn btn-warning">Edit</a>
                        <a href="aksi/hapus_anak.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Hapus</a></td>
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
  