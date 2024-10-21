<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $pass = md5($_POST['pass']);
    $npm = $_POST['npm'];
    $level = $_POST['level'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    $check_query = "SELECT * FROM users WHERE username = '$username' OR npm = '$npm'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username or NPM already exists!";
    } else {
        $insert_identitas_query = "INSERT INTO identitas (npm, nama, alamat, jk, tgl_lhr, email) VALUES ('$npm', '$nama', '$alamat', '$jk', '$tgl_lhr', '$email')";
        
        if (mysqli_query($conn, $insert_identitas_query)) {
            $insert_users_query = "INSERT INTO users (username, pass, npm, level) VALUES ('$username', '$pass', '$npm', '$level')";
            
            if (mysqli_query($conn, $insert_users_query)) {
                header('Location: index.php');
                exit();
            } else {
                $error = "Registration failed for users table, please try again!";
            }
        } else {
            $error = "Registration failed for identitas table, please try again!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>
    <form method="POST" action="register.php">
        <h2>Register</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <div class="form-container">
            <div class="left-column">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>
                
                <label for="npm">NPM:</label>
                <input type="text" name="npm" required><br>
                
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" required><br>
                
                <label for="tgl_lhr">Tanggal Lahir:</label>
                <input type="date" name="tgl_lhr" required><br>
            </div>
            <div class="right-column">
                <label for="pass">Password:</label>
                <input type="password" name="pass" required><br>
                
                <label for="nama">Nama:</label>
                <input type="text" name="nama" required><br>
                
                <label for="jk">Jenis Kelamin:</label>
                <select name="jk" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select><br>
                
                <label for="email">Email:</label>
                <input type="email" name="email" required><br>
                
                <label for="level">User:</label>
                <select name="level" required>
                    <option value="1">Mahasiswa</option>
                    <option value="2">Admin</option>
                </select><br>
            </div>
        </div>
        Apa sudah punya akun?<a href="index.php">Login here</a>
        <input type="submit" value="Register">
    </form>

</body>
</html>