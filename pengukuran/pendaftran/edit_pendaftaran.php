<?php
include "header.php";
include "../../asset/koneksi/koneksi.php";
$id = $_GET['id'];
$ambilData = mysqli_query($koneksi,"SELECT * FROM tb_pengukuran WHERE id='$id'");
$data = mysqli_fetch_array($ambilData)

?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Tambah Data
                </h3>
            </section>
        </div>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                Indikator
                                <input class="form-control" type="text" name="indikator" id="indikator"  value="Waktu tunggu registrasi pasien < 10 menit"placeholder="Indikator" aria-label="default input example" required>
                            </tr>
                            <tr>
                                Target
                                <input class="form-control" type="text" name="target" id="terget" value="90" placeholder="Masukkan angka" aria-label="default input example" readonly>
                            </tr>
                            <tr>
                                JUMLAH PASIEN YANG MENUNGGU REGISTRASI < 10 MENIT
                                <input class="form-control" type="text" name="data_1" id="data_1" value="<?php echo $data['data_1']?>" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                JUMLAH PASIEN YANG BERKUNJUNG
                                <input class="form-control" type="text" name="data_2" id="data_2"  value="<?php echo $data['data_2']?>" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                             
                                <input class="form-control" type="hidden" name="data_3" id="data_3" value="<?php echo $data['data_3']?>"  placeholder="Rerata" aria-label="default input example">
                            </tr><tr>
             
                                <input class="form-control" type="hidden" name="data_4" id="data_4" value="<?php echo $data['data_4']?>"  placeholder="Rerata" aria-label="default input example">
                            </tr><tr>
                            <tr>
             
                                <input class="form-control" type="hidden" name="data_5" id="data_5" value="<?php echo $data['data_4']?>"  placeholder="Rerata" aria-label="default input example">
                             </tr>
                            <tr>
                                Tanggal
                                <input class="form-control" type="Text" name="tanggal" id="tanggal" value="<?php echo $data['tanggal']?>" placeholder="Rerata" aria-label="default input example">
                            </tr>
                            <tr>
                                Bulan
                                <input class="form-control" type="Text" name="bulan" id="bulan" value="<?php echo $data['bulan']?>" placeholder="Rerata" aria-label="default input example">
                            </tr>
                            <tr>
                                Tahun
                                <input class="form-control" type="Text" name="tahun" id="tahun" value="<?php echo $data['tahun']?>" placeholder="Rerata" aria-label="default input example">
                            </tr>
                            <tr>
                                Pencapaian hari ini
                                <input class="form-control" type="Text" name="total1" id="total1" value="<?php echo $data['total1']?>" aria-label="default input example"readonly>
                            </tr>
                           
                                <input class="form-control" type="hidden" name="total2" id="total2" value="<?php echo $data['total2']?>"  placeholder="Rerata" aria-label="default input example">
                            </tr>
                            <tr>
                                <br>
                                <div>
                                    <button type="submit" class="btn btn-primary mb-2" name="proses" >Submit</button>
                                    <button type="reset" class="btn btn-warning mb-2">Reset</button>
                                </div>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                        <script type="text/javascript">
                            $("#data_1").keyup(function(){   
                            var a = parseFloat($("#data_1").val());
                            var b = parseFloat($("#data_2").val());
                            var i = (a/b)*100;
                            $("#total1").val(i);
                            });
                            
                            $("#data_2").keyup(function(){   
                            var a = parseFloat($("#data_1").val());
                            var b = parseFloat($("#data_2").val());
                            var i = (a/b)*100;
                            $("#total1").val(i);
                            });

                           
                        </script>
                    <?php
                        include "../../asset/koneksi/koneksi.php";  
                        if(isset($_POST['proses']))
                        {
                            $indikator= $_POST['indikator'];
                            $target= $_POST['target'];
                            $data_1 = $_POST['data_1'];
                            $data_2 = $_POST['data_2'];
                            $data_3 = $_POST['data_3'];
                            $data_4 = $_POST['data_4'];
                            $data_5 = $_POST['data_5'];
                            $tanggal = $_POST['tanggal'];
                            $bulan = $_POST['bulan'];
                            $tahun = $_POST['tahun'];
                            $total1 = $_POST['total1'];
                            $total2 = $_POST['total2'];
                            $edit= mysqli_query($koneksi,"UPDATE tb_pengukuran SET indikator='$indikator',target='$target', data_1='$data_1',data_2='$data_2', data_3='$data_3',data_4='$data_4',data_5='$data_5', tanggal='$tanggal', bulan='$bulan', tahun='$tahun', total1='$total1',total2='$total2' WHERE id='$id'");
                            if($edit){
                                ?>
                                <script type="text/javascript">
                                    alert('edit data berhasil');
                                    window.location="waktu_tunggu.php"
                                </script>
                                <?php
                            }else {
                                echo "GAGAL";
                            }
    
                        }
                    ?>
        </form>
</body>
</html>