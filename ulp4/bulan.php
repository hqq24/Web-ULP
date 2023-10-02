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

                  function getRomawi($bln){
                    switch ($bln){
                        case 1: 
                            return "Januari";
                        case 2:
                            return "Februari";
                        case 3:
                            return "Maret";
                        case 4:
                            return "April";
                        case 5:
                            return "Mei";
                        case 6:
                            return "Juni";
                        case 7:
                            return "Juli";
                        case 8:
                            return "Agustus";
                        case 9:
                            return "September";
                        case 10:
                            return "Oktober";
                        case 11:
                            return "November";
                        case 12:
                            return "Desember";
                    }
                }

                    $grafikT = "SELECT * FROM rekap_tawaran WHERE tanggal_berakhir LIKE '%2022%' AND tanggal_berakhir LIKE '06%' ";
                    $tampilT = mysqli_query($conn, $grafikT);

                    while ($tempT = mysqli_fetch_array($tampilT))
                    {
                        $namaT = $tempT['tanggal_berakhir'];
                        $newDate1 = date("d/m/Y", strtotime($namaT));
                        $explode = explode("/", $newDate1);
                        $tahun = $explode[2];
                        $bulan = $explode[1];
                        $getB = getRomawi($bulan);
                        
                        echo "$getB ,";
                    }
                  

                  
  
                  
                
            ?>