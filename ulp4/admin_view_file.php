<?php



if(!empty($_GET['view']))
{
	$conn = mysqli_connect("localhost", "root", "", "ulp_1");

    $get = $_GET['view'];
	
    $fetch_file = "SELECT * FROM coba_drive WHERE berkas='$get'";
    $result = mysqli_query($conn, $fetch_file);
    while ($row = mysqli_fetch_array($result)){ 
        $berkas = $row['file_name'];
    }


	$filename = basename($berkas);
	$filePath = 'uploads/' . $filename;
	$file_info = pathinfo($filePath);
	$file_extension = $file_info['extension'];
    echo $file_extension;



        if($file_extension == "pdf" ){
                header('Content-Type: application/PDF');
                header('Content-Disposition: inline; filename="' . $filePath . '"');
                header('Content-Transfer-Emcoding: binary');
                header('Accept-Ranges: bytes');
                @readfile($filePath); 

            
        }

    }
    else {
        echo "aaa";
    }


	
	

?>