<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
}

$id = $_GET['id'];

$query = mysqli_query($conn,
    "SELECT * FROM berita WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($conn,
        "UPDATE berita SET
            judul='$judul',
            isi='$isi',
            kategori='$kategori',
            tanggal='$tanggal'
        WHERE id='$id'"
    );

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Berita</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="navbar">

        <div class="logo">
            Edit Berita
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
                    value="<?php echo $data['judul']; ?>"
                    class="input"
                >

                <textarea
                    name="isi"
                    class="input"
                ><?php echo $data['isi']; ?></textarea>

                <input
                    type="text"
                    name="kategori"
                    value="<?php echo $data['kategori']; ?>"
                    class="input"
                >

                <input
                    type="date"
                    name="tanggal"
                    value="<?php echo $data['tanggal']; ?>"
                    class="input"
                >

                <button
                    type="submit"
                    name="submit"
                    class="btn"
                >
                    Update Berita
                </button>

            </form>

        </div>

    </div>

</body>
</html>