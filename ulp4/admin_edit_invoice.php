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

  $get = $_GET['id'];


  $fetch4 = "SELECT * FROM rekap_tawaran where id='$get'";
  $result5 = mysqli_query($conn, $fetch4);

  while($row = mysqli_fetch_assoc($result5))
  {
      $id1 = $row['id'];
  }

  if(isset($_POST['submit1'])) {

    $status = $_POST['alur'];

    $add = "UPDATE rekap_tawaran SET invoice = '$_POST[status]' WHERE id='$get'";


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
		    $genders = $row["email"];
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
        <link rel="stylesheet" href="style.css" />
        <script src="script.js" defer></script>
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
            <form action="edit.php?edit=<?php echo $id1 ?>" method="post" enctype="multipart/form-data">
                <center>
                    <h3> <i class="fas fa-columns"></i> Update Status Invoice </a> </h3>
                </center>
                <br>
                <table class="table table-hover table-responsive" style="border-radius: 20px;  width:100%">
                    <thead>
                        <tr>
                        <th scope="col" style="width:250px; background-color:#183F8C; opacity:0.8; color:white">Nomer Surat</th>
                        <th scope="col" style="width:350px; background-color:#183F8C; opacity:0.8; color:white">Judul</th>
                        <th scope="col" style="width:300px; background-color:#183F8C; opacity:0.8; color:white">Instansi</th>
                        <th scope="col" style="width:250px; background-color:#183F8C; opacity:0.8; color:white">Status</th>
                        <th scope="col" style="width:300px; background-color:#183F8C; opacity:0.8; color:white">Masa Berlaku</th>                        
                        <th scope="col" style="width:300px; background-color:#183F8C; opacity:0.8; color:white">Invoice</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $get = $_GET['id'];
                            $fetchall = "SELECT * FROM rekap_tawaran WHERE id='$get'";
                            $result = mysqli_query($conn, $fetchall);

                            while ($row = mysqli_fetch_array($result)){ 
                                $id2 = $row['id'];
                                $alur = $row['alur'];
                                $nomer_1 = $row['nomor_surat'];
                                $status_1 = $row['status'];
                                $jenis_1 = $row['jenis_pengajuan'];
                                $judul_1 = $row['judul_surat'];
                                $nama_instansi = $row['nama_instansi_1'];
                                $nama_instansi_1 = $row['fakultas'];
                                $tanggal_mulai = $row['tanggal_mulai'];
                                $tanggal_berakhir = $row['tanggal_berakhir'];
                                $invoice = $row['invoice'];
                                                
                                $_SESSION['id'] = $id2;           
                        ?>
                        <tr>
                            <td style="font-weight: bold; font-size: 12pt; background-color:white; color:black"> <?php echo $nomer_1 ?> </td>
                            <td style="font-weight: bold; width:20px; font-size: 12pt; background-color:white; color:black">(<?php echo $jenis_1 ?>) <br> <?php echo $judul_1 ?></td>
                            <td style="font-weight: bold; font-size: 12pt; background-color:white; color:black"> <?php echo $nama_instansi_1 ?> </td>
                            <td style="font-weight: bold; width:10px; font-size: 12pt; background-color:white; color:black"> <?php echo $status_1 ?> </td>
                            <td style="font-weight: bold; font-size: 12pt; background-color:white; color:black"> <?php echo "$tanggal_mulai - $tanggal_berakhir" ?> </td>
                            <td style="font-weight: bold; font-size: 12pt; background-color:white; color:black"> <?php echo $invoice ?> </td>
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
                <div class="progressbar">
                    <?php 
                        $get = $_GET['id'];
                            $fetchall = "SELECT * FROM status_total";
                            $result = mysqli_query($conn, $fetchall);

                            while ($row = mysqli_fetch_array($result)){ 
                                $id2 = $row['id'];
                                $alur1 = $row['nama'];

                                $_SESSION['id'] = $id2;           
                    ?>
                    <div class="progress" id="progress"></div>
                        <div class="progress-step" data-title="<?php echo $alur1 ?>"></div>
                        
                        <?php
                    }
                ?>
                </div>
                
                <hr>
                <div class="kolom" style="height: auto; width: 100%;border-radius: 20px; ">
                    <div class="row mt-12">
                        <div class="card ml-3 border-0" style="width: 97%; margin-top: 15px; height: auto; border-radius: 30px; ">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="card-body">
                                        <div class="form-group" style="width: 100%;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:black;"> Status </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="alur" class="country form-control">
                                                <option value="" selected="selected" style="color: black;"> ...Status... </option>
                                                <?php 
                                                    $sasaran_kerjasama = mysqli_query($conn, "SELECT * FROM status_total");
                                                    while ($sasaran_kerjasama_1 = mysqli_fetch_array($sasaran_kerjasama))
                                                    {
                                                ?>
                                                <option value="<?php echo $sasaran_kerjasama_1['nama']; ?>">
                                                    <?php echo $sasaran_kerjasama_1['nama'] ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>  
                                        <div class="" style="color:black;">
                                            Status pengadaan saat ini : <?php echo $invoice ?>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <br>
                <div class="button" style="width:100%">
                    <div class="form-group1">
                        <center>
                            <div class="action">
                                <input style="background-color: #183F8C; border: none; font-size: 20pt; padding: 10px 100px; border-radius: 20px; color:white; margin-top:80px; margin-bottom:30px;" type="submit" class="btn btn-next" name="submit_invoice" value="Update"> 
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
        function box1() {
            $(".pilihan2").show();
        }
    </script>
    <script>
        function box2() {
            $(".pilihan3").show();
        }
    </script>
    <script>
        function box3() {
            $(".pilihan4").show();
        }
    </script>

    <script>
        function box_11() {
            $(".nama_fakultas2").show();
        }
    </script>
    <script>
        function box_22() {
            $(".nama_fakultas3").show();
        }
    </script>
    <script>
        function box_33() {
            $(".nama_fakultas4").show();
        }
    </script>
        <script>
        function box_44() {
            $(".nama_fakultas5").show();
        }
    </script>

   
    <script>
        function nama_fak1() {
            var data1 = document.getElementById("nama1").value;
            $("#" + "prodi1").show();
        }
    </script>
        <script>
        function nama_fak2() {
            var data1 = document.getElementById("nama2").value;
            $("#" + "prodi2").show();
        }
    </script>
        <script>
        function nama_fak3() {
            var data1 = document.getElementById("nama3").value;
            $("#" + "prodi3").show();
        }
    </script>
        <script>
        function nama_fak4() {
            var data1 = document.getElementById("nama4").value;
            $("#" + "prodi4").show();
        }
    </script>
        <script>
        function nama_fak5() {
            var data1 = document.getElementById("nama5").value;
            $("#" + "prodi5").show();
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
