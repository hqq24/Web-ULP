<?php 
// Include configuration file 
include_once 'config.php'; 
 
$status = $statusMsg = ''; 
if(!empty($_SESSION['status_response'])){ 
    $status_response = $_SESSION['status_response']; 
    $status = $status_response['status']; 
    $statusMsg = $status_response['status_msg']; 
     
    unset($_SESSION['status_response']); 
} 
?>

<!-- Status message -->


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
<div class="parent" style="background-image: url('images/opacity.jpg'); 
                                    background-repeat: no-repeat;
                                    background-size: cover;
                                    background-size: 103%;
                                    height: 100%;
                                    overflow-x: hidden;
                                    overflow-y: auto;
                                    z-index: 1;
                                    ">
    <br>
    <br>
    
    <div class="row no-gutters">
        <div class="col-md-2 pr-3 pt-4" id="side" style="background-color: white;">
            <br>
            
            <br>
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item" style=" background-color: #4C724A; margin-bottom: 10px; border-radius: 20px; opacity: 0.8">
                  <a class="nav-link active" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="index.php"><i class="fas fa-columns"></i> Dashboard</a>
                </li>
                <li class="nav-item" style="background-color: #b6dba6; margin-bottom: 10px; border-radius: 20px; opacity: 0.8">
                  <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: black;" href="admin_upload.php"><i class="fas fa-cloud-upload-alt"></i> Kerjasama</a>
                </li>
                <li class="nav-item" style="background-color: #4C724A; margin-bottom: 10px; border-radius: 20px; opacity: 0.8">
                  <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="booking.html">Institusi</a>
                </li>
                <li class="nav-item" style="background-color: #4C724A; margin-bottom: 10px; border-radius: 20px; opacity: 0.8">
                    <a class="nav-link" style="margin-top: 15px; margin-bottom: 15px; color: white;" href="ongkir.html">Referensi</a>
                </li>
                <li class="nav-item" style="background-color: #4C724A; margin-bottom: 10px; border-radius: 20px; opacity: 0.8">
                </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 pt-3" style="margin-left:230px">
            <div class="col-md-12">
                <?php if(!empty($statusMsg)){ ?>
                    <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
                <?php } ?>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file" class="form-control1">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn-primary" name="submit" value="Upload"/>
                    </div>
            </div>
            <form method="post" action="upload.php" class="form" enctype="multipart/form-data">
                <div class="kolom" style="height: auto; width: 100%; background-color:#4C724A; border-radius: 20px; opacity: 0.8">
                    <div class="row mt-6">
                        <div class="card ml-3 border-0" style="background-color: #4C724A; width: 32rem; margin-top: 15px; height: 750px; border-radius: 30px; ">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="card-body">
                                        <div class="form-group" style="width: 100%; background-color: #4C724A;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:white;"> Status </label>
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
                                        <div class="form-group" style="width:100%; background-color: #4C724A; color: black;">
                                            <label for="Name" style="font-weight: bold; color: white"> Tanggal Mulai </label>
                                            <input style="height:38px; width:100%; background-color: white; border: 1px solid #4C724A; border-radius:20px" class="box" type="datetime-local" name="tanggal_mulai" placeholder="...Select Date...">
                                        </div>
                                        <div class="form-group" style="width:100%; background-color: #4C724A; color: black;">
                                            <label for="Name" style="font-weight: bold; color: white"> Tanggal Berakhir </label>
                                            <input style="height:38px; width:100%; background-color: white; border: 1px solid #4C724A; border-radius:20px" class="box" type="datetime-local" name="tanggal_berakhir" placeholder="...Select Date...">
                                        </div>   
                                        <div class="form-group">
                                            <label>File</label>
                                            <input type="file" name="file" class="form-control1">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-primary" name="submit" value="Upload"/>
                                        </div>
                                                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card ml-3 border-0" style="background-color: #4C724A; width: 30rem; margin-top: 15px; height: auto; border-radius: 30px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                    <div class="form-group" style="width: 100%; background-color: #4C724A;">
                                            <label id="jenis" for="Name" style="font-weight: bold; color:white;"> Jenis Pengadaan </label>
                                            <select style="width: 100%; background-color: white; border: 2px solid #4C724A; border-radius:20px" name="jenis_pengajuan" class="country form-control">
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
                                        <div class="form-group" style="width: 100%; background-color: #4C724A;">
                                            <label for="Name" style="font-weight: bold; color: white;"> Nama Unit </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Nama Unit" name="nama_fakultas"
                                                value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%; background-color: #4C724A;">
                                            <label for="Name" style="font-weight: bold; color: white;"> No Surat </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="No Dokumen" name="nomor_surat"
                                                value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                            <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="form-group" style="width: 100%; background-color: #4C724A;">
                                            <label for="Name" style="font-weight: bold; color: white;"> Judul Pengajuan </label>
                                            <input style="height:38px; width: 100%; border-radius: 20px; background-color: white; border: 1px solid #4C724A" type="text" class="box form_data" placeholder="Judul Pengajuan" name="judul_surat"
                                                value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') ?>">
                                            <span id="email_error" class="text-danger"></span>
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
    #side {
        position:fixed; 
        top:150;
        display: inline-flex;
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
    #side {
        position:fixed; 
        top:150;
        display: inline-flex;
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
