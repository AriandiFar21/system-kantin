<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $nama = $_POST['nama'];
    $id_penjual = $_POST['id_p'];

    // Update user data
    $query = "UPDATE menu
              SET jenis='$jenis', harga='$harga', nama='$nama', id_penjual='$id_penjual'
              WHERE id_menu=$id";
    $result = mysqli_query($mysqli, $query);

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}

// Display selected user data based on id
// Getting id from URL
$id = $_GET['id'];

// Fetch user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM menu WHERE id_menu=$id");

if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_array($result);
    $jenis = $user_data['jenis'];
    $harga = $user_data['harga'];
    $nama = $user_data['nama'];
    $id_penjual = $user_data['id_penjual'];
} else {
    // Handle the case when the menu item with the specified ID is not found
    echo "Menu item not found.";
    exit;
}
?>

<html>
<head>
    <title>Edit User Data</title>
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


    <div class="container mt-3">
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Jenis</td>
                <td>
                    <select name="jenis" id="jenis">
                        <option value="Makanan Berat" <?php if ($jenis == "Makanan Berat") echo "selected"; ?>>Makanan Berat</option>
                        <option value="Makanan Ringan" <?php if ($jenis == "Makanan Ringan") echo "selected"; ?>>Makanan Ringan</option>
                        <option value="Minuman Segar" <?php if ($jenis == "Minuman Segar") echo "selected"; ?>>Minuman Segar</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $harga; ?>"></td>
            </tr>
            <tr>
                <td>Nama Makanan</td>
                <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
            </tr>
            <tr>
                <td>Penjual</td>
                <td>
                    <select name="id_p">
                        <?php
                        $result = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id_p DESC");
                        while ($data = mysqli_fetch_array($result)) {
                            $selected = ($data['id_p'] == $id_penjual) ? "selected" : "";
                            echo "<option value='" . $data['id_p'] . "' $selected>" . $data['nama_penjual'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </div>

</body>
</html>
