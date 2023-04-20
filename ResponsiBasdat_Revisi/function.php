<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Function</title>
  <style>
    .mx-auto {
      width: 800px
    }

    .card {
      margin-top: 10px;
    }
  </style>
  </style>
</head>
<header>
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="index.php">DASHBOARD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="procedure.php">Stored Procedure</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="function.php">Function</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="views.php">Views</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<body>

  <!-- Form untuk input tanggal -->
  <div class="mx-auto">
    <div class="card">
      <div class="card-header bg-primary text-white">
        Function Total Pemasukan
      </div>
      <div class="card-body">
        <form method="post" action="action/fpemasukan.php">
          <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">Masukkan Tanggal</label>
            <div class="col-sm-10">
              <input type="date" id="tanggal" value="<?php echo $row['tanggal'];?>" name="tanggal" class="form-control">
            </div>
            <div class="col-12 mb-3">
              <input type="submit" class="btn btn-dark" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="mx-auto">
    <div class="card">
      <div class="card-header bg-primary text-white">
        Function Mencari Sepatu
      </div>
      <div class="card-body">
        <form method="post" action="action/fmerk.php">
          <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">Masukkan ID Merk</label>
            <div class="col-sm-10">
              <input type="text" id="id_tanggal"  name="id_merk" class="form-control">
            </div>
            <div class="col-12 mb-3">
              <input type="submit" class="btn btn-dark" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>