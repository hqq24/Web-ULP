<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
    function coba(){
        const  previousBtn  =  document.getElementById('previousBtn');
        const  nextBtn  =  document.getElementById('nextBtn');
        const  finishBtn  =  document.getElementById('finishBtn');
        const  content  =  document.getElementById('content');
        const  bullets  =  [...document.querySelectorAll('.bullet')];

        const MAX_STEPS = 4;
        let currentStep = 1;

        nextBtn.addEventListener('click',  ()  =>  {
            bullets[currentStep  -  1].classList.add('completed');
            currentStep  +=  1;
            previousBtn.disabled  =  false;
            if  (currentStep  ===  MAX_STEPS)  {
                nextBtn.disabled  =  true;
                finishBtn.disabled  =  false;
            }
            content.innerText  =  `Step Number ${currentStep}`;
        });

        previousBtn.addEventListener('click',  ()  =>  {
            bullets[currentStep  -  2].classList.remove('completed');
            currentStep  -=  1;
            nextBtn.disabled  =  false;
            finishBtn.disabled  =  true;
            if  (currentStep  ===  1)  {
                previousBtn.disabled  =  true;
            }
            content.innerText  =  `Step Number ${currentStep}`;
        });

        finishBtn.addEventListener('click',  ()  =>  {
            location.reload();
        });
    }
        
