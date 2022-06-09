<?php
require "../config/connect.php";
require "../config/functions.php";

$id = $_GET['code'];

$tugas = read("SELECT * FROM todo WHERE id='$id'")[0];

if (isset($_POST['submit'])) {
    ubah();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/hero1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>TO DO LIST: UBAH</title>
</head>
<body >
    <div class="jarak">
        <div class="container clearfix">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <h1 class="d-flex justify-content-center gaya">Change Task</h1>
            <!-- input tugas -->
            <form action="" method="POST">
                <div>
                <input type="text" class="form-control" name="ubah" placeholder="Masukkan tugas anda" value="<?= $tugas['isi']; ?>">
                <input type="hidden" name="id" value="<?= $tugas['id']; ?>">
                <div class="p2">
                <input type="date" class="form-control" name="startdate" value="<?= $tugas['mulai']; ?>">
            </div>
            <div class="p2">
                <input type="date" class="form-control" name="enddate" value="<?= $tugas['akhir']; ?>">
            </div>
                <div class="pindah">
                    <div class="row">
                        <button class="btn btn-outline-success col-4" type="submit" name="submit"><i class="fw-bolder">Add</i></button>
                    </div>
                </div>
                </div>
            </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        </div>
    </div>
</body>
</html>