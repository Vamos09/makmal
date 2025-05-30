<?php
include('connect.php');
session_start(); // Start session at the beginning

if (isset($_POST["create"])) {
    // Escape input data to avoid SQL injection
    $namamakmal = mysqli_real_escape_string($conn, $_POST["namamakmal"]);
    $picmakmal = mysqli_real_escape_string($conn, $_POST["picmakmal"]);
    $modul = mysqli_real_escape_string($conn, $_POST["modul"]);
    $pengajarmodul = mysqli_real_escape_string($conn, $_POST["pengajarmodul"]);

    // Insert query
    $sqlInsert = "INSERT INTO rekod_makmal (namamakmal, picmakmal, modul, pengajarmodul) 
                  VALUES ('$namamakmal', '$picmakmal', '$modul', '$pengajarmodul')";
    
    if (mysqli_query($conn, $sqlInsert)) {
        $_SESSION["create"] = "Makmal berjaya ditambah!";
        header("Location: index.php");
        exit(); // Always exit after header redirection
    } else {
        die("Terdapat masalah semasa menambah makmal.");
    }
}

if (isset($_POST["edit"])) {
    // Ensure the book ID is passed when updating
    $id = mysqli_real_escape_string($conn, $_POST["id"]); // Fetch the ID from the form
    
    // Escape input data
    $namamakmal = mysqli_real_escape_string($conn, $_POST["namamakmal"]);
    $picmakmal = mysqli_real_escape_string($conn, $_POST["picmakmal"]);
    $modul = mysqli_real_escape_string($conn, $_POST["modul"]);
    $pengajarmodul = mysqli_real_escape_string($conn, $_POST["pengajarmodul"]);
    
    // Update query with the correct ID
    $sqlUpdate = "UPDATE rekod_makmal SET namamakmal = '$namamakmal', picmakmal = '$picmakmal', modul = '$modul', pengajarmodul = '$pengajarmodul' WHERE id = '$id'";
    
    if (mysqli_query($conn, $sqlUpdate)) {
        $_SESSION["update"] = "Makmal berjaya dikemas kini!";
        header("Location: index.php");
        exit(); // Always exit after header redirection
    } else {
        die("Terdapat masalah semasa mengemas kini makmal.");
    }
}
?>