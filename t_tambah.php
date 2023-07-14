<?php
include "koneksi.php";

if(isset($_POST['submit'])) {
    $nama_produk = htmlspecialchars($_POST['nama_produk']);
    $stok = htmlspecialchars($_POST['stok']);
    $tanggal = date("d F Y");
    $harga = htmlspecialchars($_POST['harga']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    $foto = $_FILES['foto']['name'];

    $ukuranFoto = $_FILES['foto']['size'];

    $tmpFoto = $_FILES['foto']['tmp_name'];

    $namaFoto = $nama_produk . '-' . $foto ;

    // cek ekstensi gambar

    $EkstensiGambarValid = ['jpg' , 'jpeg' , 'png'];
    $EkstensiGambar = explode('.' , $namaFoto);
    $EkstensiGambar = strtolower(end($EkstensiGambar));

    // cek ukuran gambar

    if (in_array($EkstensiGambar, $EkstensiGambarValid)) {

        $lokasiFoto = 'assets/produk/';

        $prosesUpload = move_uploaded_file($tmpFoto, $lokasiFoto . $namaFoto);


        $insert = mysqli_query($conn, "INSERT INTO produk (nama_produk, harga, stok, terakhir_direstok, deskripsi, foto) VALUES ('$nama_produk', '$harga', '$stok', '$tanggal', '$deskripsi','$namaFoto')");

    if($insert) {
        ?>
        <script>
            alert("Berhasil ditambahkan");
            document.location="tambah.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Gagal ditambahkan");
            document.location="tambah.php";
        </script>
        <?php

    }
} else {
    ?>
    <script>
        alert("Ekstensi gambar tidak diperbolehkan");
        document.location="tambah.php";
    </script>
    <?php
}
}
?>