<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>



<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        A basic column chart comparing emissions by pollutant.
        Oil and gas extraction has the overall highest amount of
        emissions, followed by manufacturing industries and mining.
        The chart is making use of the axis crosshair feature, to highlight
        years as they are hovered over.
    </p>

</figure>

<script type="text/javascript">
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Pengajuan Tiap Unit'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah',
        data: [
            <?php 
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
                $sql = "SELECT * FROM coba_chart";
                $query = mysqli_query($conn, $sql);

                while ($temp = mysqli_fetch_array($query))
                {
                    $nama = $temp['nama'];
                    $jumlah = $temp['jumlah'];
                    echo"['".$nama."',".$jumlah."],";
                }
                
            ?>
        ]
    }]
});
</script>

