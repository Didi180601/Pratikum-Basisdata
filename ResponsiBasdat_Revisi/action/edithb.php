<?php
include '../koneksi.php';

$id = $_GET['no_nota'];
$query = "SELECT * FROM header_bayar WHERE no_nota = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nonota          = $_POST['no_nota'];
    $tanggal         = $_POST['tanggal'];
    $iddetail        = $_POST['id_detail'];
    $totalpembelian = $_POST['total_pembelian'];
    $bayar           = $_POST['bayar'];
    $sisa            = $_POST['sisa_bayar'];

    $query_update = "CALL up_headerbayar($nonota, $tanggal, $iddetail, $totalpembelian, $bayar, $sisa)";
    mysqli_query($conn, $query_update);

    header("Location: ../procedure.php");
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    .mx-auto {
      width: 800px
    }

    .card {
      margin-top: 10px;
    }
  </style>
  <title>Edit Header Bayar</title>
</head>

<body>
  <div class="mx-auto">
    <div class="card">
      <div class="card-header bg-dark text-white">
        Edit Data
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="col-sm-10">
            <input type="hidden" name="no_nota" value="<?php echo $row['no_nota']; ?>">
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="date" name="tanggal" id="tanggal" value="<?php echo $row['tanggal']; ?>" class="form-control" placeholder="Masukkan Tanggal Transaksi">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">ID Detail</label>
            <div class="col-sm-10">
              <input type="text" name="id_detail" value="<?php echo $row['id_detail']; ?>" class="form-control" placeholder="Masukkan ID Detail">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Total Pembelian</label>
            <div class="col-sm-10">
              <input type="text" name="total_pembelian" value="<?php echo $row['total_pembelian']; ?>" class="form-control" placeholder="Masukkan Total Pembelian">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Total Pembayaran</label>
            <div class="col-sm-10">
              <input type="text" name="bayar" value="<?php echo $row['bayar']; ?>" class="form-control" placeholder="Masukkan Jumlah Pembayaran">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Kembalian</label>
            <div class="col-sm-10">
              <input type="text" name="sisa_bayar" value="<?php echo $row['sisa_bayar']; ?>" class="form-control" placeholder="Masukkan Sisa Pembayaran">
            </div>
          </div>
          <div class="col-12">
            <button type="submit" name="simpan" class="btn btn-dark text-light">Simpan</button>
            <button type="submit" name="simpan" class="btn btn-dark text-light"><a href="../procedure.php"></a>Kembali</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</body>

</html>