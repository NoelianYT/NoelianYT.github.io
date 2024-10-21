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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];
    
    $update_query = "UPDATE identitas SET nama='$nama', alamat='$alamat', jk='$jk', tgl_lhr='$tgl_lhr', email='$email' WHERE npm='$npm'";
    
    if (mysqli_query($conn, $update_query)) {
        header('Location: tampil_data.php'); // Redirect to the display page after update
        exit();
    } else {
        $error = "Failed to update student data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student Data</title>
    <link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>
    <h2>Edit Your Data</h2>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="POST" action="edit.php">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $student['nama']; ?>" required><br>
        
        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $student['alamat']; ?>" required><br>
        
        <label for="jk">Jenis Kelamin (L/P):</label>
        <input type="text" name="jk" value="<?php echo $student['jk']; ?>" required><br>
        
        <label for="tgl_lhr">Tanggal Lahir:</label>
        <input type="date" name="tgl_lhr" value="<?php echo $student['tgl_lhr']; ?>" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br>
        
        <input type="submit" value="Update">
    </form>

    <a href="tampil_data.php">Back to Profile</a>
</body>
</html>