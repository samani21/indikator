<?php
include "header.php";
include "../../asset/koneksi/koneksi.php";
    $id = $_GET['id'];
    $ambilData = mysqli_query($koneksi,"SELECT * FROM tb_indikator WHERE id='$id'");
    $data = mysqli_fetch_array($ambilData)
?>

<div class="container">
        <div class="row">
            <section class="bg-light ">
                <h3 class="pb-2">
                    Edit indikator
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
                                <input class="form-control" type="text" name="indikator" id="indikator" value="<?php echo $data['indikator']?>" placeholder="Indikator" aria-label="default input example">
                            </tr>
                            <tr>
                                Target
                                <input class="form-control" type="text" name="target" id="terget" value="<?php echo $data['target']?>"  placeholder="Target" aria-label="default input example">
                            </tr>
                            <tr>
                                Januari
                                <input class="form-control" type="text" name="jan" id="jan" value="<?php echo $data['jan']?>"  placeholder="September" aria-label="default input example">
                            </tr>
                            <tr>
                                Februari
                                <input class="form-control" type="text" name="feb" id="feb" value="<?php echo $data['feb']?>"  placeholder="Juni" aria-label="default input example">
                            </tr>
                            <tr>
                                Maret
                                <input class="form-control" type="text" name="mar" id="mar" value="<?php echo $data['mar']?>"  placeholder="Juli" aria-label="default input example">
                            </tr>
                            <tr>
                                April
                                <input class="form-control" type="text" name="apr" id="apr" value="<?php echo $data['apr']?>"   placeholder="Agustus" aria-label="default input example">
                            </tr>
                            <tr>
                                Mei
                                <input class="form-control" type="text" name="mei" id="mei" value="<?php echo $data['mei']?>"   placeholder="Agustus" aria-label="default input example">
                            </tr>
                            <tr>
                                Juni
                                <input class="form-control" type="text" name="jun" id="jun" value="<?php echo $data['jun']?>"  placeholder="Juni" aria-label="default input example">
                            </tr>
                            <tr>
                                Juli
                                <input class="form-control" type="text" name="jul" id="jul" value="<?php echo $data['jul']?>"  placeholder="Juli" aria-label="default input example">
                            </tr>
                            <tr>
                                Agustus
                                <input class="form-control" type="text" name="agt" id="agt" value="<?php echo $data['agt']?>"   placeholder="Agustus" aria-label="default input example">
                            </tr>
                            <tr>
                                September
                                <input class="form-control" type="text" name="sep" id="sep" value="<?php echo $data['sep']?>"  placeholder="September" aria-label="default input example">
                            </tr>
                            <tr>
                                Oktober
                                <input class="form-control" type="text" name="okt" id="okt" value="<?php echo $data['okt']?>"   placeholder="Agustus" aria-label="default input example">
                            </tr>
                            <tr>
                                November
                                <input class="form-control" type="text" name="nov" id="nov" value="<?php echo $data['nov']?>"  placeholder="September" aria-label="default input example">
                            </tr>
                            <tr>
                                Desember
                                <input class="form-control" type="text" name="des" id="des" value="<?php echo $data['des']?>"  placeholder="September" aria-label="default input example">
                            </tr>
                            <tr>
                                Rerata
                                <input class="form-control" type="text"  name="rata" id="rata" value="<?php echo $data['rata']?>"  placeholder="Rerata" aria-label="default input example">
                            </tr>
                            <tr>
                                Tahun
                                <input class="form-control" type="text" name="tahun" id="tahun" value="<?php echo date("Y"); ?>"aria-label="default input example">
                            </tr>
                            <tr>
                                <br>
                                <input class="form-control" type="hidden" name="ruangan" id="ruangan" value="<?php echo $data['ruangan']?>"  aria-label="default input example">
                                <button type="submit" class="btn btn-primary mb-2" name="proses" >Submit</button>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                    <?php
                        include "../../asset/koneksi/koneksi.php";  
                        if(isset($_POST['proses']))
                    {
                        $indikator= $_POST['indikator'];
                        $target= $_POST['target'];
                        $jan= $_POST['jan'];
                        $feb= $_POST['feb'];
                        $mar= $_POST['mar'];
                        $mei= $_POST['mei'];
                        $jun= $_POST['jun'];
                        $jun= $_POST['jun'];
                        $jul= $_POST['jul'];
                        $agt= $_POST['agt'];
                        $sep= $_POST['sep'];
                        $okt= $_POST['okt'];
                        $nov= $_POST['nov'];
                        $des= $_POST['des'];
                        $rata= $_POST['rata'];
                        $ruangan = $_POST['ruangan'];
                        $tahun = $_POST['tahun'];
                        $edit= mysqli_query($koneksi,"UPDATE tb_indikator SET indikator='$indikator',target='$target',jan='$jan',feb='$feb',mar='$mar',apr='$apr',mei='$mei',jun='$jun',jul='$jul',agt='$agt',sep='$sep',okt='$okt',nov='$nov',des='$des',rata='$rata',ruangan='$ruangan',tahun='$tahun' WHERE id='$id'");
                        if($edit){
                            ?>
                            <script type="text/javascript">
                                alert('edit data berhasil');
                                window.location="../gizi.php"
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