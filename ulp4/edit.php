<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "ulp_1";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

try {
    $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
    echo "DB Connection Failed: " . $e->getMessage();
}

$get = $_GET['edit'];

if(isset($_POST['submit1'])) {

    $status = $_POST['alur'];
    $tanggal_proses = $_POST['tanggal_proses'];

    $add = "UPDATE rekap_tawaran SET alur = '$_POST[alur]' WHERE id='$get'";


    $stmt = $pdo->prepare($add);
    $data = mysqli_query($conn, $add);
    if ($data) {
        header('Location: admin_edit.php?id=' . $get);
        echo '<script type="text/javascript"> alert("Edit Success :) :) :)") </script>';
    }else {
        echo '<script type="text/javascript"> alert("Failed") </script>';
    }
    
    


    $add_status = "INSERT INTO tracker (dispo_id, status, tanggal) VALUES ('$get',
    '$status', '$tanggal_proses')";


    $stmt1 = $pdo->prepare($add_status);
    $data1 = mysqli_query($conn, $add_status);
}
if(isset($_POST['submit_kuitansi'])) {

    $status = $_POST['alur'];

    $add = "UPDATE rekap_tawaran SET kuitansi = '$_POST[alur]' WHERE id='$get'";


    $stmt = $pdo->prepare($add);
    $data = mysqli_query($conn, $add);
    if ($data) {
        header('Location: admin_edit_kuitansi.php?id=' . $get);
        echo '<script type="text/javascript"> alert("Edit Success :) :) :)") </script>';
    }else {
        echo '<script type="text/javascript"> alert("Failed") </script>';
    }  
}
if(isset($_POST['submit_invoice'])) {

    $status = $_POST['alur'];

    $add = "UPDATE rekap_tawaran SET invoice = '$_POST[alur]' WHERE id='$get'";


    $stmt = $pdo->prepare($add);
    $data = mysqli_query($conn, $add);
    if ($data) {
        header('Location: admin_edit_invoice.php?id=' . $get);
        echo '<script type="text/javascript"> alert("Edit Success :) :) :)") </script>';
    }else {
        echo '<script type="text/javascript"> alert("Failed") </script>';
    }  
}
if(isset($_POST['submit_pajak'])) {

    $status = $_POST['alur'];

    $add = "UPDATE rekap_tawaran SET faktur_pajak = '$_POST[alur]' WHERE id='$get'";


    $stmt = $pdo->prepare($add);
    $data = mysqli_query($conn, $add);
    if ($data) {
        header('Location: admin_edit_invoice.php?id=' . $get);
        echo '<script type="text/javascript"> alert("Edit Success :) :) :)") </script>';
    }else {
        echo '<script type="text/javascript"> alert("Failed") </script>';
    }  
}

?>