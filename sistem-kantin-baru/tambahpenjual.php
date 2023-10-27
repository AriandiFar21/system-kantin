<!DOCTYPE html>
<html>
<head>
    <title>Add Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Hololive_Production_logo.svg/2560px-Hololive_Production_logo.svg.png" width="120" alt="Hololive Logo">
    </a>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container mt-5">
    <h1>DATA BASE</h1>
    <p>-CRUD PENJUAL</p>
    <a href="tablepenjual.php" class="btn btn-primary">Kembali</a>
  </div>
</div>

<br>

<div class="container">
    <form action="tambahpenjual.php" method="post" name="update">
        <div class="form-group">
            <label for="nama_penjual">Nama Penjual</label>
            <input type="text" name="nama_penjual" class="form-control" id="nama_penjual" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" id="no_hp" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" required>
        </div>
        <button type="submit" name="Submit" class="btn btn-primary">Add</button>
    </form>
    
    <?php
    if (isset($_POST['Submit'])) {
        $nama_penjual = $_POST['nama_penjual'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        
    
        include_once("config.php");
        echo "INSERT INTO penjual (nama_penjual, no_hp, alamat) VALUES ('$nama_penjual', '$no_hp', '$alamat')";
    
        $result = mysqli_query($mysqli, "INSERT INTO penjual (nama_penjual, no_hp, alamat) VALUES ('$nama_penjual', '$no_hp', '$alamat')");

        if ($result) {
            echo "Penjual berhasil ditambahkan. <a href='tablepenjual.php'>Lihat Menu</a>";
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
        
    }
    ?>
</div>
</body>
</html>
