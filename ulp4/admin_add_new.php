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

  if(isset($_POST['submit1'])) {
      $status = $_POST['status'];
      $tanggal_mulai = $_POST['tanggal_mulai'];
      $tanggal_terima_dispo = $_POST['tanggal_terima_dispo'];
      $tanggal_berakhir = $_POST['tanggal_berakhir'];
      $jenis_pengajuan = $_POST['jenis_pengajuan'];
      $jenis_barang = $_POST['jenis_barang'];
      $nomor_surat = $_POST['nomor_surat'];
      $judul_surat = $_POST['judul_surat'];
      $nama_instansi_1 = $_POST['nama_instansi_1'];
      $alamat_instansi_1 = $_POST['alamat_instansi_1'];
      $nama_1 = $_POST['nama_1'];
      $jabatan_1 = $_POST['jabatan_1'];

      $nama_instansi_2 = $_POST['nama_instansi_2'];
      $array_instansi_2 = implode($nama_instansi_2);

      $alamat_instansi_2 = $_POST['alamat_instansi_2'];
      $array_alamat_2 = implode($alamat_instansi_2);

      $nama_2 = $_POST['nama_2'];
      $array_nama_2 = implode($nama_2);

      $jabatan_2 = $_POST['jabatan_2'];
      $array_jabatan_2 = implode($jabatan_2);

      $nama_fakultas = $_POST['nama_fakultas'];
      //$array_fak = implode($nama_fakultas);
      //$nama_prodi = $_POST['nama_prodi1'];
      //$array_pro = implode($nama_prodi);
      

    if (isset($_FILES['berkas']['name']) && $_FILES['berkas']['name'] != "") {
        $file1 = "berkas/" . basename($_FILES['berkas']['name']);
        move_uploaded_file($_FILES['berkas']['tmp_name'], $file1);
    } else
        $file1 = "";



    $add = "INSERT INTO rekap_tawaran (status, 
    tanggal_mulai, tanggal_terima_dispo, tanggal_berakhir, berkas, jenis_pengajuan, jenis_barang, 
    fakultas, nomor_surat, judul_surat, 
    nama_instansi_1, alamat_instansi_1, nama_1, 
    jabatan_1, nama_instansi_2, alamat_instansi_2, 
    nama_2, jabatan_2) VALUES ('$status',
    '$tanggal_mulai', '$tanggal_berakhir', '$file1',
    '$jenis_pengajuan', '$jenis_barang',
    '$nama_fakultas', '$nomor_surat', '$judul_surat', 
    '$nama_instansi_1', '$alamat_instansi_1', '$nama_1', 
    '$jabatan_1', '$array_instansi_2', 
    '$array_alamat_2', '$array_nama_2', '$array_jabatan_2')";


    $stmt = $pdo->prepare($add);
    $data = mysqli_query($conn, $add);
    if ($data) {
        echo '<script type="text/javascript"> alert("Upload Success :) :) :)") </script>';
    }else {
        echo '<script type="text/javascript"> alert("Failed") </script>';
    }



      
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
        //while($row = mysqli_fetch_assoc($resultsss))
        //{
            //$sum = $row["sums"];
        //}
    //}  
  

?>






