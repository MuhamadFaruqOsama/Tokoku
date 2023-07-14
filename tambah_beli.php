<?php
include "koneksi.php";
include "header.php";

if(isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    $query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
    $data = mysqli_fetch_array($query);
}
?>

<div class="container mt-5">
    <div class="row">
            <div class="col-4">
                <img src="assets/produk/<?php echo $data['foto']?>" alt="" style="height:350px; width:300px;">
            </div>

            <?php
            if(isset($_GET['id_transaksi'])) {
                $id_transaksi =  $_GET['id_transaksi'];
            }
            ?>

            <div class="col-8">
                <p><b>ID Produk : </b><?php echo $data['id_produk'] ?></p>
                <p><b>Nama Produk : </b><?php echo $data['nama_produk'] ?></p>
                <p><b>Stock : </b><?php echo $data['stok'] ?></p>
                <p><b>Harga /pcs : </b>Rp. <?php echo number_format($data['harga']) ?></p>
                <p><b>Deskripsi Produk : </b><?php echo $data['deskripsi'] ?></p>
                <hr>
                        <?php
                        if($data['stok'] <= 0) {
                            ?>
                            <div class="d-grid gap-2 mt-1">
                            <input type="submit" class="btn btn-danger" value="Maaf barang habis:(">
                            </div>
                            <?php
                        } else {
                            ?>
                            <form action="t_tambah_beli.php" method="POST">
                            <p><input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi ?>"></p> 
                            <p><input type="hidden" name="id_produk" value="<?php echo $data['id_produk'] ?>"></p> 
                            <p><input type="hidden" name="nama_produk" value="<?php echo $data['nama_produk'] ?>"></p> 
                            <p><input type="hidden" name="hargaPCS" value="<?php echo $data['harga'] ?>"></p> 
                            <p><input type="hidden" name="stok" value="<?php echo $data['stok'] ?>"></p> 
                            <p><input type="text" name="jumlah" placeholder="Masukan jumlah beli" class="form-control outline-success" required autofocus></p> 
                            <div class="d-grid gap-2 mt-1">
                            <input type="submit" name="submit" class="btn btn-success" value="Beli">
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                
            </div>
    </div> <!-- div untuk row -->
</div> <!-- div container -->

<?php
include "footer.php";
?>