</script>
<?php
  session_start();

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

        $fetch1 = "SELECT * FROM rekap_tawaran WHERE jenis_pengajuan='Barang'";
        $result1 = mysqli_query($conn, $fetch1);
        $num1 = "SELECT COUNT(id) as total FROM rekap_tawaran WHERE jenis_pengajuan='Barang'";
        $count1 = mysqli_query($conn, $num1);
        $value1 = mysqli_fetch_assoc($count1);
        $rows1 = $value1['total'];
      
        $fetch2 = "SELECT * FROM rekap_tawaran WHERE jenis_pengajuan='Jasa'";
        $result2 = mysqli_query($conn, $fetch2);
        $num2 = "SELECT COUNT(id) as total FROM rekap_tawaran WHERE jenis_pengajuan='Jasa'";
        $count2 = mysqli_query($conn, $num2);
        $value2 = mysqli_fetch_assoc($count2);
        $rows2 = $value2['total'];

        $fetch3 = "SELECT * FROM rekap_tawaran WHERE jenis_pengajuan='Barang dan Jasa'";
        $result3 = mysqli_query($conn, $fetch3);
        $num3 = "SELECT COUNT(id) as total FROM rekap_tawaran WHERE jenis_pengajuan='Barang dan Jasa'";
        $count3 = mysqli_query($conn, $num3);
        $value3 = mysqli_fetch_assoc($count3);
        $rows3 = $value3['total'];

        $sum = $rows1 + $rows2 + $rows3;





    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];

        $fetch1 = "SELECT * FROM rekap_tawaran WHERE jenis_pengajuan='Barang' and tanggal_mulai LIKE '%".$cari."%'";
        $result1 = mysqli_query($conn, $fetch1);
        $num1 = "SELECT COUNT(id) as total FROM rekap_tawaran WHERE jenis_pengajuan='Barang' and tanggal_mulai LIKE '%".$cari."%'";
        $count1 = mysqli_query($conn, $num1);
        $value1 = mysqli_fetch_assoc($count1);
        $rows1 = $value1['total'];
      
        $fetch2 = "SELECT * FROM rekap_tawaran WHERE jenis_pengajuan='Jasa' and tanggal_mulai LIKE '%".$cari."%'";
        $result2 = mysqli_query($conn, $fetch2);
        $num2 = "SELECT COUNT(id) as total FROM rekap_tawaran WHERE jenis_pengajuan='Jasa' and tanggal_mulai LIKE '%".$cari."%'";
        $count2 = mysqli_query($conn, $num2);
        $value2 = mysqli_fetch_assoc($count2);
        $rows2 = $value2['total'];

        $fetch3 = "SELECT * FROM rekap_tawaran WHERE jenis_pengajuan='Barang dan Jasa' and tanggal_mulai LIKE '%".$cari."%'";
        $result3 = mysqli_query($conn, $fetch3);
        $num3 = "SELECT COUNT(id) as total FROM rekap_tawaran WHERE jenis_pengajuan='Barang dan Jasa' and tanggal_mulai LIKE '%".$cari."%'";
        $count3 = mysqli_query($conn, $num3);
        $value3 = mysqli_fetch_assoc($count3);
        $rows3 = $value3['total'];
        
    } else {
        $fetch1 = "SELECT * FROM rekap_tawaran WHERE jenis_pengajuan='Barang'";
        $result1 = mysqli_query($conn, $fetch1);
        $num1 = "SELECT COUNT(id) as total FROM rekap_tawaran WHERE jenis_pengajuan='Barang'";
        $count1 = mysqli_query($conn, $num1);
        $value1 = mysqli_fetch_assoc($count1);
        $rows1 = $value1['total'];
      
        $fetch2 = "SELECT * FROM rekap_tawaran WHERE jenis_pengajuan='Jasa'";
        $result2 = mysqli_query($conn, $fetch2);
        $num2 = "SELECT COUNT(id) as total FROM rekap_tawaran WHERE jenis_pengajuan='Jasa'";
        $count2 = mysqli_query($conn, $num2);
        $value2 = mysqli_fetch_assoc($count2);
        $rows2 = $value2['total'];

        $fetch3 = "SELECT * FROM rekap_tawaran WHERE jenis_pengajuan='Barang dan Jasa'";
        $result3 = mysqli_query($conn, $fetch3);
        $num3 = "SELECT COUNT(id) as total FROM rekap_tawaran WHERE jenis_pengajuan='Barang dan Jasa'";
        $count3 = mysqli_query($conn, $num3);
        $value3 = mysqli_fetch_assoc($count3);
        $rows3 = $value3['total'];
        
    }





    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];

        $fetch11 = "SELECT * FROM rekap_tawaran WHERE status='Proses' and tanggal_mulai LIKE '%".$cari."%'";
        $result11 = mysqli_query($conn, $fetch11);
        $num11 = "SELECT COUNT(id) as total1 FROM rekap_tawaran WHERE status='Proses' and tanggal_mulai LIKE '%".$cari."%'";
        $count11 = mysqli_query($conn, $num11);
        $value11 = mysqli_fetch_assoc($count11);
        $rows11 = $value11['total1'];
      
        $fetch22 = "SELECT * FROM rekap_tawaran WHERE status='Selesai' and tanggal_mulai LIKE '%".$cari."%'";
        $result22 = mysqli_query($conn, $fetch22);
        $num22 = "SELECT COUNT(id) as total1 FROM rekap_tawaran WHERE status='Selesai' and tanggal_mulai LIKE '%".$cari."%'";
        $count22 = mysqli_query($conn, $num22);
        $value22 = mysqli_fetch_assoc($count22);
        $rows22 = $value22['total1'];
        
    } else {
        $fetch11 = "SELECT * FROM rekap_tawaran WHERE status='Proses'";
        $result11 = mysqli_query($conn, $fetch11);
        $num11 = "SELECT COUNT(id) as total1 FROM rekap_tawaran WHERE status='Proses'";
        $count11 = mysqli_query($conn, $num11);
        $value11 = mysqli_fetch_assoc($count11);
        $rows11 = $value11['total1'];
      
        $fetch22 = "SELECT * FROM rekap_tawaran WHERE status='Selesai'";
        $result22 = mysqli_query($conn, $fetch22);
        $num22 = "SELECT COUNT(id) as total1 FROM rekap_tawaran WHERE status='Selesai'";
        $count22 = mysqli_query($conn, $num22);
        $value22 = mysqli_fetch_assoc($count22);
        $rows22 = $value22['total1'];
        
    }


  
  $email = $gender = '';
    $sqli = "SELECT * FROM kerma_user";
    $resultss = mysqli_query($conn, $sqli);
    	while($row = mysqli_fetch_assoc($resultss))
	{
	$id = $row['id'];
	$gender = $row["email"];
	$_SESSION['gender'] = $gender;
	}
	

  
    $sum1 = $rows11 + $rows22;




    $fetch111 = "SELECT * FROM rekap_tawaran WHERE tanggal_mulai like '%2021%'";
    $result111 = mysqli_query($conn, $fetch111);
    $num111 = "SELECT COUNT(id) as total2 FROM rekap_tawaran WHERE tanggal_mulai like '%2021%'";
    $count111 = mysqli_query($conn, $num111);
    $value111 = mysqli_fetch_assoc($count111);
    $rows111 = $value111['total2'];
  
    $fetch222 = "SELECT * FROM rekap_tawaran WHERE tanggal_mulai like '%2022%'";
    $result222 = mysqli_query($conn, $fetch222);
    $num222 = "SELECT COUNT(id) as total2 FROM rekap_tawaran WHERE tanggal_mulai like '%2022%'";
    $count222 = mysqli_query($conn, $num222);
    $value222 = mysqli_fetch_assoc($count222);
    $rows222 = $value222['total2'];
  
    $sum11 = $rows111 + $rows222;



    

 
            
        



    




    


    
    
  

