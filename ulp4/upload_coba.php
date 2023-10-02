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
    $tanggal_terima_dispo = $_POST['tanggal_terima_dispo'];
    $tanggal_berakhir = $_POST['tanggal_berakhir'];
    $nama_barang = $_POST['nama_barang'];

    $jenis_pengajuan = $_POST['jenis_pengajuan'];
    $array_jenis = implode($jenis_pengajuan);
    $jenis_barang = $_POST['jenis_barang'];
    $nomor_surat = $_POST['nomor_surat'];
    $judul_surat = $_POST['judul_surat'];
    $kelengkapan_kuitansi = $_POST['kuitansi'];
    $kelengkapan_invoice = $_POST['invoice'];
    $kelengkapan_faktur = $_POST['faktur_pajak'];
    $kelengkapan_dispo = $_POST['disposisi'];
    $note = $_POST['note'];

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
    tanggal_mulai, tanggal_terima_dispo, tanggal_berakhir, nama_barang, jenis_pengajuan, jenis_barang, 
    fakultas, nomor_surat, judul_surat, kuitansi, invoice, faktur_pajak, disposisi, note,
    nama_instansi_1, alamat_instansi_1, nama_1, 
    jabatan_1, nama_instansi_2, alamat_instansi_2, 
    nama_2, jabatan_2) VALUES ('$status',
    '$tanggal_mulai', '$tanggal_terima_dispo', '$tanggal_berakhir',
    '$nama_barang', '$array_jenis', '$jenis_barang',
    '$nama_fakultas', '$nomor_surat', '$judul_surat', '$kelengkapan_kuitansi',
    '$kelengkapan_invoice', '$kelengkapan_faktur', '$kelengkapan_dispo', '$note',
    '$nama_instansi_1', '$alamat_instansi_1', '$nama_1', 
    '$jabatan_1', '$array_instansi_2', 
    '$array_alamat_2', '$array_nama_2', '$array_jabatan_2')";


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
                $sqlQ = "INSERT INTO coba_drive (file_name,created,berkas) VALUES (?,NOW(),?)"; 
                $stmt = $db->prepare($sqlQ); 
                $stmt->bind_param("ss", $db_file_name, $nomer); 
                $db_file_name = $fileName; 
                $nomer = $nomor_surat;
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