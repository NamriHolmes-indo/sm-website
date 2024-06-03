<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['mail'];
  $nama = $_POST['name'];
  $telepon = $_POST['telp'];
  $alamat = $_POST['alamat'];
  $password = $_POST['pass'];
  $repassword = $_POST['repass'];

  $host = "localhost";
  $username = "root";
  $password_db = "";
  $database = "restoku";

  $conn = new mysqli($host, $username, $password_db, $database);

  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  $sql = "INSERT INTO pembeli (email, nama, no_telp, alamat, pass) VALUES ('$email', '$nama', '$telepon', '$alamat', '$password')";

  if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
  } else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
  }


  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sang Minang</title>
    <link rel="stylesheet" href="style/logreg.css" />
</head>

<body>
    <main>
        <section class="kanan"></section>
        <section class="kiri">
            <div class="form-container">
                <h1>Registrasi</h1>
                <form action="" method="post">
                    <div class="input-container">
                        <input type="email" name="mail" id="mail" placeholder="Email" />
                        <input type="text" name="name" id="name" placeholder="Nama Lengkap" />
                        <input type="text" name="telp" id="telp" placeholder="Nomor Telepon" />
                        <input type="text" name="alamat" id="alamat" placeholder="Alamat Rumah" /><input type="password"
                            name="pass" id="pass" placeholder="Password" />
                        <input type="password" name="repass" id="repass" placeholder="Re-Password" />
                    </div>
                    <div class="button-container regis">
                        <div class="login-container regis">
                            <p>Sudah Punya Akun ?</p>
                            <a href="/login.php" rel="noopener noreferrer">Login</a>
                        </div>

                        <input type="submit" value="Daftar" />
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>