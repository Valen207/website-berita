<?php
session_start();
include 'koneksi.php';

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM admin
        WHERE username='$username'
        AND password='$password'"
    );

    $cek = mysqli_num_rows($query);

    if($cek > 0){

        $_SESSION['login'] = true;

        header("Location: admin/dashboard.php");

    } else {

        $error = "Username atau password salah!";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>

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
        </div>

    </div>

    <div class="container">

        <div class="card">

            <h1 style="margin-bottom:25px;">
                Login Admin
            </h1>

            <?php if($error != "") { ?>

                <p style="color:red; margin-bottom:15px;">
                    <?php echo $error; ?>
                </p>

            <?php } ?>

            <form method="POST">

                <input
                    type="text"
                    name="username"
                    placeholder="Username"
                    class="input"
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    class="input"
                >

                <button
                    type="submit"
                    name="login"
                    class="btn"
                    style="width:100%;"
                >
                    Login
                </button>

            </form>

        </div>

    </div>

</body>
</html>