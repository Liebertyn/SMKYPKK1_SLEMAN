<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>

    <?php include 'header.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <form action="upload-script.php" method="POST" enctype="multipart/form-data">
        <div class="container mt-3">
            <div class="card p-3">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-dark c-white" style="color: white;"
                        id="inputGroup-sizing-default">Judul</span>
                    <input type="text" name="judul" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-dark c-white" style="color: white;"
                        id="inputGroup-sizing-default">Produser</span>
                    <input type="text" name="produser" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-dark c-white" style="color: white;"
                        id="inputGroup-sizing-default">Tahun produksi</span>
                    <input type="text" name="tahun_produksi" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text bg-dark c-white" style="color: white;"
                        id="inputGroup-sizing-default">Sinopsis</span>
                    <input type="text" name="sinopsis" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" name="file" type="file" id="formFile" accept=".mp4" required>

                    <button type="submit" name="upload" class="btn btn-dark mt-3">Kirim</button>
                </div>
            </div>
        </div>
    </form>
    <div class="container">
        <div class="row">
            <p> <br> Film yang anda upload : <br></p>
            <?php
            include 'koneksi.php';
            $username = $_SESSION['username'];
            $getid = "SELECT id_user FROM users WHERE username LIKE '$username'";
            $result = $conn->query($getid);
            $row = $result->fetch_assoc();
            $id = $row["id_user"];

            $sql = "SELECT id_film, judul, sinopsis FROM film WHERE id LIKE '$id' ORDER BY id_film DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()): ?>
                    <div class="col-12 col-sm-6 col-md-3 p-2">
                        <a href="stream.php?id=<?php echo $row['id_film']; ?>">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <video src="film/video/<?php echo $row["id_film"]; ?>.mp4" class="card-img-top"
                                        alt="..."></video>
                                    <h5 class="card-title"><?php echo $row["judul"]; ?></h5>
                                    <p class="card-text"><?php echo $row["sinopsis"]; ?></p>
                                </div>
                            </div>
                        </a>
                        <div class="container">
                            <form action="update-film.php" method="POST">
                                <div class="row">
                                    <a type="submit" href="update-film.php" class="btn btn-dark mt-3"><i
                                            class="bi bi-pencil-square"></i></a>
                                </div>
                        </div>

                    </div>
                <?php endwhile;
            else: ?>
                0 results
            <?php endif;
            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>