<?php
// Memanggil file koneksi.php
include "koneksi.php";

// Memeriksa apakah kunci 'username', 'password', dan 'nama' ada dalam $_POST sebelum mengaksesnya
if(isset($_POST['username'], $_POST['password'], $_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['username'];
    $level = "user"; // Level otomatis diisi 'user' saat registrasi

    // Format acak password harus sama dengan proses_login.php
    $pengacak = "p3ng4c4k";
    $password_acak = md5($pengacak . md5($password) . $pengacak);
    $kirim = $_POST['kirim'];

    // Proses kirim data ke database MySQL
    if ($kirim) {
        $query = "INSERT INTO tb_user (username, password, nama, level) VALUES ('$username', '$password_acak', '$nama', '$level')";
        $hasil = mysqli_query($conn, $query);
        if ($hasil) {
            echo "Registrasi User Berhasil<br>";
            echo "<a href='login.php'>Login User</a>";
        } else {
            echo "Registrasi User Gagal!";
        }
    } else {
        echo "Data tidak terkirim.";
    }
} else {
    echo "Ada kunci yang tidak ditemukan dalam data yang dikirimkan.";
}
?>
