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
                                <input class="form-control" type="number" name="target" id="terget" value="<?php echo $data['target']?>"  placeholder="Target" aria-label="default input example">
                            </tr>
                            <tr>
                                Juni
                                <input class="form-control" type="number" name="jun" id="jun" value="<?php echo $data['jun']?>"  placeholder="Juni" aria-label="default input example">
                            </tr>
                            <tr>
                                Juli
                                <input class="form-control" type="number" name="jul" id="jul" value="<?php echo $data['jul']?>"  placeholder="Juli" aria-label="default input example">
                            </tr>
                            <tr>
                                Agustus
                                <input class="form-control" type="number" name="agt" id="agt" value="<?php echo $data['agt']?>"   placeholder="Agustus" aria-label="default input example">
                            </tr>
                            <tr>
                                September
                                <input class="form-control" type="number" name="sep" id="sep" value="<?php echo $data['sep']?>"  placeholder="September" aria-label="default input example">
                            </tr>
                            <tr>
                                Rerata
                                <input class="form-control" type="number" Readonly name="rata" id="total" value="<?php echo $data['rata']?>"  placeholder="Rerata" aria-label="default input example">
                            </tr>
                            <tr>
                                <br>
                                <input class="form-control" type="hidden" name="ruangan" id="ruangan" value="Ruangan gizi" placeholder="Rerata" aria-label="default input example">
                                <input class="form-control" type="hidden" name="tahun" id="tahun" value="2020" placeholder="Rerata" aria-label="default input example">
                                <button type="submit" class="btn btn-primary mb-2" name="proses" >Submit</button>
                            </tr>
                            <script type="text/javascript">
                                $("#jun").keyup(function(){   
                                var a = parseFloat($("#jun").val());
                                var b = parseFloat($("#jul").val());
                                var c = parseFloat($("#agt").val());
                                var d = parseFloat($("#sep").val());
                                var i = (a+b+c+d)/4;
                                $("#total").val(i);
                                });
                                
                                $("#jul").keyup(function(){   
                                var a = parseFloat($("#jun").val());
                                var b = parseFloat($("#jul").val());
                                var c = parseFloat($("#agt").val());
                                var d = parseFloat($("#sep").val());
                                var i = (a+b+c+d)/4;
                                $("#total").val(i);
                                });

                                $("#agt").keyup(function(){   
                                var a = parseFloat($("#jun").val());
                                var b = parseFloat($("#jul").val());
                                var c = parseFloat($("#agt").val());
                                var d = parseFloat($("#sep").val());
                                var i = (a+b+c+d)/4;
                                $("#total").val(i);
                                });
                                
                                $("#sep").keyup(function(){   
                                var a = parseFloat($("#jun").val());
                                var b = parseFloat($("#jul").val());
                                var c = parseFloat($("#agt").val());
                                var d = parseFloat($("#sep").val());
                                var i = (a+b+c+d)/4;
                                $("#total").val(i);
                                });
                        </script>
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
                        $jun= $_POST['jun'];
                        $jul= $_POST['jul'];
                        $agt= $_POST['agt'];
                        $sep= $_POST['sep'];
                        $rata= $_POST['rata'];
                        $ruangan = $_POST['ruangan'];
                        $tahun = $_POST['tahun'];
                        $edit= mysqli_query($koneksi,"UPDATE tb_indikator SET indikator='$indikator',target='$target',jun='$jun',jul='$jul',agt='$agt',sep='$sep',rata='$rata',ruangan='$ruangan',tahun='$tahun' WHERE id='$id'");
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