<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all menu data from database
$result = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_p");

?>

<!DOCTYPE html>
<html>
<head>    
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
 
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Hololive_Production_logo.svg/2560px-Hololive_Production_logo.svg.png" width="120">
    </a>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container mt-5">
    <h1>DATA BASE</h1>
    <p>-CRUD PENJUAL</p>
    <a href="tambahpenjual.php" type="button" class="btn btn-primary">Tambah Penjual</a>
    <a href="menuutama.php" type="button" class="btn btn-primary">Kembali ke menu utama</a>
  </div>
</div>

<div class="container">

<table class="table table-hover">
  <thead>
    <tr>
        <th>Nama Penjual</th>
        <th>Nomor Handphone</th>
        <th>Alamat</th>
        <th>Aksi</th>

    </tr>
  </thead>
  <tbody>
    <?php  
    while($menu_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$menu_data['nama_penjual']."</td>";
        echo "<td>".$menu_data['no_hp']."</td>";
        echo "<td>".$menu_data['alamat']."</td>";    
        echo "<td><a href='editpenjual.php?id=$menu_data[id_p]'>Edit</a> | <a href='hapuspenjual.php?id=$menu_data[id_p]'>Delete</a></td></tr>";     
    }
    ?>
  </tbody>
</table>


</div>


</body>
</html>
