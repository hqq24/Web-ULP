<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "ulp_1";

try {
    $dbcon = new PDO("mysql:host={$dbHost};dbname={$dbName}",$dbUser,$dbPassword);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die($e->getMessage());
}


$stmt = $dbcon->prepare("SELECT * FROM bentuk ORDER BY jumlah DESC LIMIT 5 ");
$stmt->execute();
$json = [];
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $json[]= [(string)$bentuk_kerjasama, (int)$jumlah];
}
echo json_encode($json); 

/*$fetch1 = "SELECT * FROM coba";
$result1 = mysqli_query($conn, $fetch1);
$value1 = mysqli_fetch_assoc($result1);
$json = [];
while ($row = mysqli_fetch_assoc($result1)){
    $id = $row['id'];
    $sales = $row['coba'];
    $num = $row['jumlah'];
    $json[]=[(int)$id, (int)$num];

}

echo json_encode($json);*/

?>