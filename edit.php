<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Kemas Kini Makmal</title>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Kemas Kini Makmal</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <?php
            if (isset($_GET['id'])) {
                include("connect.php");

                // Dapatkan ID dari URL
                $id = $_GET['id'];

                // Betulkan query
                $sql = "SELECT * FROM rekod_makmal WHERE id=$id";
                $result = mysqli_query($conn, $sql);

                // Semak jika rekod wujud
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    ?>

                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="modul" placeholder="Nama Modul;" value="<?php echo $row["modul"]; ?>" required>
                    </div>

                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="picmakmal" placeholder="PIC Makmal:" value="<?php echo $row["picmakmal"]; ?>" required>
                    </div>

                    <div class="form-element my-4">
                        <select name="namamakmal" class="form-control" required>
                            <option value="">Pilih Makmal Komputer TPP:</option>
                            <option value="Makmal Aplikasi Mobile" <?php if($row["namamakmal"] == "Makmal Aplikasi Mobile") { echo "selected"; } ?>>Aplikasi Mobile</option>
                            <option value="Makmal Network" <?php if($row["namamakmal"] == "Makmal Network") { echo "selected"; } ?>>Makmal Network</option>
                            <option value="Makmal IOT" <?php if($row["namamakmal"] == "Makmal IOT") { echo "selected"; } ?>>Makmal IOT</option>
                        </select>
                    </div>

                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="pengajarmodul" placeholder="Pengajar Modul:" value="<?php echo $row["pengajarmodul"]; ?>" required>
                    </div>

                    <input type="hidden" value="<?php echo $id; ?>" name="id">

                    <div class="form-element my-4">
                        <input type="submit" name="edit" value="Kemas Kini Makmal" class="btn btn-primary">
                    </div>

                    <?php
                } else {
                    echo "<h3>Makmal tidak wujud.</h3>";
                }
            } else {
                echo "<h3>Makmal tidak wujud.</h3>";
            }
            ?>
        </form>
    </div>
</body>
</html>