?>

<style>
    .container {
                width: 40%;
                margin: 15px auto;
            }

            chart {
                background-color: #7F0000;
            }
</style>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    </head>
    <body>
        
        <div class="parent" style="background-image: url(''); 
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    background-size: 100%;
                                    height: 100%;
                                    overflow-x: hidden;
                                    overflow-y: auto;
                                    z-index: 1;
                                    ">
                                    
            
    <div class="row no-gutters">
        <div class="col-md-2 pr-2 pt-4" id="side">
            <ul class="nav flex-column ml-2" style="width:100%;">
                <li class="nav-item" style="width:100%; margin-bottom: 10px; border-radius: 20px;">
                  <div class="row">
                        <div class="col-md-4" style="width:50%;">
                            <div class="container">
                                <br>
                                <img src="images/logo-unusa.jpg" class="rounded-circle" width="70" height="70"> 
                            </div>
                        </div>
                        <div class="col">
                            <div class="nav-link active" style="margin-top: 25px; margin-bottom: 0px; color: white; font-size:19pt"><i class="fas fa-columns"></i> ULP UNUSA</div>
                            <a class="nav-link active" style="margin-top: 0px; color: white; font-size:14pt;" href="#"><i class="fas fa-columns"></i> <?php echo $gender ?> </a>
                        </div>
                  </div>
                </li>
                <hr color="white" width="90%" size="100%">
                <li class="nav-item" style="margin-top:10px; width:100%; background-color: white; margin-bottom: 10px; border-radius: 20px; opacity: 0.8">
                  <a class="nav-link active" style="margin-top: 15px; margin-bottom: 15px; color: black;" href="#"><i class="fas fa-columns"></i> Dashboard</a>
                </li>
                <li class="nav-item" style=" margin-bottom: 10px; border-radius: 20px; ">
                  <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="admin_upload.php"><i 
                  class="fas fa-cloud-upload-alt"></i> Pengadaan </a>
                </li>
                
                <li class="nav-item" style="margin-bottom: 10px; border-radius: 20px;">
                    <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="#"> <?php echo $gender ?> </a>
                </li>
                <li class="nav-item" style="margin-bottom: 10px; border-radius: 20px;">
                    <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="logout.php"> Log Out </a>
                </li>
            </ul>
        </div>
        <center>
        <div class="col-md-10 p-5 pt-3" style="margin-left:290px; ">
        

        <center>
            <h3> <i class="fas fa-columns"></i> Dashboard Pengadaan</a> </h3><hr>
        </center>
        <br>
        <div class="row text-white" style="display:flex; flex-wrap:nowrap; overflow-x:auto;">
            <div class="card ml-4 border-0" style="width: 50%; border-radius: 30px; background-color: #EC3F1B; opacity: 1">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-tasks mr-4"></i>
                    </div>
                  <h5 class="card-title">All Record</h5>
                  <div class="display-4"> <?php echo $sum ?> </div>
                </div>
            </div>
            <div class="card ml-4 border-0" style="width: 50%; border-radius: 30px; background-color: #FDA50F; opacity: 0.8">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-puzzle-piece mr-4"></i>
                    </div>
                  <h5 class="card-title">Barang</h5>
                  <div class="display-4"> <?php echo $rows1 ?> </div>
                </div>
            </div>
            <div class="card ml-4 border-0" style="width: 50%; border-radius: 30px; background-color: #4C724A; opacity: 0.8">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-check-circle mr-4"></i>
                    </div>
                  <h5 class="card-title">Jasa</h5>
                  <div class="display-4"> <?php echo $rows2 ?> </div>
                </div>
            </div>
            <div class="card ml-4 border-0" style="width: 50%; border-radius: 30px; background-color: #4C724A; opacity: 0.8">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-check-circle mr-4"></i>
                    </div>
                  <h5 class="card-title">Barang dan Jasa</h5>
                  <div class="display-4"> <?php echo $rows3 ?> </div>
                </div>
            </div>
            
            
        </div>
        
        <br>
        <br>
        <center>
            <form action="index.php" method="get">
                <select name="cari" style="height:45px; width:30%">  
                    <option value = "">  </option>  
                    <option value = "2020"> 2020 </option>  
                    <option value = "2021"> 2021 </option>  
                    <option value = "2022"> 2022 </option>    
                    <option value = "2023"> 2023 </option>    
                </select>
                <input type="submit" style="background-color:#183F8C; color:white; border:0px; padding:10px 30px; opacity: 0.8" value="Filter">
            </form>
        </center>
        <br>
        <br>
        
        <div class="row">
            <div class="col-mx-2" style="width:51%;">
                <div id="vendor"></div>
            </div>
            <div class="col" style="width:49%;">
                <div id="container3"></div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col" style="width: 50%;">
                <div id="container2"> </div>
            </div>
            <div class="col" style="width: 50%;">
                <div id="container1"> </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col" style="width: 50%;">
                <div id="container"> </div>
            </div>
            <div class="col" style="width: 50%;">
                <div id="jenis"> </div>
            </div>
        </div>
        <br>
        <br> 
        <div class="row">
            <div class="col" style="width: 50%;">
                <div id="perjalanan"> </div>
            </div>
            <div class="col" style="width: 50%;">
                <div id="bulan"> </div>
            </div>
        </div>

        <div class="row mt-4" style="display:flex">
            <?php 
                $fetchall = "SELECT * FROM rekap_tawaran WHERE id LIMIT 6";
                $result = mysqli_query($conn, $fetchall);
                while ($row_k = mysqli_fetch_array($result)){ 
                    $id2 = $row_k['id'];
                    $nomer_1 = $row_k['nomor_surat'];
                    $status_1 = $row_k['status'];
                    $jenis_1 = $row_k['jenis_pengajuan'];
                    $judul_1 = $row_k['judul_surat'];
                            
                    $_SESSION['id'] = $id2;
            ?>
            <div class="card ml-4 border-0" style="background-color:#183F8C; width:48%; margin-top:15px; height:160px; border-radius:30px; opacity:0.7">
                <div class="row">
                
                    <div class="col-md-5" >
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 11pt; margin-bottom: 30px; color: white"> <?php echo $judul_1 ?> </h5>
                            <div class="card-text" style="font-weight: bold; margin-left: 30px; font-size: 13pt; color: white">Status :</div>
                            <div class="card-text" style="font-weight: bold; margin-left: 30px; font-size: 13pt; color: white">Jenis  :</div>
                          </div>
                    </div>
                    <div class="col-md-7" >
                        <div class="card-body">
                        <h5 class="card-title" style="font-size: 11pt; margin-bottom: 30px; color: white"> <?php echo $nomer_1; ?> </h5>
                            <div class="card-text" style="font-weight: bold; margin-left: -30px; font-size: 13pt; color: white"> 
                            <?php echo $status_1; ?> </div>
                            <div class="card-text" style="font-weight: bold; margin-left: -30px; font-size: 13pt; color: white"> 
                            <?php echo $jenis_1; ?> </div>
                          </div>
                    </div>
                </div>
                
            </div>
            <?php
                }
            ?>              
        </div>
        <br>
        <br>
        <center>
            <div class="form-group1" style="display: inline-flex;">
                <a href="admin_upload.php" style="color: white; background-color: #183F8C; padding: 10px 30px; border-radius: 50px; "> ... Lihat Selengkapnya ... 
                </a>
            </div>
        </center>
        </div>
        </center>        
    </div>


    <script type="text/javascript">
    // Data retrieved from https://netmarketshare.com
