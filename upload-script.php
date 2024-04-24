<?php

include 'koneksi.php';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();

$username = $_SESSION['username'];
$getusername = "SELECT id_user, username FROM users WHERE username LIKE '$username'";
$result = $conn->query($getusername);
$row = $result->fetch_assoc();

$judul = $_POST['judul'];
$produser = $_POST['produser'];
$tahun_produksi = $_POST['tahun_produksi'];
$sinopsis = $_POST['sinopsis'];
$uploader = $row['username'];
$id = $row['id_user'];

$sql = "INSERT INTO film (judul, produser, tahun_produksi, sinopsis, id, uploader)
VALUES ('$judul', '$produser', '$tahun_produksi', '$sinopsis', $id ,'$uploader');";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  header("Location: upload.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$target_dir = "film/video/";
$target_file = $target_dir . $last_id . '.' . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
  echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
} else {
  echo "Sorry, there was an error uploading your file.";
}

$conn->close();
?>