<?php
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn,
    "SELECT * FROM berita WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $data['judul']; ?>
    </title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="navbar">

        <div class="logo">
            BeritaKita
        </div>

        <div>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="login.php">Login</a>
        </div>

    </div>

    <div class="container">

        <div class="card">

            <h1 style="margin-bottom:15px;">
                <?php echo $data['judul']; ?>
            </h1>

            <div class="info">
                Kategori:
                <?php echo $data['kategori']; ?>
                |
                Tanggal:
                <?php echo $data['tanggal']; ?>
            </div>

            <br>

            <p style="line-height:1.8;">
                <?php echo nl2br($data['isi']); ?>
            </p>

        </div>

    </div>

</body>
</html>