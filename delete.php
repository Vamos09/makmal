<?php 
// Periksa jika parameter 'id' wujud dalam URL
if (isset($_GET['id'])) {
    // Sertakan fail sambungan pangkalan data
    include("connect.php");

    // Bersihkan nilai 'id' untuk elakkan SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // SQL query untuk memadamkan rekod dari pangkalan data
    $sql = "DELETE FROM rekod_makmal WHERE id='$id'";

    // Laksanakan query dan semak sama ada berjaya atau tidak
    if (mysqli_query($conn, $sql)) {
        // Mulakan sesi dan tetapkan mesej kejayaan
        session_start();
        $_SESSION["delete"] = "Rekod makmal berjaya dibuang!";

        // Arahkan ke halaman index.php selepas berjaya
        header("Location: index.php");
        exit(); // Pastikan arahan header dilaksanakan
    } else {
        // Paparkan mesej jika ada masalah dengan query
        die("Terdapat masalah dalam memadam rekod!");
    }
} else {
    // Paparkan mesej jika tiada parameter 'id' dalam URL
    echo "makmal tidak wujud.";
}
?>
