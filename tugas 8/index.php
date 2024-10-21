<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pass = md5($_POST['pass']);

    $query = "SELECT * FROM users WHERE username = '$username' AND pass = '$pass'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        $_SESSION['username'] = $user['username'];
        $_SESSION['npm'] = $user['npm'];
        $_SESSION['level'] = $user['level'];
        
        if ($user['level'] == '1') {
            header('Location: tampil_data.php');
        } else if ($user['level'] == '2') {
            header('Location: admin_page.php');
        }
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <form method="POST" action="index.php">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="pass">Password:</label>
        <input type="password" name="pass" required>
        
        <input type="submit" value="Login">

        <p>Belum punya akun?</p>
        <a href="register.php">Register Di sini</a>
    </form>
</body>
</html>