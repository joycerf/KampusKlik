<?php

    include "koneksi.php";

        //mengambil data inputan
        $nama_mhs = $_POST['nama'];
        $namamhs = $_POST['namablkng'];
        $prodi_mhs = $_POST['prodi'];
        

        $proses =  mysqli_query($koneksi,"INSERT INTO mahasiswapbw (nama_mahasiswa, namamhs, prodi) 
        VALUES ('".$nama_mhs."','".$namamhs."' ,'".$prodi_mhs."') ")
        or die (mysqli_error($koneksi));

        if($proses){
            echo "
                    <script>
                        alert('Data Berhasil Disimpan');
                        window.location.href='form.php';
                        </script>";
        } else echo "<script>
                        alert('Data Gagal Disimpan');
                        window.location.href='form.php';
                    </script>";

?>