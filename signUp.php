<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $conn->insert_id;

        $sql = "INSERT INTO users (username, password) 
           VALUE ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;

            header("Location: main.php");
        } else {
            die("error ") . $conn->error;
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

<div class="container mt-4 position-absolute top-50 start-50 translate-middle" style="width: 450px;">
    <div class="card p-2">
        <div class="card-body">
            <form method="post">
                <p class="fs-3" style="text-align: center;">Sign Up</p>
                <div class="form-floating mb-3">
                    <input type="text" name="username" required aria-label="username" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" required class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <p>Sudah punya akun? silahkan <a href="signIn.php">Masuk</a></p>
                    <button type="submit" name="submit" class="btn btn-dark">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>