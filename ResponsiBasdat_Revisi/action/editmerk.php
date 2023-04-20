<?php
include '../koneksi.php';

$id = $_GET['id_merk'];
$query = "SELECT * FROM merk WHERE id_merk = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_merk = $_GET['id_merk'];
  $nama_merk = $_POST['nama_merk'];
  $model_sepatu = $_POST['model_sepatu'];

  $query_update = "CALL up_merk('$id','$nama_merk','$model_sepatu')";
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
  <title>Document</title>
</head>

<body>
  <div class="mx-auto">
    <div class="card">
      <div class="card-header bg-dark text-white">
        Edit Tabel Merk
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="col-sm-10">
            <input type="hidden" name="id_merk" value="<?php echo $row['id_merk']; ?>">
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama Merk</label>
            <div class="col-sm-10">
              <input type="text" name="nama_merk" value="<?php echo $row['nama_merk']; ?>" class="form-control" placeholder="Masukkan Nama Merk">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Model Sepatu</label>
            <div class="col-sm-10">
              <input type="text" name="model_sepatu" value="<?php echo $row['model_sepatu']; ?>" class="form-control" placeholder="Masukkan Model Sepatu">
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