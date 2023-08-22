<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sensortes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk Lora 0
$sql_lora0 = "SELECT * FROM coba WHERE nama = 'Lora 0' AND id = (SELECT MAX(id) FROM coba WHERE nama = 'Lora 0')";
$result_lora0 = $conn->query($sql_lora0);
if ($result_lora0->num_rows > 0) {
    $row_lora0 = $result_lora0->fetch_assoc();
} else {
    echo "0 results for Lora 0";
}

// Query untuk Lora 1
$sql_lora1 = "SELECT * FROM coba WHERE nama = 'Lora 1' AND id = (SELECT MAX(id) FROM coba WHERE nama = 'Lora 1')";
$result_lora1 = $conn->query($sql_lora1);
if ($result_lora1->num_rows > 0) {
    $row_lora1 = $result_lora1->fetch_assoc();
} else {
    echo "0 results for Lora 1";
}

// Query untuk Lora 2
$sql_lora2 = "SELECT * FROM coba WHERE nama = 'Lora 2' AND id = (SELECT MAX(id) FROM coba WHERE nama = 'Lora 2')";
$result_lora2 = $conn->query($sql_lora2);
if ($result_lora2->num_rows > 0) {
    $row_lora2 = $result_lora2->fetch_assoc();
} else {
    echo "0 results for Lora 2";
}

// Query untuk Lora 3
$sql_lora3 = "SELECT * FROM coba WHERE nama = 'Lora 3' AND id = (SELECT MAX(id) FROM coba WHERE nama = 'Lora 3')";
$result_lora3 = $conn->query($sql_lora3);
if ($result_lora3->num_rows > 0) {
    $row_lora3 = $result_lora3->fetch_assoc();
} else {
    echo "0 results for Lora 3";
}

$conn->close();
?>

<?php include "header.php" ?>
<!-- Tampilan HTML konten -->
<div id="layoutSidenav_content">
    <main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Dashboard Utama
                                        </h1>
                                        <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                                    </div>
                                   </div>   
                        </div>
                    </header>

        <!-- Kontainer Lahan 1 -->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="card card-collapsable">
                    <!-- Judul dan tautan -->
                    <a class="card-header" href="#collapseCardExample" data-bs-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapseCardExample">Monitoring Lahan 1
                        <div class="card-collapsable-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </a>
                    <div class="collapse show" id="collapseCardExample">
                        <br>
                        <div class="container">
                            <div class="row">
                                <!-- Card untuk Kelembaban -->
                                <div class="col-lg-3 col-xl-3 mb-3">
                                    <div class="card bg-teal text-white h-100">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="me-3">
                                                    <div class="text-white-75 lager">Kelembaban</div>
                                                    <div
                                                        class="text-lg fw-bold"><?php echo $row_lora0["sensor_kelembaban"]; ?>
                                                        &percnt;</span></div>
                                                </div>
                                                <i class="fas fa-wind fa-2xl"></i>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between small">
                                            <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card untuk Natrium -->
                                <div class="col-lg-3 col-xl-3 mb-3">
                                    <div class="card bg-warning text-white h-100">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="me-3">
                                                    <div class="text-white-75 lager">Natrium</div>
                                                    <div
                                                        class="text-lg fw-bold"><?php echo $row_lora1["sensor_n"]; ?>
                                                        &percnt;</span></div>
                                                </div>
                                                <i class="fas fa-leaf fa-2xl"></i>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between small">
                                            <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card untuk Phosphat -->
                                <div class="col-lg-3 col-xl-3 mb-3">
                                    <div class="card bg-purple text-white h-100">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="me-3">
                                                    <div class="text-white-75 large">Phosphat</div>
                                                    <div
                                                        class="text-lg fw-bold"><?php echo $row_lora2["sensor_p"]; ?>
                                                        &percnt;</span></div>
                                                </div>
                                                <i class="fas fa-leaf fa-2xl"></i>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between small">
                                            <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card untuk Kalium -->
                                <div class="col-lg-3 col-xl-3 mb-3">
                                    <div class="card bg-orange text-white h-100">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="me-3">
                                                    <div class="text-white-75 small">Kalium</div>
                                                    <div
                                                        class="text-lg fw-bold"><?php echo $row_lora3["sensor_k"]; ?>
                                                        &percnt;</span></div>
                                                </div>
                                                <i class="fas fa-leaf fa-2xl"></i>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between small">
                                            <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card untuk pH -->
                                <div class="col-lg-3 col-xl-3 mb-3">
                                    <div class="card bg-primary text-white h-90">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="me-3">
                                                    <div class="text-white-75 lager">pH</div>
                                                    <div
                                                        class="text-lg fw-bold"><?php echo $row_lora0["sensor_ph"]; ?>
                                                        &percnt;</span></div>
                                                </div>
                                                <i class="fas fa-tree fa-2xl"></i>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between small">
                                            <a class="text-white stretched-link" href="lahan1.php">View Update</a>
                                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    
    <?php include "footer.php" ?>
</div>
</div>
</body>

</html>
