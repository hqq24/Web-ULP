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


    $email = $gender = '';
    $sqli = "SELECT * FROM kerma_user";
    $resultss = mysqli_query($conn, $sqli);
	    while($row = mysqli_fetch_assoc($resultss))
	    {
		    $id = $row['id'];
		    $gender = $row["email"];
		    $_SESSION['gender'] = $gender;
	    }

        if(isset($_POST['update'])) {
            $id_edit = $_GET['edit_data'];

            if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
              $file = "attachment/" . basename($_FILES['attachment']['name']);
              move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
            } else
              $file = "";
      
            $add = "UPDATE lapor_kerma SET status = '$_POST[status]', tanggal_mulai = '$_POST[tanggal_mulai]',
                    tanggal_berakhir = '$_POST[tanggal_berakhir]', file = '$file', jenis_mitra = '$_POST[jenis_mitra]',
                    jenis_pengajuan = '$_POST[jenis_pengajuan]', nomer_surat = '$_POST[nomer_surat]',
                    judul_pengajuan = '$_POST[judul_pengajuan]', deskripsi = '$_POST[deskripsi]', nama_instansi_1 =
                    '$_POST[nama_instansi_1]', alamat_instansi_1 = '$_POST[alamat_instansi_1]', nama_1 = '$_POST[nama_1]',
                    jabatan_1 = '$_POST[jabatan_1]', nama_instansi_2 = '$_POST[nama_instansi_2]', alamat_instansi_2 =
                    '$_POST[alamat_instansi_2]', nama_2 = '$_POST[nama_2]', jabatan_2 = '$_POST[jabatan_2]',
                    bentuk_kegiatan = '$_POST[bentuk_kegiatan]', sasaran_kegiatan = '$_POST[sasaran_kegiatan]',
                    indikator_kinerja = '$_POST[indikator_kinerja]' WHERE id='$id_edit'";
      
            $stmt = $pdo->prepare($add);
            $data = mysqli_query($conn, $add);
            if ($data) {
              echo '<script type="text/javascript"> alert("Update Success :) :) :)") </script>';
            }else {
              echo '<script type="text/javascript"> alert("Failed") </script>';
            }
      
            
      
            
        }
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
        }

  //$fetch = "SELECT * FROM upload";
  //$result = mysqli_query($conn, $fetch);
  //$num = "SELECT COUNT(id) as total FROM upload WHERE status!='arrived'";
  //$count = mysqli_query($conn, $num);
  //$value = mysqli_fetch_assoc($count);
  //$rows = $value['total'];

  //$fetch1 = "SELECT * FROM upload WHERE status='arrived'";
  //$result1 = mysqli_query($conn, $fetch1);
  //$num1 = "SELECT COUNT(id) as total FROM upload WHERE status='arrived'";
  //$count1 = mysqli_query($conn, $num1);
  //$value1 = mysqli_fetch_assoc($count1);
  //$rows1 = $value1['total'];

  //$sqlsss = "SELECT SUM(piece) AS sums FROM upload";
    //$resultsss = mysqli_query($conn, $sqlsss);
    //if(mysqli_num_rows($resultsss) > 0)
    //{
      //  while($row = mysqli_fetch_assoc($resultsss))
        //{
          //  $sum = $row["sums"];
        //}
    //}  
  

?>

<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web/css/all.min.css">
    </head>
