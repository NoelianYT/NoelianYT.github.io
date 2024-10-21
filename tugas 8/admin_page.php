<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != '2') {
    header('Location: index.php');
    exit();
}

include('db.php');

$query = "SELECT * FROM identitas";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Student Data</title>
    <link rel="stylesheet" type="text/css" href="admin_page.css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <table border="1">
        <tr>
            <th>NPM</th>
            <th>Name</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['npm']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['jk']; ?></td>
            <td><?php echo $row['tgl_lhr']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="delete.php?npm=<?php echo $row['npm']; ?>" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <a href="logout.php">Logout</a>
</body>
</html>