Highcharts.chart('perjalanan', {
    chart: {
        backgroundColor: "transparent",
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Jumlah Pengadaan tiap alur'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y} '
            }
        }
    },
    series: [{
        name: 'Jumlah',
        color: '#183F8C',
        data: [
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

                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];

                    $grafik11 = "SELECT DISTINCT alur FROM rekap_tawaran WHERE tanggal_mulai LIKE '%".$cari."%'";
                    $tampil11 = mysqli_query($conn, $grafik11);
    
                    while ($temp111 = mysqli_fetch_array($tampil11))
                    {
                        $nama111 = $temp111['alur'];
                            $grafikG1 = "SELECT COUNT(id) as totalG1 FROM rekap_tawaran WHERE alur='$nama111' AND tanggal_mulai LIKE '%".$cari."%'";
                            $countG1 = mysqli_query($conn, $grafikG1);
                            $valueG1 = mysqli_fetch_assoc($countG1);
                            $rowsG1 = $valueG1['totalG1'];
                            echo"['".$nama111."',".$rowsG1."],";
                    }
                  } else {
                    $grafik11 = "SELECT DISTINCT alur FROM rekap_tawaran";
                    $tampil11 = mysqli_query($conn, $grafik11);
    
                    while ($temp111 = mysqli_fetch_array($tampil11))
                    {
                        $nama111 = $temp111['nama_instansi_2'];
                            $grafikG1 = "SELECT COUNT(id) as totalG1 FROM rekap_tawaran WHERE alur='$nama111'";
                            $countG1 = mysqli_query($conn, $grafikG1);
                            $valueG1 = mysqli_fetch_assoc($countG1);
                            $rowsG1 = $valueG1['totalG1'];
                            echo"['".$nama111."',".$rowsG1."],";
                    }
                  }
                  
                
            ?>
        ]
    }]
});

