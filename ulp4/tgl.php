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

$namaT = '08/01/2022';
$newDate1 = date("d/m/Y", strtotime($namaT));
$explode = explode("/", $newDate1);
$tahun = $explode[2];
//echo $tahun;

$tgl = "SELECT SUBSTRING('Quadratically',5)";
$result = mysqli_query($conn,$tgl);

$satu1 = "SELECT * FROM `rekap_tawaran` WHERE SUBSTRING_INDEX(tanggal_mulai,'/',1) LIKE '%11%'";

//$satu = "SELECT tanggal_mulai, SUBSTRING('satu' ,1)  FROM rekap_tawaran";
$tampilT = mysqli_query($conn, $satu1);

while ($valueG1 = mysqli_fetch_array($tampilT))
{
    $rowsG1 = $valueG1['tanggal_mulai'];
    echo ($rowsG1 . ",");
}

?>