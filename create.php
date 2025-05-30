<?php
// create.php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Tambah Makmal TPP</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between align-items-center my-4">
            <h1>Tambah Makmal TPP</h1>
            <a href="index.php" class="btn btn-primary float-end">Kembali</a>
        </header>

        <form action="process.php" method="post">
            <div class="form-element my-4">
                <input type="text" class="form-control" name="modul" placeholder="Nama Modul:" required>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="picmakmal" placeholder="PIC Makmal:">
            </div>

            <div class="form-element my-4">
                <select name="namamakmal" id="" class="form-control">
                    <option value="">Pilih Makmal Komputer TPP</option>
                    <option value="Makmal Aplikasi Mobile">Aplikasi Mobile</option>
                    <option value="Makmal Network">Makmal Network</option>
                    <option value="Makmal IOT">Makmal IOT</option>
                </select>
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="pengajarmodul" placeholder="Pengajar Modul:">
            </div>

            <div class="form-element my-4">
                <input type="submit" name="create" value="Tambah Makmal" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>