</script>




    <script type="text/javascript">
    Highcharts.chart('bulan', {
    chart: {
        backgroundColor: "transparent",
        type: 'column'
    },
    title: {
        text: 'Jumlah Pengadaan tiap bulan'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah',
        color: '#183F8C',
        data: [
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

                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];

                    $grafikT = "SELECT * FROM rekap_tawaran WHERE tanggal_mulai LIKE '%".$cari."%' ";
                    $tampilT = mysqli_query($conn, $grafikT);

                    while ($tempT = mysqli_fetch_array($tampilT))
                    {
                        $namaT = $tempT['tanggal_mulai'];
                        $newDate1 = date("d/m/Y", strtotime($namaT));
                        $explode = explode("/", $newDate1);
                        $tahun = $explode[2];
                        $bulan = $explode[1];
                        $getB = getRomawi($bulan);
                            $grafikG1 = "SELECT COUNT(id) as totalG1 FROM rekap_tawaran WHERE SUBSTRING_INDEX(tanggal_mulai,'/',1) LIKE '%". $bulan . "%' AND tanggal_mulai LIKE '%".$cari."%' ";
                                        
                            $countG1 = mysqli_query($conn, $grafikG1);
                            $valueG1 = mysqli_fetch_assoc($countG1);

                            $rowsG1 = $valueG1['totalG1'];
                            
                            echo"['".$getB."',".$rowsG1."],";
                    }
                  } else {
                    
                  }

                  
  
                  
                
            ?>
        ]
    }]
});
</script>


                
        
        
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        
        <script>
            config = {
                enableTime: true,
                dateFormat: "d/m/Y",
            }
            flatpickr("input[type=datetime-local]", config);
        </script>



<script type="text/javascript">
    // Data retrieved from https://netmarketshare.com
Highcharts.chart('vendor', {
    chart: {
        backgroundColor: "transparent",
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Jumlah Pengajuan tiap Vendor'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y} '
            }
        }
    },
    series: [{
        name: 'Jumlah',
        color: '#183F8C',
        data: [
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

                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];

                    $grafik11 = "SELECT DISTINCT nama_instansi_2 FROM rekap_tawaran WHERE tanggal_mulai LIKE '%".$cari."%'";
                    $tampil11 = mysqli_query($conn, $grafik11);
    
                    while ($temp111 = mysqli_fetch_array($tampil11))
                    {
                        $nama111 = $temp111['nama_instansi_2'];
                            $grafikG1 = "SELECT COUNT(id) as totalG1 FROM rekap_tawaran WHERE nama_instansi_2='$nama111' AND tanggal_mulai LIKE '%".$cari."%'";
                            $countG1 = mysqli_query($conn, $grafikG1);
                            $valueG1 = mysqli_fetch_assoc($countG1);
                            $rowsG1 = $valueG1['totalG1'];
                            echo"['".$nama111."',".$rowsG1."],";
                    }
                  } else {
                    $grafik11 = "SELECT DISTINCT nama_instansi_2 FROM rekap_tawaran";
                    $tampil11 = mysqli_query($conn, $grafik11);
    
                    while ($temp111 = mysqli_fetch_array($tampil11))
                    {
                        $nama111 = $temp111['nama_instansi_2'];
                            $grafikG1 = "SELECT COUNT(id) as totalG1 FROM rekap_tawaran WHERE nama_instansi_2='$nama111'";
                            $countG1 = mysqli_query($conn, $grafikG1);
                            $valueG1 = mysqli_fetch_assoc($countG1);
                            $rowsG1 = $valueG1['totalG1'];
                            echo"['".$nama111."',".$rowsG1."],";
                    }
                  }
                  
                
            ?>
        ]
    }]
});