<body>
<div class="parent" style="background-image: url(''); 
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    background-size: 103%;
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
                            <div class="container" style="margin-top:15px;">
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
                <li class="nav-item" style="margin-top:10px; width:100%; margin-bottom: 10px; border-radius: 20px; opacity: 0.8">
                  <a class="nav-link active" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="index.php"><i class="fas fa-columns"></i> Dashboard</a>
                </li>
                <li class="nav-item" style=" margin-bottom: 10px; border-radius: 20px; background-color: white;">
                  <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: black;" href="#"><i class="fas fa-cloud-upload-alt"></i> Pengadaan </a>
                </li>
                
                <li class="nav-item" style="margin-bottom: 10px; border-radius: 20px;">
                    <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="#"> <?php echo $gender ?> </a>
                </li>
                <li class="nav-item" style="margin-bottom: 10px; border-radius: 20px;">
                    <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="logout.php"> Log Out </a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 pt-3" style="margin-left:290px">
            
            
            <center>
                <h3> <i class="fas fa-columns"></i> Pelaporan Pengadaan </a> </h3>
            </center>
            
            <div class="col-md4">
                <a href="admin_add_new.php" style="background-color: #183F8C; color:white; padding:5px 20px; border-radius:20px; opacity:0.8">Add New</a>
            </div>
            <hr>
            <br>
            <form action="admin_upload.php" method="get">
                <label>Cari :</label>
                <input type="text" name="cari">
                <input type="submit" value="Cari">
            </form>
            <br>
            <div class="">
            <center>
            <form action="admin_delete.php" method="post" enctype="multipart/form-data">
                <table class="table table-hover table-responsive" style="border-radius: 20px;  width:100%; ">
                
                    <thead>
                        <tr>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">No</th>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">Status Pengadaan</th>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">Nomer Surat</th>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">Judul</th>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">Instansi</th>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">Masa Berlaku</th>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">View Detail</th>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">Edit Status Pengadaan</th>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">Edit Status Kuitansi</th>
                            <th scope="col" style="background-color:#183F8C; opacity:0.8; color:white">Edit Status Invoice</th>
                            <th style="width:10%; background-color:#183F8C; opacity:0.8; color:white">Edit Status Faktur Pajak</th>
                            <th span="2" scope="col" style="background-color:#183F8C; opacity:0.8; color:white">Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            if(isset($_GET['cari'])){
                                $cari = $_GET['cari'];
                                $fetchall = "SELECT * FROM rekap_tawaran where fakultas like '%".$cari."%' OR nomor_surat like '%".$cari."%' OR alur like '%".$cari."%' OR nama_instansi_2 like '%" .$cari. "%'";
                                $result = mysqli_query($conn, $fetchall);
                            }else{
                                $fetchall = "SELECT * FROM rekap_tawaran";
                                $result = mysqli_query($conn, $fetchall);
                            }
                            $no = 1;

                            while ($row = mysqli_fetch_array($result)){ 
                                $id2 = $row['id'];
                                $nomer_1 = $row['nomor_surat'];
                                $status_1 = $row['status'];
                                $jenis_1 = $row['jenis_pengajuan'];
                                $judul_1 = $row['judul_surat'];
                                $nama_instansi = $row['nama_instansi_1'];
                                $nama_instansi_1 = $row['fakultas'];
                                $tanggal_mulai = $row['tanggal_mulai'];
                                $tanggal_berakhir = $row['tanggal_berakhir'];
                                $alur = $row['alur'];
                                $kuitansi = $row['kuitansi'];
                                $invoice = $row['invoice'];
                                                
                                $_SESSION['id'] = $id2;           
                        ?>
                        <tr>
                            <td style="font-weight: bold; width:10px; font-size: 12pt; background-color:white; color:black"><?php echo $no++ ?></td>
                            <td style="font-weight: bold; width:10px; font-size: 12pt; background-color:white; color:black"><?php echo $alur ?></td>
                            <td style="font-weight: bold; font-size: 12pt; background-color:white; color:black"> <?php echo $nomer_1 ?> </td>
                            <td style="font-weight: bold; width:20px; font-size: 12pt; background-color:white; color:black">(<?php echo $jenis_1 ?>) <br> <?php echo $judul_1 ?></td>
                            <td style="font-weight: bold; font-size: 12pt; background-color:white; color:black"> <?php echo $nama_instansi_1 ?> </td>
                            <td style="font-weight: bold; font-size: 12pt; background-color:white; color:black"> <?php echo "$tanggal_mulai - $tanggal_berakhir" ?> </td>
                            <td style="font-size: 10pt; background-color:white; opacity:0.8; color:black;"> 
                                <br>
                                <a style="background-color:#183F8C; color:white; padding:10px; border-radius:20px; margin-top:50px;" href="admin_detail.php?detail=<?php echo $row['id']; ?>"> Detail </a>
                            </td>
                            <td style="font-size: 10pt; background-color:white; opacity:0.8; color:black"> 
                                <br>
                                <a style="background-color:red; color:white; padding:10px; border-radius:20px; margin-top:30px;" href="admin_edit.php?id=<?php echo $row['id']; ?>"> Edit Status </a>
                            </td>
                            <td style="min-width: 157px; font-size: 10pt; min-width: 120px; opacity:0.8; color:black"> 
                                <br>
                                <a style="background-color:red; color:white; padding:10px; border-radius:20px; margin-top:30px;" href="admin_edit_kuitansi.php?id=<?php echo $row['id']; ?>"> Edit Kuitansi </a>
                                <br>
                                <div class="" style="margin-top:30px; font-weight:bold; font-size:12pt"> <?php echo $kuitansi ?> </div>
                            </td>
                            <td style="font-size: 10pt; background-color:white; min-width: 115px; opacity:0.8; color:black"> 
                                <br>
                                <a style="background-color:red; color:white; padding:10px; border-radius:20px; margin-top:30px;" href="admin_edit_invoice.php?id=<?php echo $row['id']; ?>"> Edit Invoice </a>
                            </td>
                            <td style="font-size: 10pt; background-color:white; min-width: 145px; opacity:0.8; color:black"> 
                                <br>
                                <a style="background-color:red; color:white; padding:10px; border-radius:20px; margin-top:30px;" href="admin_edit_pajak.php?id=<?php echo $row['id']; ?>"> Edit Faktur Pajak </a>
                            </td>
                            <td style="font-size: 10pt; background-color:white; opacity:0.8; color:black"> 
                                <br>
                                <a style="background-color:#183F8C; color:white; padding:10px 20px; border-radius:20px; margin-top:30px;" href="admin_view_file.php?view=<?php echo $row['nomor_surat']; ?>"> View </a>
                            </td>
                            <!--<td style="font-size: 10pt; background-color:white; opacity:0.8; color:black">
                                <br>
                                <a style="background-color:red; color:white; padding:10px 20px; border-radius:20px; margin-top:30px;" href="admin_download_file.php?download=<?php echo $row['nomor_surat']; ?>"> Download </a>
                            </td> -->
                            
                            
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
            </form>
            </center>
            </div>
        </div>
        
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin.js"></script>
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
