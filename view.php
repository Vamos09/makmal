<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Keterangan Makmal</title>

    <style>
        .book-details {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Keterangan</h1>
            <div>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </header>
        
        <div class="book-details p-5 my-4">
            <?php
            include("connect.php");

            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM rekod_makmal WHERE id = $id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <h3>Nama Makmal:</h3>
                        <p><?php echo $row["namamakmal"]; ?></p>

                        <h3>PIC Makmal:</h3>
                        <p><?php echo $row["picmakmal"]; ?></p>

                        <h3>Makmal TPP:</h3>
                        <p><?php echo $row["modul"]; ?></p>

                        <h3>Pengajar Modul:</h3>
                        <p><?php echo $row["pengajarmodul"]; ?></p>
                        <?php
                    }
                } else {
                    echo "<h3>Ralat semasa memuatkan rekod makmal.</h3>";
                }
            } else {
                echo "<h3>Tiada makmal dijumpai.</h3>";
            }
            ?>
        </div>
    </div>
</body>
</html>