</script>



<script type="text/javascript">
    // Data retrieved from https://netmarketshare.com
Highcharts.chart('jenis', {
    chart: {
        backgroundColor: "transparent",
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Jumlah Pengajuan tiap Kategori'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y} '
            }
        }
    },
    series: [{
        name: 'Jumlah',
        color: '#183F8C',
        data: [
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
                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];

                    $grafik111 = "SELECT DISTINCT jenis_barang FROM rekap_tawaran WHERE tanggal_mulai LIKE '%".$cari."%'";
                    $tampil111 = mysqli_query($conn, $grafik111);
    
                    while ($temp1111 = mysqli_fetch_array($tampil111))
                    {
                        $nama1111 = $temp1111['jenis_barang'];
                            $grafikG11 = "SELECT COUNT(id) as totalG11 FROM rekap_tawaran WHERE jenis_barang='$nama1111' AND tanggal_mulai LIKE '%".$cari."%'";
                            $countG11 = mysqli_query($conn, $grafikG11);
                            $valueG11 = mysqli_fetch_assoc($countG11);
                            $rowsG11 = $valueG11['totalG11'];
                            echo"['".$nama1111."',".$rowsG11."],";
                    }
                  } else {
                    $grafik111 = "SELECT DISTINCT jenis_barang FROM rekap_tawaran";
                    $tampil111 = mysqli_query($conn, $grafik111);
    
                    while ($temp1111 = mysqli_fetch_array($tampil111))
                    {
                        $nama1111 = $temp1111['jenis_barang'];
                            $grafikG11 = "SELECT COUNT(id) as totalG11 FROM rekap_tawaran WHERE jenis_barang='$nama1111'";
                            $countG11 = mysqli_query($conn, $grafikG11);
                            $valueG11 = mysqli_fetch_assoc($countG11);
                            $rowsG11 = $valueG11['totalG11'];
                            echo"['".$nama1111."',".$rowsG11."],";
                    }
                  }
                  
                
            ?>
        ]
    }]
});

</script>



<script type="text/javascript">
    // Data retrieved from https://netmarketshare.com
Highcharts.chart('container3', {
    chart: {
        backgroundColor: "transparent",
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Jumlah Pengajuan tip Unit'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y} '
            }
        }
    },
    series: [{
        name: 'Jumlah',
        color: '#183F8C',
        data: [
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
                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];

                    $grafik1 = "SELECT DISTINCT fakultas FROM rekap_tawaran WHERE tanggal_mulai LIKE '%".$cari."%'";
                    $tampil1 = mysqli_query($conn, $grafik1);
    
                    while ($temp11 = mysqli_fetch_array($tampil1))
                    {
                        $nama11 = $temp11['fakultas'];
                            $grafikG = "SELECT COUNT(id) as totalG FROM rekap_tawaran WHERE fakultas='$nama11' AND tanggal_mulai LIKE '%".$cari."%'";
                            $countG = mysqli_query($conn, $grafikG);
                            $valueG = mysqli_fetch_assoc($countG);
                            $rowsG = $valueG['totalG'];
                            echo"['".$nama11."',".$rowsG."],";
                    }
                  } else {
                    $grafik1 = "SELECT DISTINCT fakultas FROM rekap_tawaran";
                    $tampil1 = mysqli_query($conn, $grafik1);
    
                    while ($temp11 = mysqli_fetch_array($tampil1))
                    {
                        $nama11 = $temp11['fakultas'];
                            $grafikG = "SELECT COUNT(id) as totalG FROM rekap_tawaran WHERE fakultas='$nama11'";
                            $countG = mysqli_query($conn, $grafikG);
                            $valueG = mysqli_fetch_assoc($countG);
                            $rowsG = $valueG['totalG'];
                            echo"['".$nama11."',".$rowsG."],";
                    }
                  }

                
            ?>
        ]
    }]
});

