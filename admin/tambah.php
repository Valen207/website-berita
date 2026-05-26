<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
}

if(isset($_POST['submit'])){

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($conn,
        "INSERT INTO berita 
        VALUES(
            NULL,
            '$judul',
            '$isi',
            '$kategori',
            '',
            '$tanggal'
        )"
    );

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Berita</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="navbar">

        <div class="logo">
            Tambah Berita
        </div>

        <div>
            <a href="dashboard.php">Dashboard</a>
            <a href="../logout.php">Logout</a>
        </div>

    </div>

    <div class="container">

        <div class="card">

            <form method="POST">

                <input
                    type="text"
                    name="judul"
                    placeholder="Judul Berita"
                    class="input"
                >

                <textarea
                    name="isi"
                    placeholder="Isi berita"
                    class="input"
                ></textarea>

                <input
                    type="text"
                    name="kategori"
                    placeholder="Kategori"
                    class="input"
                >

                <input
                    type="date"
                    name="tanggal"
                    class="input"
                >

                <button
                    type="submit"
                    name="submit"
                    class="btn"
                >
                    Tambah Berita
                </button>

            </form>

        </div>

    </div>

</body>
</html>