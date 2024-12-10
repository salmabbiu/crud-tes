<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // Redirect berdasarkan role
    if ($user['role'] == 'admin') {
        header('Location: ../admin/index.php);
} else {
    echo "Username atau Password salah!";
    echo "<a href='index.php'>Kembali</a>";
}