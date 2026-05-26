<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
}

$query = mysqli_query($conn,
    "SELECT * FROM berita ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="navbar">

        <div class="logo">
            Dashboard Admin
        </div>

        <div>
            <a href="../index.php">Website</a>
            <a href="../logout.php">Logout</a>
        </div>

    </div>

    <div class="container">

        <a
            href="tambah.php"
            class="tambah-berita"
            style="
                background:white;
                color:black;
                padding:14px 25px;
                border-radius:10px;
                text-decoration:none;
                display:block;
                width:100%;
                text-align:center;
                margin-bottom:25px;
                font-size:16px;
                font-weight:bold;
                box-shadow:0 4px 10px rgba(0,0,0,0.08);
            "
        >
            + Tambah Berita
        </a>

        <?php while($data = mysqli_fetch_assoc($query)) { ?>

            <div class="card">

                <h2>
                    <?php echo $data['judul']; ?>
                </h2>

                <div class="info">
                    <?php echo $data['kategori']; ?>
                    |
                    <?php echo $data['tanggal']; ?>
                </div>

                <br>

                <a
                    href="edit.php?id=<?php echo $data['id']; ?>"
                    style="
                        color:#1e3a8a;
                        text-decoration:none;
                    "
                >
                    Edit
                </a>

                |

                <a
                    href="hapus.php?id=<?php echo $data['id']; ?>"
                    style="
                        color:#dc2626;
                        text-decoration:none;
                    "
                >
                    Hapus
                </a>

            </div>

        <?php } ?>

    </div>

</body>
</html>