<?php
include 'header.php';
$password = $_SESSION['password'];
$username = $_SESSION['username'];

?>

<div class="container mt-4" style="width: 350px">
    <div class="card p-2">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $password; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
                <div class="p-4">
                <div class="card" style="text-align: center;">
                <a class="nav-link active" style="height: 35px; margin-top: 10px" aria-current="page" href="update.php">Update</a>
                </div>
                </div>
            </div>
            <nav class="navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
    </div>
</div>