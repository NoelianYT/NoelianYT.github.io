<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] != '2') {
    header('Location: index.php');
    exit();
}

include('db.php');

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    
    $delete_users_query = "DELETE FROM users WHERE npm = '$npm'";
    if (mysqli_query($conn, $delete_users_query)) {
        $delete_identitas_query = "DELETE FROM identitas WHERE npm = '$npm'";
        
        if (mysqli_query($conn, $delete_identitas_query)) {
            header('Location: admin_page.php');
            exit();
        } else {
            echo "Error deleting record from identitas: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting record from users: " . mysqli_error($conn);
    }
} else {
    header('Location: admin_page.php');
    exit();
}
?>