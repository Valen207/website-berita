<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Website Berita</title>

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

        <?php while($data = mysqli_fetch_assoc($query)) { ?>

            <div class="card">

                <h2>
                    <?php echo $data['judul']; ?>
                </h2>

                <div class="info">
                    Kategori:
                    <?php echo $data['kategori']; ?>
                    |
                    Tanggal:
                    <?php echo $data['tanggal']; ?>
                </div>

                <p>

                    <?php echo substr($data['isi'], 0, 150); ?>...

                    <a
                        href="detail.php?id=<?php echo $data['id']; ?>"
                        style="
                            color:#1e3a8a;
                            text-decoration:none;
                        "
                    >
                        Baca selengkapnya
                    </a>

                </p>

            </div>

        <?php } ?>

    </div>

</body>
</html>