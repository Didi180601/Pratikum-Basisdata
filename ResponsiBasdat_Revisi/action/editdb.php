<?php
include '../koneksi.php';

$id = $_GET['id_detail'];
$query = "SELECT * FROM detail_bayar WHERE id_detail = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_detail   = $_POST['id_detail'];
  $id_sepatu   = $_POST['id_sepatu'];
  $jumlah_beli = $_POST['jumlah_beli'];

  $query_update = "CALL up_detailbayar($id_detail,$id_sepatu,$jumlah_beli)";
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
  <title>Edit Detail Bayar</title>
</head>

<body>
  <div class="mx-auto">
    <div class="card">
      <div class="card-header bg-primary text-white">
        Edit Data
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="col-sm-10">
            <input type="hidden" name="id_detail" value="<?php echo $row['id_detail']; ?>">
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">ID Sepatu</label>
            <div class="col-sm-10">
              <input type="text" name="id_sepatu" value="<?php echo $row['id_sepatu']; ?>" class="form-control" placeholder="Masukkan ID Sepatu">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Jumlah Bayar</label>
            <div class="col-sm-10">
              <input type="text" name="jumlah_beli" value="<?php echo $row['jumlah_beli']; ?>" class="form-control" placeholder="Masukkan Jumlah Yang Ingin Dibeli">
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