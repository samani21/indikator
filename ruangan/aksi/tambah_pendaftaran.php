<?php
include "header.php";
?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Tambah indikator
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
                                <input class="form-control" type="text" name="indikator" id="indikator" placeholder="Indikator" aria-label="default input example" required>
                            </tr>
                            <tr>
                                Target
                                <input class="form-control" type="text" name="target" id="terget" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                Juni
                                <input class="form-control" type="text" name="jun" id="jun" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                Juli
                                <input class="form-control" type="text" name="jul" id="jul" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                Agustus
                                <input class="form-control" type="text" name="agt" id="agt" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                September
                                <input class="form-control" type="text" name="sep" id="sep" placeholder="Masukkan angka" aria-label="default input example">
                            </tr>
                            <tr>
                                Rerata
                                <input class="form-control" type="form-control" name="rata"  id="rata" placeholder="Masukkan angka" aria-label="default input example"required>
                            </tr>
                            <tr>
                                <br>
                                <input class="form-control" type="hidden" name="ruangan" id="ruangan" value="Ruangan pendaftran dan rekam medis" placeholder="Rerata" aria-label="default input example">
                                <input class="form-control" type="hidden" name="tahun" id="tahun" value="2020" placeholder="Rerata" aria-label="default input example">
                                <button type="submit" class="btn btn-primary mb-2" name="proses" >Submit</button>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                    <?php
                        include "../..//asset/koneksi/koneksi.php";  
                        if(isset($_POST['proses']))
                        {
                            ?>
                        <script type="text/javascript">
                            alert('Tambah indikator berhasil');
                            window.location="../pendaftaran.php"
                        </script>
                        <?php

                        mysqli_query($koneksi,"INSERT INTO tb_indikator set
                        indikator= '$_POST[indikator]',
                        target = '$_POST[target]',
                        jun= '$_POST[jun]',
                        jul= '$_POST[jul]',
                        agt= '$_POST[agt]',
                        sep= '$_POST[sep]',
                        rata= '$_POST[rata]',
                        ruangan= '$_POST[ruangan]',
                        tahun= '$_POST[tahun]'");}
                    ?>
        </form>
</body>
</html>