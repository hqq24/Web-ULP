<?php     
// Include database configuration file 
require_once 'dbConfig.php'; 
 
$statusMsg = $valErr = ''; 
$status = 'danger'; 
 
// If the form is submitted 
 
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
    $tanggal_berakhir = $_POST['tanggal_berakhir'];
    $jenis_pengajuan = $_POST['jenis_pengajuan'];
    $nomor_surat = $_POST['nomor_surat'];
    $judul_surat = $_POST['judul_surat'];
    $nama_instansi_1 = $_POST['nama_instansi_1'];
    $alamat_instansi_1 = $_POST['alamat_instansi_1'];
    $nama_1 = $_POST['nama_1'];
    $jabatan_1 = $_POST['jabatan_1'];
    $nama_instansi_2 = $_POST['nama_instansi_2'];
    $alamat_instansi_2 = $_POST['alamat_instansi_2'];
    $nama_2 = $_POST['nama_2'];
    $jabatan_2 = $_POST['jabatan_2'];
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
    tanggal_mulai, tanggal_berakhir, berkas, jenis_pengajuan, 
    fakultas, nomor_surat, judul_surat, 
    nama_instansi_1, alamat_instansi_1, nama_1, 
    jabatan_1, nama_instansi_2, alamat_instansi_2, 
    nama_2, jabatan_2) VALUES ('$status',
    '$tanggal_mulai', '$tanggal_berakhir', '$file1',
    '$jenis_pengajuan', 
    '$nama_fakultas', '$nomor_surat', '$judul_surat', 
    '$nama_instansi_1', '$alamat_instansi_1', '$nama_1', 
    '$jabatan_1', '$nama_instansi_2', 
    '$alamat_instansi_2', '$nama_2', '$jabatan_2')";


    $stmt = $pdo->prepare($add);
    $data = mysqli_query($conn, $add);
    if ($data) {
        if(empty($_FILES["file"]["name"])){ 
            $valErr .= 'Please select a file to upload.<br/>'; 
        } 
         
        // Check whether user inputs are empty 
        if(empty($valErr)){ 
            $targetDir = "uploads/"; 
            $fileName = basename($_FILES["file"]["name"]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Upload file to local server 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                 
                // Insert data into the database 
                $sqlQ = "INSERT INTO drive_files (file_name,created) VALUES (?,NOW())"; 
                $stmt = $db->prepare($sqlQ); 
                $stmt->bind_param("s", $db_file_name); 
                $db_file_name = $fileName; 
                $insert = $stmt->execute(); 
                 
                if($insert){ 
                    $file_id = $stmt->insert_id; 
                     
                    // Store DB reference ID of file in SESSION 
                    $_SESSION['last_file_id'] = $file_id; 
                     
                    header("Location: $googleOauthURL"); 
                    exit(); 
                }else{ 
                    $statusMsg = 'Something went wrong, please try again after some time.'; 
                } 
            }else{ 
                $statusMsg = 'File upload failed, please try again after some time.'; 
            } 
        }
        $_SESSION['status_response'] = array('status' => $status, 'status_msg' => $statusMsg); 
        
        
     
    header("Location: admin_add_new.php"); 
    if(!empty($statusMsg)){ 
        ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } 
    exit(); 
    }else {
        echo '<script type="text/javascript"> alert("Failed") </script>';
    }  
    
}


?>