</script>
<script type="text/javascript">
    Highcharts.chart('container2', {
    chart: {
        backgroundColor: "transparent",
        type: 'column'
    },
    title: {
        text: 'Jumlah Pengajuan per Tahun'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah',
        color: '#183F8C',
        data: [
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

                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];

                    $grafikT = "SELECT * FROM rekap_tawaran WHERE tanggal_mulai LIKE '%".$cari."%' ";
                    $tampilT = mysqli_query($conn, $grafikT);

                    while ($tempT = mysqli_fetch_array($tampilT))
                    {
                        $namaT = $tempT['tanggal_berakhir'];
                        $newDate1 = date("d/m/Y", strtotime($namaT));
                        $explode = explode("/", $newDate1);
                        $tahun = $explode[2];
                            $grafikG1 = "SELECT COUNT(id) as totalG1 FROM rekap_tawaran WHERE tanggal_mulai LIKE'%". $tahun . "%' ";
                            $countG1 = mysqli_query($conn, $grafikG1);
                            $valueG1 = mysqli_fetch_assoc($countG1);
                            $rowsG1 = $valueG1['totalG1'];
                            echo"['".$tahun."',".$rowsG1."],";
                    }
                  } else {
                    $grafikT = "SELECT * FROM rekap_tawaran";
                    $tampilT = mysqli_query($conn, $grafikT);

                    while ($tempT = mysqli_fetch_array($tampilT))
                    {
                        $namaT = $tempT['tanggal_berakhir'];
                        $newDate1 = date("d/m/Y", strtotime($namaT));
                        $explode = explode("/", $newDate1);
                        $tahun = $explode[2];
                            $grafikG1 = "SELECT COUNT(id) as totalG1 FROM rekap_tawaran WHERE tanggal_mulai LIKE'%". $tahun . "%' ";
                            $countG1 = mysqli_query($conn, $grafikG1);
                            $valueG1 = mysqli_fetch_assoc($countG1);
                            $rowsG1 = $valueG1['totalG1'];
                            echo"['".$tahun."',".$rowsG1."],";
                    }
                  }

                  
  
                  
                
            ?>
        ]
    }]
});
</script>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('container', {
            chart: {
                backgroundColor: "transparent",
                type: 'bar'
            },
            title: {
                text: 'Jenis Pengadaan'
            },
            xAxis: {
                categories: ['Barang', 'Jasa', 'Barang dan Jasa']
            },
            yAxis: {
                title: {
                    text: 'Jumlah per Tahun'
                }
            },
            series: [ {
                color: '#183F8C',
                name: 'Jumlah',
                data: [<?php echo $rows1 ?>, <?php echo $rows2 ?>, <?php echo $rows3 ?>  ]
            }]
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('container1', {
            chart: {
                backgroundColor: "transparent",
                type: 'bar'
            },
            title: {
                text: 'Status Kerjasama'
            },
            xAxis: {
                categories: ['Proses', 'Selesai']
            },
            yAxis: {
                title: {
                    text: 'Jumlah per Tahun'
                }
            },
            series: [ {
                color: '#183F8C',
                name: 'Jumlah',
                data: [<?php echo $rows11 ?>, <?php echo $rows22 ?>  ]
            }]
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('container22', {
            chart: {
                backgroundColor: "transparent",
                type: 'bar'
            },
            title: {
                text: 'Tahun Pengadaan'
            },
            xAxis: {
                categories: ['2021', '2022']
            },
            yAxis: {
                title: {
                    text: 'Jumlah per Tahun'
                }
            },
            series: [ {
                color: '#183F8C',
                name: 'Jumlah',
                data: [<?php echo $rows111 ?>, <?php echo $rows222 ?>  ]
            }]
        });
    });
</script>







        
    </body>
</html>

<style>
    #side {
        position:fixed; 
        display: inline-flex;
        height:1200px;
        background-color: #183F8C		;
    }
    #tiga {
        padding: 23px;
        background-color: #ffbb33;
        color: black;
        font-size: 15pt;
        border-radius: 30px;
    }
    #today {
        padding: 23px;
        background-color: #f44336;
        color: white;
        font-size: 15pt;
        border-radius: 30px;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
