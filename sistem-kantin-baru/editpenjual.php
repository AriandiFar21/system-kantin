<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $jenis = $_POST['nama_penjual'];
    $harga = $_POST['no_hp'];
    $nama = $_POST['alamat'];
    $id_penjual = $_POST['id_p'];

    // Update user data
    $query = "UPDATE penjual
              SET nama_penjual='$jenis', no_hp='$harga', alamat='$nama', id_penjual='$id_penjual'
              WHERE id_p=$id";
    $result = mysqli_query($mysqli, $query);

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}

// Display selected user data based on id
// Getting id from URL
$id = $_GET['id'];

// Fetch user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjual WHERE id_p=$id");

if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_array($result);
    $jenis = $user_data['nama_penjual'];
    $harga = $user_data['no_hp'];
    $nama = $user_data['alamat'];

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
    <a href="tablepenjual.php" type="button" class="btn btn-primary">Kembali</a>
  </div>
</div>


    <div class="container mt-3">
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>nama</td>
                <td>
                <input type="text" name="harga" value="<?php echo $jenis; ?>">
                </td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="harga" value="<?php echo $harga; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
            </tr>

            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <button type="submit" name="Submit" class="btn btn-primary">Add</button>
            </tr>
        </table>
    </form>
    </div>

</body>
</html>
