<?php
include "koneksi.php";

if(isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    $ambil_foto = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
    $tangkap_foto = mysqli_fetch_array($ambil_foto);
    $foto = $tangkap_foto['foto'];

    unlink("assets/produk/" . $foto);

    $hapus = mysqli_query($conn, "DELETE FROM produk WHERE id_produk='$id_produk'");

    if($hapus) {
        ?>
        <script>
            alert("produk berhasil dihapus");
            document.location="restock.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("produk gagal dihapus");
            document.location="restock.php";
        </script>
        <?php
    }
}

?>