<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" integrity="sha512-JvHT+I28ECA8gHQ+i8UATgOt5lJBG/pp+KYe7VfILX7Q8GjSA15YdBPKbanVUG1FamvWg6WiqRIfAaxpmaGKKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="main.js"></script>
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
                  <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: black;" href="admin_upload.php"><i class="fas fa-cloud-upload-alt"></i> Pengadaan </a>
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
            <?php if(!empty($statusMsg)){ ?>
                    <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
                <?php } ?>
            <form action="upload_coba.php" method="post" enctype="multipart/form-data">
                <center>
                    <h3> <i class="fas fa-columns"></i> Add New </a> </h3>
                </center>
                <br>
                
                <hr>
                <div class="kolom" style="height: auto; width: 101%; background-color:white; border-radius: 20px;">
                    <div class="row mt-6">
                        <div class="card ml-3 border-0" style="background-color: white; width: 48%; margin-top: 15px; height: auto; border-radius: 30px; ">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="card-body">
                                        <div class="form-group" style="width: 100%">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Status </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="status" class="country form-control">
                                                <option value="" selected="selected" style="color: white;"> ...Status... </option>
                                                <?php 
                                                    $sasaran_kerjasama = mysqli_query($conn, "SELECT * FROM berlaku");
                                                    while ($sasaran_kerjasama_1 = mysqli_fetch_array($sasaran_kerjasama))
                                                    {
                                                ?>
                                                <option value="<?php echo $sasaran_kerjasama_1['berlaku_name']; ?>">
                                                    <?php echo $sasaran_kerjasama_1['berlaku_name'] ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>  
                                        <div class="form-group" style="width:100%; color: black;">
                                            <label for="Name" style="font-weight: bold; color: black"> Tanggal Mulai </label>
                                            <input style="height:38px; width:100%; background-color: white; border: 1px solid #4C724A; border-radius:20px" class="box" type="datetime-local" name="tanggal_mulai" placeholder="...Select Date...">
                                        </div>
                                        <div class="form-group" style="width:100%; color: black;">
                                            <label for="Name" style="font-weight: bold; color: black"> Tanggal Disposisi Diterima </label>
                                            <input style="height:38px; width:100%; background-color: white; border: 1px solid #4C724A; border-radius:20px" class="box" type="datetime-local" name="tanggal_terima_dispo" placeholder="...Select Date...">
                                        </div>
                                        <div class="form-group" style="width:100%; color: black;">
                                            <label for="Name" style="font-weight: bold; color: black"> Tanggal Berakhir </label>
                                            <input style="height:38px; width:100%; background-color: white; border: 1px solid #4C724A; border-radius:20px" class="box" type="datetime-local" name="tanggal_berakhir" placeholder="...Select Date...">
                                        </div>    
                                        <div class="form-group">
                                            <label for="Name" style="font-weight: bold; color: black"> Nama Barang </label>
                                            <textarea rows="15" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>" style="width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" name="nama_barang" type="text"> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Name" style="font-weight: bold; color: black"> Note </label>
                                            <textarea rows="4" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>" style="width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" name="note" type="text"> </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ml-3 border-0" style=" width: 48%; margin-top: 15px; height: auto; border-radius: 30px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group" style="width: 100%;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Jenis Pengadaan </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="jenis_pengajuan[]" class="country form-control">
                                                <option value="" selected="selected" style="color: white;"> ...Jenis Pengajuan... </option>
                                                <?php 
                                                    $sasaran_kerjasama = mysqli_query($conn, "SELECT * FROM jenis_pengajuan");
                                                    while ($sasaran_kerjasama_1 = mysqli_fetch_array($sasaran_kerjasama))
                                                    {
                                                ?>
                                                <option value="<?php echo $sasaran_kerjasama_1['jenis']; ?>">
                                                    <?php echo $sasaran_kerjasama_1['jenis'] ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                            <center>
                                                <div class="action" style="background-color: transparent;">
                                                    <input onclick="jenis_44()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                                </div>
                                            </center>
                                        </div>
                                        <div class="jenis_2">
                                            <div class="form-group" style="width: 100%;">
                                                <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Jenis Pengadaan </label>
                                                <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="jenis_pengajuan[]" class="country form-control">
                                                    <option value="" selected="selected" style="color: white;"> ...Jenis Pengajuan... </option>
                                                    <?php 
                                                        $sasaran_kerjasama = mysqli_query($conn, "SELECT * FROM jenis_pengajuan");
                                                        while ($sasaran_kerjasama_1 = mysqli_fetch_array($sasaran_kerjasama))
                                                        {
                                                    ?>
                                                    <option value="<?php echo $sasaran_kerjasama_1['jenis']; ?>">
                                                        <?php echo $sasaran_kerjasama_1['jenis'] ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>        
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Jenis Barang / Jasa </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jenis Barang / Jasa" name="jenis_barang"
                                                value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Nama Unit </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Unit" name="nama_fakultas"
                                                value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> No Surat </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="No Dokumen" name="nomor_surat"
                                                value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Judul Pengajuan </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Judul Pengajuan" name="judul_surat"
                                                value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="Name" style="font-weight: bold; color: black;"> File Document </label>
                                            <br>
                                            <input type="file" name="file" class="form-control1" style="background-color:#183F8C; border-radius: 20px; width: 90%;">
                                        </div>
                                        <div class="form-group" style="width: 100%">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Kelengkapan Kuitansi </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="kuitansi" class="country form-control">
                                                <option value="" selected="" style="color: white;"> ...Kelengkapan Kuitansi... </option>
                                                <option value="Sudah Lengkap" style="color: Black;"> Sudah Lengkap </option>
                                                <option value="Belum Lengkap" style="color: Black;"> Belum Lengkap </option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="width: 100%">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Kelengkapan Invoice </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="invoice" class="country form-control">
                                                <option value="" selected="" style="color: white;"> ...Kelengkapan Invoice... </option>
                                                <option value="Sudah Lengkap" style="color: Black;"> Sudah Lengkap </option>
                                                <option value="Belum Lengkap" style="color: Black;"> Belum Lengkap </option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="width: 100%">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Kelengkapan Faktur Pajak </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="faktur_pajak" class="country form-control">
                                                <option value="" selected="" style="color: white;"> ...Kelengkapan Faktur Pajak... </option>
                                                <option value="Sudah Lengkap" style="color: Black;"> Sudah Lengkap </option>
                                                <option value="Belum Lengkap" style="color: Black;"> Belum Lengkap </option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="width: 100%">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Kelengkapan Disposisi </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="disposisi" class="country form-control">
                                                <option value="" selected="" style="color: white;"> ...Kelengkapan Faktur Pajak... </option>
                                                <option value="Dengan Disposisi" style="color: Black;"> Dengan Disposisi </option>
                                                <option value="Tanpa Disposisi" style="color: Black;"> Tanpa Disposisi </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col ml-3" style="border-radius:20px;">
                        <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: 400px; border-radius: 30px;">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="card-body">
                                        <center>
                                            <h3 style="color: black;"> <i class="fas fa-columns"></i> Pihak 1 (ULP) </h3>
                                        </center>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Nama Instansi </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_1"
                                                value="Unit Layanan Pengadaan (ULP)">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Alamat Instansi </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_1"
                                                value="Kampus B Jl. Jemursari 51-57, Surabaya">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                        <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" style="width: 100%;">
                                                    <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                    <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_1"
                                                        value="Reizano Amri Rasyid">
                                                    <span id="email_error" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="width: 100%;">
                                                    <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                    <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_1"
                                                        value="Kepala">
                                                    <span id="email_error" class="text-danger"></span>
                                                </div>
                                            </div> 
                                        </div>                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="card-body">
                                        <center>
                                            <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 1 </h3>
                                        </center>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                value="<?php $array_instansi_2 ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                        <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" style="width: 100%;">
                                                    <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                    <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                        value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                    <span id="email_error" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="width: 100%;">
                                                    <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                    <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                        value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                    <span id="email_error" class="text-danger"></span>
                                                </div>
                                            </div> 
                                        </div>  
                                        <center>
                                            <div class="action" style="background-color: transparent;">
                                                <input onclick="box_11()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                            </div>
                                        </center>                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vendor2">
                            <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="card-body">
                                            <center>
                                                <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 2 </h3>
                                            </center>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                    value="<?php $array_instansi_2 ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                            <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            <center>
                                                <div class="action" style="background-color: transparent;">
                                                    <input onclick="box_22()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                                </div>
                                            </center>                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vendor3">
                            <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="card-body">
                                            <center>
                                                <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 3 </h3>
                                            </center>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                            <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            <center>
                                                <div class="action" style="background-color: transparent;">
                                                    <input onclick="box_33()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                                </div>
                                            </center>                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="vendor4">
                            <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="card-body">
                                            <center>
                                                <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 4 </h3>
                                            </center>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                            <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            <center>
                                                <div class="action" style="background-color: transparent;">
                                                    <input onclick="box_44()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                                </div>
                                            </center>                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vendor5">
                            <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="card-body">
                                            <center>
                                                <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 5 </h3>
                                            </center>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                            <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            <center>
                                                <div class="action" style="background-color: transparent;">
                                                    <input onclick="box_55()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                                </div>
                                            </center>                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vendor6">
                            <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="card-body">
                                            <center>
                                                <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 6 </h3>
                                            </center>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                    value="<?php $array_instansi_2 ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                            <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            <center>
                                                <div class="action" style="background-color: transparent;">
                                                    <input onclick="box_66()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                                </div>
                                            </center>                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vendor7">
                            <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="card-body">
                                            <center>
                                                <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 7 </h3>
                                            </center>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                    value="<?php $array_instansi_2 ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                            <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            <center>
                                                <div class="action" style="background-color: transparent;">
                                                    <input onclick="box_77()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                                </div>
                                            </center>                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vendor8">
                            <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="card-body">
                                            <center>
                                                <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 8 </h3>
                                            </center>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                    value="<?php $array_instansi_2 ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                            <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            <center>
                                                <div class="action" style="background-color: transparent;">
                                                    <input onclick="box_88()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                                </div>
                                            </center>                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vendor9">
                            <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="card-body">
                                            <center>
                                                <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 9 </h3>
                                            </center>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                    value="<?php $array_instansi_2 ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                            <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            <center>
                                                <div class="action" style="background-color: transparent;">
                                                    <input onclick="box_99()" style="opacity: 1; background-color: #183F8C; border: none; font-size: 10pt; padding: 5px 30px; border-radius: 20px; color:white; margin-top:10px; margin-bottom:10px;" type="button" class="kirim" name="submit" value="Tambah"> 
                                                </div>
                                            </center>                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="vendor10">
                            <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: auto; border-radius: 30px;">
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="card-body">
                                            <center>
                                                <h3 style="color: black;"> <i class="fas fa-columns"></i> VENDOR 10 </h3>
                                            </center>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2[]"
                                                    value="<?php $array_instansi_2 ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                                <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2[]"
                                                    value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                <span id="email_error" class="text-danger"></span>
                                            </div>
                                            <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                            <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                        <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2[]"
                                                            value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                                        <span id="email_error" class="text-danger"></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                                        
                    
                </div>
                <div class="button" style="width:100%">
                        <div class="form-group1">
                            <center>
                                <div class="action">
                                    <input style="background-color: #183F8C; border: none; font-size: 20pt; padding: 10px 100px; border-radius: 20px; color:white; margin-top:80px; margin-bottom:30px;" type="submit" class="kirim" name="submit1" value="kirim"> 
                                </div>
                            </center>
                        </div>
                    </div>
            </form>
            </div>
    </div>   
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js" integrity="sha512-wxLJoyhMdb3r9t00CpwvDsbgnHongW0fzpEKS2Y0X2H+ThyUd0AhHVD1/SH37RGSE2/krrzpU+71E37X7UV+4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
    
    
    <script>
        function jenis_44() {
            $(".jenis_2").show();
        }
    </script>
    <script>
        function box_11() {
            $(".vendor2").show();
        }
    </script>
    <script>
        function box_22() {
            $(".vendor3").show();
        }
    </script>
    <script>
        function box_33() {
            $(".vendor4").show();
        }
    </script>
    <script>
        function box_44() {
            $(".vendor5").show();
        }
    </script>
    <script>
        function box_55() {
            $(".vendor6").show();
        }
    </script>
    <script>
        function box_66() {
            $(".vendor7").show();
        }
    </script>
    <script>
        function box_77() {
            $(".vendor8").show();
        }
    </script>
    <script>
        function box_88() {
            $(".vendor9").show();
        }
    </script>
    <script>
        function box_99() {
            $(".vendor10").show();
        }
    </script>
    


    <script>

        $(document).ready(function() {
            $("#bentuk").on('change', function() {
                $(".data").hide();
                $("#" + $(this).val()).fadeIn(700);
                
            }).change();
            
        })

    </script>

    <script>
        function bentuk_keg1() {
            var data1 = document.getElementById("bentuk11").value;
            document.getElementById("jurusan1").value=data1;
            $("#" + "choose1").show();
        }
    </script>
    <script>

        function bentuk_keg2() {
            var data2 = document.getElementById("bentuk12");
            document.getElementById("jurusan2").value=data2.value;
            $("#" + "choose2").show();
        }

    </script>
    <script>
        function bentuk_keg3() {
            var data3 = document.getElementById("bentuk13");
            document.getElementById("jurusan3").value=data3.value;
            $("#" + "choose3").show();
        }
    </script>
    <script>
        function bentuk_keg4() {
            var data4 = document.getElementById("bentuk14");
            document.getElementById("jurusan4").value=data4.value;
            $("#" + "choose4").show();
        }
    </script>

   

    <script>
        const selectElem = document.getElementById('bentuk')
        const pElem = document.getElementById('Pemagangan')

        // When a new <option> is selected
        selectElem.addEventListener('change', function() {
        const index = selectElem.selectedIndex;
        // Add that data to the <p>
        pElem.innerHTML = 'a: ' + index;
        document.getElementById("actual_fee").value =  + index;
        })
        function myFunction(element)
        {
        }
    </script>

<script>
            
        </script>

    <script>
        config = {
            enableTime: true,
            dateFormat: "m/d/Y",
        }
        flatpickr("input[type=datetime-local]", config);
    </script>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            $(".country6").change(function(){
                var country_id = $(this).val();
                $.ajax({
                    url:"indikator_kinerja.php",
                    method:"POST",
                    data:{country_id:country_id},
                    success:function(data){
                        $(".state6").html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            $(".country7").change(function(){
                var country_id = $(this).val();
                $.ajax({
                    url:"indikator_kinerja.php",
                    method:"POST",
                    data:{country_id:country_id},
                    success:function(data){
                        $(".state7").html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            $(".country8").change(function(){
                var country_id = $(this).val();
                $.ajax({
                    url:"indikator_kinerja.php",
                    method:"POST",
                    data:{country_id:country_id},
                    success:function(data){
                        $(".state8").html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            $(".country9").change(function(){
                var country_id = $(this).val();
                $.ajax({
                    url:"indikator_kinerja.php",
                    method:"POST",
                    data:{country_id:country_id},
                    success:function(data){
                        $(".state9").html(data);
                    }
                });
            });
        })
    </script>




    <script type="text/javascript">
        $(document).ready(function () 
        {
            $(".country1").change(function(){
                var nama_fakultas = $(this).val();
                $.ajax({
                    url:"nama_fakultas.php",
                    method:"POST",
                    data:{nama_fakultas:nama_fakultas},
                    success:function(data){
                        $(".state1").html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            $(".country2").change(function(){
                var nama_fakultas = $(this).val();
                $.ajax({
                    url:"nama_fakultas.php",
                    method:"POST",
                    data:{nama_fakultas:nama_fakultas},
                    success:function(data){
                        $(".state2").html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            $(".country3").change(function(){
                var nama_fakultas = $(this).val();
                $.ajax({
                    url:"nama_fakultas.php",
                    method:"POST",
                    data:{nama_fakultas:nama_fakultas},
                    success:function(data){
                        $(".state3").html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            $(".country4").change(function(){
                var nama_fakultas = $(this).val();
                $.ajax({
                    url:"nama_fakultas.php",
                    method:"POST",
                    data:{nama_fakultas:nama_fakultas},
                    success:function(data){
                        $(".state4").html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () 
        {
            $(".country5").change(function(){
                var nama_fakultas = $(this).val();
                $.ajax({
                    url:"nama_fakultas.php",
                    method:"POST",
                    data:{nama_fakultas:nama_fakultas},
                    success:function(data){
                        $(".state5").html(data);
                    }
                });
            });
        })
    </script>

    
  </body>
</html>
<style>
    ::-webkit-file-upload-button {
        background: white;
        color: black;
        border-radius: 20px;
        height: 40px;
        width: 30%
    }
    .jenis_2 {
        display: none;
    }
    .vendor2 {
        display: none;
    }
    .vendor3 {
        display: none;
    }
    .vendor4 {
        display: none;
    }
    .vendor5 {
        display: none;
    }
    .vendor6 {
        display: none;
    }
    .vendor7 {
        display: none;
    }
    .vendor8 {
        display: none;
    }
    .vendor9 {
        display: none;
    }
    .vendor10 {
        display: none;
    }
    .box::-webkit-input-placeholder {
        color: black;
        margin-left: 20px;
        text-indent: 15px;
    }
    .box:-moz-placeholder {
        color: black;
        margin-left: 20px;
    }
    .box::-moz-placeholder {
        color: black;
        margin-left: 20px;
    }
    input[type=text]{
        color: black;
    }
    input[type=file]{
        color: white;
    }
    select:invalid {
        color: black;
    }
</style>

<style>
    
    .alert {
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
<style>
    #side {
        position:fixed; 
        display: inline-flex;
        height:1200px;
        background-color: #183F8C
    }
    #choose1 {
        display: none;
    }
    #choose2 {
        display: none;
    }
    #choose3 {
        display: none;
    }
    #choose4 {
        display: none;
    }
    .pilihan2 {
        display: none;
    }
    .pilihan3 {
        display: none;
    }
    .pilihan4 {
        display: none;
    }
    .nama_fakultas2 {
        display: none;
    }
    .nama_fakultas3 {
        display: none;
    }
    .nama_fakultas4 {
        display: none;
    }
    .nama_fakultas5 {
        display: none;
    }

    #prodi1 {
        display: none;
    }
    #prodi2 {
        display: none;
    }
    #prodi3 {
        display: none;
    }
    #prodi4 {
        display: none;
    }
    #prodi5 {
        display: none;
    }
    
</style>
