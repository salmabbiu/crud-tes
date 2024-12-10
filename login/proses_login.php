<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan prepared statements untuk keamanan
    $stmt = $config->prepare("SELECT * FROM pembaca WHERE username = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($config->error));
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username ditemukan, sekarang cek password
        $data = $result->fetch_assoc();
        if ($password == $data['password']) {
            session_start();
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            // Set cookies untuk menyimpan data user
            setcookie('id', $data['id'], time() + 86400, "/");
            setcookie('username', $data['username'], time() + 86400, "/");

            header('location: ../admin/index.php');
            exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect
        } else {
            // Password salah
            echo "<script>
            alert('Password yang Anda masukkan salah');
            window.location.assign('index.php?pesan=password_salah');
            </script>";
        }
    } else {
        // Username tidak ditemukan
        echo "<script>
        alert('Username yang Anda masukkan belum terdaftar');
        window.location.assign('index.php?pesan=username_salah');
        </script>";
    }
}
?>