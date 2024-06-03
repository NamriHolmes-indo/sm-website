<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['mail'];
  $password = $_POST['pass'];

  $host = "localhost";
  $username = "root";
  $password_db = "";
  $database = "restoku";

  $conn = new mysqli($host, $username, $password_db, $database);

  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM pembeli WHERE email='$email' AND pass='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    header("Location: index.php");
    exit();
  } else {
    echo "<script>alert('Login gagal. Email $email atau password $password salah. ');</script>";
  }

  // Tutup koneksi
  $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sederhana Jaya</title>
    <meta http-equiv="refresh" content="1">
    <link rel="stylesheet" href="style/logreg.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="columns-2 md:columns-2">
        <section class="kanan md:shrink-0"></section>
        <section class="kiri ">
            <div class="form-container ">
                <h1 class="text-center text-lg sm:text-left sm:text-xs">Masuk</h1>
                <form action="" method="post">
                    <div class="input-container">
                        <input type="email" name="mail" id="mail" placeholder="Email" />
                        <input type="password" name="pass" id="pass" placeholder="Password" />
                    </div>
                    <div class="button-container">
                        <a href="#">Lupa Password</a>
                        <input type="submit" value="Masuk" />
                    </div>
                </form>
            </div>

            <div class="regis-container">
                <p>Belum Punya Akun ?</p>
                <a href="/registrasi.php" rel="noopener noreferrer">Daftar Sekarang</a>
            </div>
        </section>
    </main>
</body>

</html>