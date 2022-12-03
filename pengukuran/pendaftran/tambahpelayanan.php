<?php
include "header.php";


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
                                <input class="form-control" type="text" name="indikator" id="indikator"  value="Waktu pelayanan puskesmas dan kepuasan pelanggan" placeholder="Indikator" aria-label="default input example" required readonly>
                            </tr>
                            <tr>
                                Target pelayanan
                                <input class="form-control" type="number" name="target" id="terget" value="100" placeholder="Masukkan angka" aria-label="default input example" readonly>
                            </tr>
                                Target kepuasan
                                <input class="form-control" type="number" name="target" id="terget" value="100" placeholder="Masukkan angka" aria-label="default input example" readonly>
                            </tr>
                            <tr>
                                Jumlah kunjungan pasien
                                <input class="form-control" type="number" name="data_1" id="data_1" placeholder="Masukkan angka" aria-label="default input example" autofocus>
                            </tr>
                            <tr>
                                Waktu pelayanan jam buka
                                <input class="form-control" type="text" name="data_2" id="data_2" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                                Waktu pelayanan jam tutup
                            <input class="form-control" type="text" name="data_3" id="data_3"  placeholder="Masukkan angka" aria-label="default input example">
                            </tr><tr>
                                Jumlah puas
                                <input class="form-control" type="number" name="data_4" id="data_4"  placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                Jumlah tidak puas
                                <input class="form-control" type="number" name="data_5" id="data_5"  placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                Tanggal
                                <input class="form-control" type="Text" name="tanggal" id="tanggal" value="<?php echo date("d"); ?>" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                Bulan
                                <input class="form-control" type="Text" name="bulan" id="bulan" value="<?php   echo date("F") ?>" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                Tahun
                                <input class="form-control" type="number" name="tahun" id="tahun" value="<?php echo date("Y"); ?>" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                Pencapaian hari ini
                                <input class="form-control" type="Text" name="total1" id="total1" value="" aria-label="default input example"readonly>
                            </tr>
                            <tr>
                           <tr>
                                
                                <input class="form-control" type="hidden" name="total2" id="total2"  placeholder="Masukkan angka" aria-label="default input example">
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
                            var d = parseFloat($("#data_4").val());
                            var e = parseFloat($("#data_5").val());
                            var i = ((a-e)/a)*100;
                            $("#total1").val(i);
                            });
                            
                            $("#data_5").keyup(function(){   
                            var a = parseFloat($("#data_1").val());
                            var d = parseFloat($("#data_4").val());
                            var e = parseFloat($("#data_5").val());
                            var i = ((a-e)/a)*100;
                            $("#total1").val(i);
                            });

                            $("#data_4").keyup(function(){   
                            var a = parseFloat($("#data_1").val());
                            var d = parseFloat($("#data_4").val());
                            var e = parseFloat($("#data_5").val());
                            var i = ((a-e)/a)*100;
                            $("#total1").val(i);
                            });

                           
                        </script>
                    <?php
                        include "../../asset/koneksi/koneksi.php";  
                        if(isset($_POST['proses']))
                        {
                            ?>
                        <script type="text/javascript">
                            alert('Tambah data berhasil');
                            window.location="waktu_pelayanan.php"
                        </script>
                        <?php

                        mysqli_query($koneksi,"INSERT INTO tb_pengukuran set
                        indikator= '$_POST[indikator]',
                        target = '$_POST[target]',
                        data_1 = '$_POST[data_1]',
                        data_2 = '$_POST[data_2]',
                        data_3 = '$_POST[data_3]',
                        data_4 = '$_POST[data_4]',
                        data_5 = '$_POST[data_5]',
                        tanggal = '$_POST[tanggal]',
                        bulan = '$_POST[bulan]',
                        tahun= '$_POST[tahun]',
                        total1 = '$_POST[total1]',
                        total2 = '$_POST[total2]'");}
                    ?>
        </form>
</body>
</html>