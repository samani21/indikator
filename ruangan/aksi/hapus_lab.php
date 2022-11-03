<?php
      include "../../asset/koneksi/koneksi.php";
      $id = $_GET['id'];
      $ambilData = mysqli_query($koneksi,"DELETE FROM tb_indikator WHERE id='$id'");
      
?> 
    <script type="text/javascript">
        alert('Data berhasil dihapus');
        window.location="../lab.php"
    </script>