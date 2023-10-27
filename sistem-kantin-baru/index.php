<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all menu data from database
$result = mysqli_query($mysqli, "SELECT menu.*, penjual.nama_penjual FROM menu JOIN penjual ON menu.id_penjual = penjual.id_p");

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
    <p>-CRUD MENU</p>
    <a href="add.php" type="button" class="btn btn-primary">Tambah Menu</a>
    <a href="menuutama.php" type="button" class="btn btn-primary">Kembali ke menu utama</a>
  </div>
</div>

<div class="container">

<table class="table table-hover">
  <thead>
    <tr>
        <th>Jenis</th>
        <th>Harga</th>
        <th>Nama Makanan</th>
        <th>Penjual</th>
        <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php  
    while($menu_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$menu_data['jenis']."</td>";
        echo "<td>".$menu_data['harga']."</td>";
        echo "<td>".$menu_data['nama']."</td>";    
        echo "<td>".$menu_data['nama_penjual']."</td>";  
        echo "<td><a href='edit.php?id=$menu_data[id_menu]'>Edit</a> | <a href='delete.php?id=$menu_data[id_menu]'>Delete</a></td></tr>";     
    }
    ?>
  </tbody>
</table>


</div>


</body>
</html>
