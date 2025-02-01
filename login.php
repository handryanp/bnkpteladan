<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="BNKP Teladan">
    <meta name="author" content="Tim Metal">
    <title>Login Gereja BNKP Teladan Medan</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
    <link href="assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <?php
    session_start();
    include 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT user_id, user_nm, role_id FROM tbluser WHERE user_nm = '$username' AND user_pass = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['user_nm'];
            $_SESSION['role_id'] = $row['role_id'];

            $role_query = "SELECT role_nama FROM tblrole WHERE role_id = " . $row['role_id'];
            $role_result = mysqli_query($conn, $role_query);
            if (mysqli_num_rows($role_result) == 1) {
                $role_row = mysqli_fetch_assoc($role_result);
                $_SESSION['role_name'] = $role_row['role_nama'];
            }

            switch ($row['role_id']) {
                case 1:
                case 2:
                    header("Location: warta_create.php");
                    break;
                case 3:
                    header("Location: warta_verifikasi.php");
                    break;
                case 4:
                    header("Location: shintua_beranda.php");
                    break;
                default:
                    header("Location: login.php");
                    exit();
            }
            exit();
        } else {
            $_SESSION['error'] = "Username atau password tidak sesuai!";
            header("Location: login.php");
            exit();
        }
    }
    ?>

    <div class="login-container">
        <h1 class="text-primary">Gereja BNKP Teladan Medan</h1>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
        ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input class="form-control" type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                Lupa Password?<a style="color: #5D5A88;" href="tel:0617366035" target="_blank"> Hubungi Kami
                </a>
            </div>
            <div class="form-group">
                <a href="">
                    <button class="btn btn-primary btn-block" type="submit" name="btnLogin">Login</button>
                </a>
            </div>
            <div class="form-group">
                <a href="user_beranda.php" class="btn btn-primary btn-block">Kembali</a>
            </div>
        </form>
        <div class="copyright">
            Copyright &copy; 2024 : Zaldy &amp; Andhika &amp; Handryan
        </div>
    </div>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            font-family: Arial, sans-serif;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('img/carousel-1.jpg') no-repeat center center fixed;
            background-size: cover;
            z-index: -2;
        }

        body::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(21, 36, 64, .7);
            z-index: -1;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }


        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: calc(100% - 10px);
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group select {
            width: calc(100% - 10px);
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #f56c73;
            border-color: #f4636b;
        }

        .btn-block {
            display: block;
            width: 350px;
            background-color: #5D5A88;
        }

        .text-primary {
            color: #5D5A88 !important;
        }

        .text-center {
            font-size: small;
        }

        .copyright {
            margin-top: 20px;
            color: black;
            z-index: 1;
            text-align: center;
            font-size: 14px;
        }
    </style>
</body>

</html>