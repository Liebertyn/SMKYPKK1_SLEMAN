<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php
include 'koneksi.php';
include 'header.php';

$id_film = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    $username = $_SESSION["username"];

    $sql = "INSERT INTO komentar (username, komentar, id_film) VALUES ('$username', '$comment', '$id_film')";
    if (!$conn->query($sql) === TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM film WHERE id_film = $id_film";
$result = $conn->query($sql);

if ($result->num_rows > 0):
    while ($row = $result->fetch_assoc()): ?>
        <div class="container mr-20">
            <video src="film/video/<?php echo $row["id_film"]; ?>.mp4" controls style="max-width: 720px;"></video>
            <div style="background-color: #00000017; border-radius: 10px; padding: 30px; width: 720px; margin-top: 20px">
                <h1><?php echo $row["judul"]; ?></h1>
                <p>sinopsis : <br> <?php echo $row["sinopsis"]; ?></p>
                <p>produser : <br> <?php echo $row["produser"]; ?></p>
                <p>Tahun produksi : <br> <?php echo $row["tahun_produksi"]; ?></p>
                <p>diupload oleh : <br> <?php echo $row["uploader"]; ?></p>
            </div>
            <form class="row g-3 mt-2" method="post">
                <div class="col-auto">
                    <input type="text" class="form-control" id="inputPassword2" name="comment" placeholder="Komentar">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">kirim</button>
                </div>
            </form>
            <?php
            $sql_comments = "SELECT * FROM komentar WHERE id_film = $id_film ORDER BY id_komentar DESC";
            $result_comments = $conn->query($sql_comments);

            if ($result_comments->num_rows > 0):
                while ($row_comment = $result_comments->fetch_assoc()): ?>
                    <div style="background-color: #f8f9fa; border-radius: 10px; padding: 10px; margin-top:10px;">
                        <h5><?php echo $row_comment["username"]; ?></h5>
                        <p><?php echo $row_comment["komentar"]; ?></p>
                    </div>
                <?php endwhile;
            else: ?>
                No comments yet
            <?php endif; ?>
        <?php endwhile;
else: ?>
        Film not found
    <?php endif;
$conn->close();
?>