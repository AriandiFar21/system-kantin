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
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Hololive_Production_logo.svg/2560px-Hololive_Production_logo.svg.png" width="120">
    </a>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container mt-5">
    <h1>DATA BASE</h1>
    <p>-CRUD MENU</p>
    <a href="index.php" type="button" class="btn btn-primary">Kembali</a>
  </div>
</div>

<br>

<div class="container">


<form action="add.php" method="post" name="form1">
    <table width="25%" border="0">
        <tr>
            <td>Jenis</td>
            <td>
                
                <select name="jenis" id="jenis">
                    <option value="Makanan Berat">Makanan Berat</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                    <option value="Minuman Segar">Minuman Segar</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga"></td>
        </tr>
        <tr>
            <td>Nama Makanan</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Penjual</td>
            <td>
                <select name="id_p">
                    <?php
                    include_once("config.php");
                    $result = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_p DESC");

                    while ($data = mysqli_fetch_array($result)) {
                        echo "<option value='" . $data['id_p'] . "'>" . $data['nama_penjual'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>
<?php
if (isset($_POST['Submit'])) {
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $nama = $_POST['nama'];
    $id_penjual = $_POST['id_p'];

    include_once("config.php");

    // Periksa apakah id_penjual yang dipilih ada dalam tabel penjual
    $check_query = mysqli_query($mysqli, "SELECT id_p FROM penjual WHERE id_p = '$id_penjual'");
    $count = mysqli_num_rows($check_query);

    if ($count > 0) {
        // Data valid, lakukan INSERT
        $result = mysqli_query($mysqli, "INSERT INTO menu (jenis, harga, nama, id_penjual) VALUES ('$jenis', '$harga', '$nama', '$id_penjual')");

        if ($result) {
            echo "Menu added successfully. <a href='index.php'>View Menu</a>";
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    } else {
        echo "Error: Invalid id_p selected.";
    }
}
?>



</div>

