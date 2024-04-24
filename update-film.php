<?php
include 'header.php'
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<form action="script-update-film.php" method="POST" enctype="multipart/form-data">
    <div class="container mt-3">
        <div class="card p-3">
        <p class="fs-3" style="text-align: center;">Update</p>
       <div class="input-group mb-3 mt-3">
                <span class="input-group-text bg-dark c-white" style="color: white;"
                    id="inputGroup-sizing-default">Judul</span>
                <input type="text" name="judul" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-dark c-white" style="color: white;"
                    id="inputGroup-sizing-default">Produser</span>
                <input type="text" name="produser" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-dark c-white" style="color: white;"
                    id="inputGroup-sizing-default">Tahun produksi</span>
                <input type="text" name="tahun_produksi" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text bg-dark c-white" style="color: white;"
                    id="inputGroup-sizing-default">Sinopsis</span>
                <input type="text" name="sinopsis" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-3">

                <button type="submit" name="upload" class="btn btn-dark mt-3">Kirim</button>
            </div>
        </div>
    </div>
</form>