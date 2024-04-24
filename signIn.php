<?php
session_start();
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['submit'])) {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);
        $_SESSION['username'] = $username;

        if ($result->num_rows > 0) {
            header("Location: main.php");
        }
    }
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4 position-absolute top-50 start-50 translate-middle" style="width: 450px;">
        <div class="card p-2">
            <div class="card-body">
                <form method="post">
                    <p class="fs-3" style="text-align: center;">Sign In</p>
                    <div class="form-floating mb-3">
                        <input type="text" aria-label="username" name="username" class="form-control" id="floatingInput"
                            placeholder="name@example.com" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        <p>Belum punya akun? silahkan <a href="signUp.php">Daftar</a></p>
                        <button type="submit" name="submit" class="btn btn-dark">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>