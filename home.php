<?php
include "koneksi.php";
include "index.php";

$query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");
$no=0;
if(isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $query = mysqli_query($conn, "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR harga LIKE '%$keyword%'  OR id_produk LIKE '%$keyword%' ORDER BY id_produk DESC");
}
?>

<div class="container mt-5">
    <div class="row">   
<?php
while($data = mysqli_fetch_array($query)) {
$no++
?>
<div class="col-md-2">
    <a href="beli.php?id_produk=<?=$data['id_produk']?>">
    <div class="card shadow-sm mb-4">
        <img src="assets/produk/<?php  echo $data['foto'] ?>" class="card-img-top" alt="foto produk">
        <div>
            <p class="float-start fw-bold text-dark"><?php echo $data['nama_produk'] ?></p>
            <p class="text-danger float-end fw-bold">Rp. <?php echo number_format($data['harga']) ?></p>
        </div>
    </div>
    </a>
</div>
<?php } ?>
</div> <!-- akhiran row -->
</div> <!-- akhiran container -->

<?php
include "footer.php";
?>