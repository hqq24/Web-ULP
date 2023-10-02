<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "ulp_1";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if(isset($_POST['nama_fakultas'])){
    $country_id = $_POST['nama_fakultas'];
    $sql = mysqli_query($conn,"SELECT * FROM prodi WHERE nama_fakultas='$country_id' order by nama_prodi");
    ?>
    <select name="nama_prodi" class="form-control">
        <option value=""> Select Indikator Prodi </option>
        <?php
        while ($row = mysqli_fetch_array($sql)) {
            ?>
            <option value="<?php echo $row['nama_prodi']; ?>">
                <?php echo $row['nama_prodi']; ?></option>
            <?php
            }
        ?>
        }
    </select>
}
<?php
}
?>