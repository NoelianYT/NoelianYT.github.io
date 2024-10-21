<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != '1') {
    header('Location: index.php');
    exit();
}

include('db.php');

$npm = $_SESSION['npm'];
$query = "SELECT * FROM identitas WHERE npm = '$npm'";
$result = mysqli_query($conn, $query);
$student = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Data</title>
    <link rel="stylesheet" type="text/css" href="tampil_data.css">
</head>
<body>
    <h2>Halo, <?php echo $_SESSION['username']; ?></h2>
    <p>NPM : <?php echo $student['npm']; ?></p>
    <p>Nama : <?php echo $student['nama']; ?></p>
    <p>Alamat : <?php echo $student['alamat']; ?></p>
    <p>Jenis Kelamin : <?php echo $student['jk']; ?></p>
    <p>Tanggal Lahir : <?php echo $student['tgl_lhr']; ?></p>
    <p>Email : <?php echo $student['email']; ?></p>
    
    <a href="edit.php?npm=<?php echo $student['npm']; ?>">Edit</a><br>

    <a href="logout.php">Logout</a>
</body>
</html>
