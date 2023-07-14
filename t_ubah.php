<?php
include "koneksi.php";

if(isset($_POST['submit'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $total = $_POST['total_kes'];
    $cash = $_POST['uang_cash'];

    $kembalian = $cash - $total;

    $update = mysqli_query($conn, "UPDATE transaksi SET uang_cash='$cash',kembalian='$kembalian' WHERE id_transaksi='$id_transaksi' ");

    if($update) {
        ?>
        <script>
            alert("Transaksi berhasil diperbarui");
            document.location="transaksi.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Transaksi gagal diperbarui");
            document.location="transaksi.php";
        </script>
        <?php
    }

}
?>