<?php
include 'koneksi.php';
include 'header.php';

$password = $_SESSION['password'];
$username = $_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $new_username = $_POST['username'];
        $new_password = $_POST['password'];
        $getid = "SELECT id_user FROM users WHERE username LIKE '$username'";
        $result = $conn->query($getid);
        $row = $result->fetch_assoc();
        $id = $row["id_user"];

        $sql = "UPDATE users SET username ='$new_username', password ='$new_password' WHERE  id_user LIKE '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            $_SESSION['password'] = $new_password;
            $_SESSION['username'] = $new_username;

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
</head>

<body>
    <div class="container mt-4 position-absolute top-50 start-50 translate-middle" style="width: 450px;">
        <div class="card p-2">
            <div class="card-body">
                <form method="post">
                    <p class="fs-3" style="text-align: center;">Update</p>
                    <div class="form-floating mb-3">
                        <input type="text" aria-label="username" name="username" class="form-control" id="floatingInput"
                            placeholder="name@example.com" value="<?php echo $username; ?>">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Password" value="<?php echo $password; ?>">
                        <label for="floatingPassword">Password</label>
                        <button type="submit" name="submit" class="btn btn-dark mt-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>