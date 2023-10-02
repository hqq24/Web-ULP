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

    $sqlii = "SELECT * FROM kerma_user";
    $resultsss = mysqli_query($conn, $sqlii);
	    while($roww = mysqli_fetch_assoc($resultsss))
	    {
		    $id = $roww['id'];
		    $genders = $roww["email"];
		    $_SESSION['gender'] = $genders;
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
        <?php
        $detail = $_GET['detail'];
        $sqli = "SELECT * FROM rekap_tawaran WHERE id='$detail'";
        $resultss = mysqli_query($conn, $sqli);
            while($row = mysqli_fetch_assoc($resultss))
            {
                $status = $row["status"];
                $tanggal_mulai = $row["tanggal_mulai"];
                $tanggal_dispo_diterima = $row["tanggal_terima_dispo"];
                $tanggal_berakhir = $row["tanggal_berakhir"];
                $nama_barang = nl2br($row["nama_barang"]);
                $jenis_pengajuan = $row["jenis_pengajuan"];
                $jenis_barang = $row["jenis_barang"];
                $fakultas = $row["fakultas"];
                $nomor_surat = $row["nomor_surat"];
                $judul_surat = $row["judul_surat"];
                $kuitansi = $row["kuitansi"];
                $invoice = $row["invoice"];
                $faktur_pajak = $row["faktur_pajak"];
                $disposisi = $row["disposisi"];
                $note = $row["note"];
                $nama_instansi_1 = $row["nama_instansi_1"];
                $alamat_instansi_1 = $row["alamat_instansi_1"];
                $nama_1 = $row["nama_1"];
                $jabatan_1 = $row["jabatan_1"];
                $nama_instansi_2 = $row["nama_instansi_2"];
                $alamat_instansi_2 = $row["alamat_instansi_2"];
                $nama_2 = $row["nama_2"];
                $jabatan_2 = $row["jabatan_2"];

                //$_SESSION['gender'] = $gender;
            
            ?>
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
                            <a class="nav-link active" style="margin-top: 0px; color: white; font-size:14pt;" href="#"><i class="fas fa-columns"></i> <?php echo $genders ?> </a>
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
                    <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="#"> <?php echo $genders ?> </a>
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
                    <h3> <i class="fas fa-columns"></i> Detail </a> </h3>
                </center>
                <br>
                
                <hr>
                <div class="kolom" style="height: auto; width: 101%; border-radius: 20px;">
                    <div class="row mt-6">
                        <div class="card ml-3 border-0" style="width: 48%; margin-top: 15px; height: auto; border-radius: 30px; ">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="card-body">
                                        <div class="form-group" style="width: 100%;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Status </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="status" class="country form-control">
                                                <option value="" selected="selected" style="color: white;"> <?php echo $status ?> </option>
                                            </select>
                                        </div>  
                                        <div class="form-group" style="width:100%; color: black;">
                                            <label for="Name" style="font-weight: bold; color: black"> Tanggal Mulai </label>
                                            <input style="height:38px; width:100%; background-color: white; border: 1px solid #4C724A; border-radius:20px" class="box" type="datetime-local" name="tanggal_mulai" placeholder="<?php echo $tanggal_mulai ?>">
                                        </div>
                                        <div class="form-group" style="width:100%; color: black;">
                                            <label for="Name" style="font-weight: bold; color: black"> Tanggal Disposisi Diterima </label>
                                            <input style="height:38px; width:100%; background-color: white; border: 1px solid #4C724A; border-radius:20px" class="box" type="datetime-local" name="tanggal_berakhir" placeholder="<?php echo $tanggal_dispo_diterima ?>">
                                        </div>   
                                        <div class="form-group" style="width:100%; color: black;">
                                            <label for="Name" style="font-weight: bold; color: black"> Tanggal Berakhir </label>
                                            <input style="height:38px; width:100%; background-color: white; border: 1px solid #4C724A; border-radius:20px" class="box" type="datetime-local" name="tanggal_berakhir" placeholder="<?php echo $tanggal_berakhir ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label for="Name" style="font-weight: bold; color: black"> Nama Barang </label>
                                            <br>
                                            <?php echo $nama_barang ?>
                                        </div> 
                                        <div class="form-group">
                                            <label for="Name" style="font-weight: bold; color: black"> Note </label>
                                            <br>
                                            <?php echo $note ?>
                                        </div> 
                                        <div class="form-group" style="width: 100%;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Kelengkapan Disposisi </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="jenis_pengajuan" class="country form-control">
                                                <option value="" selected="selected" style="color: white;"> <?php echo $disposisi ?> </option>
                                            </select>
                                        </div>                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ml-3 border-0" style="width: 48%; margin-top: 15px; height: auto; border-radius: 30px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group" style="width: 100%;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Jenis Pengadaan </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="jenis_pengajuan" class="country form-control">
                                                <option value="" selected="selected" style="color: white;"> <?php echo $jenis_pengajuan ?> </option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Jenis Barang / Jasa </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jenis Barang / Jasa" name="jenis_barang"
                                                value="<?php echo $jenis_barang ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Nama Unit </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Unit" name="nama_fakultas"
                                                value="<?php echo $fakultas ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> No Surat </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="No Dokumen" name="nomor_surat"
                                                value="<?php echo $nomor_surat ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Judul Pengajuan </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Judul Pengajuan" name="judul_surat"
                                                value="<?php echo $judul_surat ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Kelengkapan Kuitansi </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="jenis_pengajuan" class="country form-control">
                                                <option value="" selected="selected" style="color: white;"> <?php echo $kuitansi ?> </option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Kelengkapan Invoice </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="jenis_pengajuan" class="country form-control">
                                                <option value="" selected="selected" style="color: white;"> <?php echo $invoice ?> </option>
                                            </select>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Kelengkapan Faktur Pajak </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="jenis_pengajuan" class="country form-control">
                                                <option value="" selected="selected" style="color: white;"> <?php echo $faktur_pajak ?> </option>
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
                                                value="<?php echo $nama_instansi_1 ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Alamat Instansi </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_1"
                                                value="<?php echo $alamat_instansi_1 ?>">
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
                                                        value="<?php echo $nama_1 ?>">
                                                    <span id="email_error" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="width: 100%;">
                                                    <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                    <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_1"
                                                        value="<?php echo $jabatan_1 ?>">
                                                    <span id="email_error" class="text-danger"></span>
                                                </div>
                                            </div> 
                                        </div>                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ml-0 border-0" style="width: 100%; margin-top: 15px; height: 400px; border-radius: 30px;">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="card-body">
                                        <center>
                                            <h3 style="color: black;"> <i class="fas fa-columns"></i> Pihak 2 (VENDOR) </h3>
                                        </center>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Nama Vendor </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Instansi" name="nama_instansi_2"
                                                value="<?php echo $nama_instansi_2 ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%;">
                                            <label for="Name" style="font-weight: bold; color: black;"> Alamat Vendor </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Alamat Instansi" name="alamat_instansi_2"
                                                value="<?php echo $alamat_instansi_2 ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="ttd" style="color:black; font-weight:bold;"> Penandatangan </div>  
                                        <div class="ttd2" style="color: black; font-size:12pt;"> Pejabat yang menandatangani dokumen </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" style="width: 100%;">
                                                    <label for="Name" style="font-weight: bold; color: black;"> Nama </label>
                                                    <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama" name="nama_2"
                                                        value="<?php echo $nama_2 ?>">
                                                    <span id="email_error" class="text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" style="width: 100%;">
                                                    <label for="Name" style="font-weight: bold; color: black;"> Jabatan </label>
                                                    <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Jabatan" name="jabatan_2"
                                                        value="<?php echo $jabatan_2 ?>">
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
                
            </form>
            </div>
    </div>
    <?php
    }
    ?>   
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js" integrity="sha512-wxLJoyhMdb3r9t00CpwvDsbgnHongW0fzpEKS2Y0X2H+ThyUd0AhHVD1/SH37RGSE2/krrzpU+71E37X7UV+4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
    

            

    <script>
        config = {
            enableTime: true,
            dateFormat: "m/d/Y",
        }
        flatpickr("input[type=datetime-local]", config);
    </script>
    
  </body>
</html>
<style>
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
    #side {
        position:fixed; 
        display: inline-flex;
        height:1200px;
        background-color: #183F8C
    }
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
