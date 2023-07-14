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
            <div class="col-8">
                <form action="t_edit_produk.php" method="POST">
                <div class="mt-2">
                <p><b>ID Produk : </b><?php echo $data['id_produk'] ?></p>
                <input type="hidden" name="id_produk" value="<?php echo $data['id_produk'] ?>">
                </div>
                <div class="mt-3">
                <b class="form-label">Nama Produk : </b>
                <input type="text" name="nama_produk" value="<?php echo $data['nama_produk'] ?>" class="form-control">
                </div>
                <div class="mt-2">
                <b class="form-label">Stock : </b>
                <input type="text" name="stok" value="<?php echo $data['stok'] ?>" class="form-control" autofocus>
                </div>
                <div class="mt-2">
                <b class="form-label">Harga /pcs : </b>
                Rp. <input type="text" name="harga" value="<?php echo $data['harga'] ?>" class="form-control">
                </div>
                <div class="mt-2">
                <b class="form-label">Deskripsi Produk : </b>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?php echo $data['deskripsi'] ?></textarea>
                </div>
                <div class="d-grid gap-2 mt-2 mb-5">
                <input type="submit" name="submit" class="btn btn-success" value="Selesai">
                <a href="hapus_produk.php?id_produk=<?php echo $data['id_produk']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin mengahpus produk <?php echo $data['nama_produk'] ?>?')">Hapus Produk</a>
                </div>
                
                </form>
            </div>
    </div> <!-- div untuk row -->
</div> <!-- div container -->

<?php
include "footer.php";
?>