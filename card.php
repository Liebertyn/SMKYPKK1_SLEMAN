<div class="container">
    <div class="row">
        <?php
        $sql = "SELECT id_film, judul, sinopsis FROM film ORDER BY id_film DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()): ?>
                <div class="col-12 col-sm-6 col-md-3 p-2">
                    <a href="stream.php?id=<?php echo $row['id_film']; ?>">
                        <div class="card" style="width: 100%;">
                            <video src="film/video/<?php echo $row["id_film"]; ?>.mp4" class="card-img-top" alt="..."></video>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["judul"]; ?></h5>
                                <p class="card-text"><?php echo $row["sinopsis"]; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile;
        else: ?>
            0 results
        <?php endif;
        $conn->close();
        ?>
    </div>
</div>


<?php

?>