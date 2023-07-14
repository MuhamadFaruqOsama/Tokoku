<?php
include "koneksi.php";

if(isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];
    $id_produk = $_GET['id_produk'];

    $q = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");
    $d = mysqli_fetch_array($q); 

    // jika barang sudah dibayar maka barang akan langsung dihapus
    if($d['uang_cash'] > 0) {
            ?>
            <script>
                alert("Barang tidak bisa dihapus karena sudah dibayar!");
                document.location="edit_transaksi.php?id_transaksi=<?=$id_transaksi?>";
            </script>
            <?php
    } else {

    // jika barang belum dibayar barang akan dikembalikan ke dalam stok
    $query = mysqli_query($conn, "SELECT * FROM barang WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk'");
    $data = mysqli_fetch_array($query);

    $ambil = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id_produk'");
    $tangkap = mysqli_fetch_array($ambil);

    $new_stok = $data['jumlah'] + $tangkap['stok'];

    $update = mysqli_query($conn, "UPDATE produk SET stok='$new_stok' WHERE id_produk='$id_produk'");

    if($update) {
        $hapus = mysqli_query($conn, "DELETE FROM barang WHERE id_transaksi='$id_transaksi' AND id_produk='$id_produk' ");
        
        if($hapus) {
            ?>
            <script>
                document.location="edit_transaksi.php?id_transaksi=<?=$id_transaksi?>";
            </script>
            <?php
        } else {
            echo "gagal saat menghapus";
        }
    } else {
        echo "gagal saat mengubah stok";
    }
    }
}
?>