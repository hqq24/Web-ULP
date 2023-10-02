<?php



if(!empty($_GET['download']))
{
	$conn = mysqli_connect("localhost", "root", "", "ulp_1");
	
    $get = $_GET['download'];
	
    $fetch_file = "SELECT * FROM coba_drive WHERE berkas='$get'";
    $result = mysqli_query($conn, $fetch_file);
    while ($row = mysqli_fetch_array($result)){ 
        $berkas = $row['file_name'];
    }

	$filename = basename($berkas);
	$filePath = 'uploads/' . $filename;

        if(!empty($filename) && file_exists($filePath)){
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=$filePath");
                header("Content-Type: application/zip");
                header("Content-Transfer-Encoding: binary");

                readfile($filePath);
                exit; 
    }
    else {
        echo "aaa";
    }
}

	
	

?>