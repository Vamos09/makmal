<?php
session_start();

// Teruskan dengan kod sedia ada...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Senarai Makmal TPP</title>

    <style>
        table td, table th {
            vertical-align: middle;
            text-align: center;
            padding: 20px !important;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .container {
            margin-top: 50px;
        }

        .btn-blue {
            background-color: #007bff;
            color: white;
        }

        .btn-yellow {
            background-color: #ffc107;
            color: white;
        }

        .btn-red {
            background-color: #dc3545;
            color: white;
        }

        #tambah{
            margin-left: 30rem;
        }

    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between align-items-center my-4">
            <h1>Senarai Makmal TPP</h1>
            <a href="create.php" class="btn btn-primary" id="tambah">Tambah Makmal</a>
            <a href="index.php" class="btn btn-danger">Log Keluar</a>
        </header>

        <!-- Paparan mesej kejayaan atau ralat -->
        <?php
        if (isset($_SESSION["create"])) {
            echo '<div class="alert alert-success">' . $_SESSION["create"] . '</div>';
            unset($_SESSION["create"]);
        }

        if (isset($_SESSION["update"])) {
            echo '<div class="alert alert-success">' . $_SESSION["update"] . '</div>';
            unset($_SESSION["update"]);
        }

        if (isset($_SESSION["delete"])) {
            echo '<div class="alert alert-success">' . $_SESSION["delete"] . '</div>';
            unset($_SESSION["delete"]);
        }
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Makmal</th>
                    <th>PIC Makmal</th>
                    <th>Modul</th>
                    <th>Pengajar Modul</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

            <?php
            include('connect.php');
            $sqlSelect = "SELECT * FROM rekod_makmal";
            $result = mysqli_query($conn, $sqlSelect);

            $count = 1; // Variabel untuk nomor urut dinamis
            if ($result && mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    
                    <td><?php echo htmlspecialchars($data['id']); ?></td>
                    <td><?php echo htmlspecialchars($data['namamakmal']); ?></td>
                    <td><?php echo htmlspecialchars($data['picmakmal']); ?></td>
                    <td><?php echo htmlspecialchars($data['modul']); ?></td>
                    <td><?php echo htmlspecialchars($data['pengajarmodul']); ?></td>
                    <td>
                        <a href="view.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-blue">Lebih lanjut</a>
                        <a href="edit.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-yellow">Kemas kini</a>
                        <a href="delete.php?id=<?php echo htmlspecialchars($data['id']); ?>" onclick="return confirm('Adakah anda pasti ingin buang rekod ini?')" class="btn btn-red">Buang</a>
                    </td>
                </tr>
            <?php
                $count++; // Nomor urut bertambah
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Tiada rekod makmal dijumpai.</td></tr>";
            }
            ?>

            </tbody>
        </table>
    </div>
</body>
</html>
