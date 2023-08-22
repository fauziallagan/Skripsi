<?php
require_once "data.php";
require "session.php";

// Eksperimen Gauge
try{
    $id = saring($_GET['id_mesin']);
    $sql = "SELECT nilai_analog, tegangan_terukur, id_mesin FROM kalibrasi WHERE id_mesin='$id'"; 
    $row = $connection->query($sql);
    $row->setFetchMode(PDO::FETCH_ASSOC);
} catch(PDOException $e){
    die("Connection to Database Failed!. Please Check Database Connection!!" . $e->getMessage());
}
while($rows = $row->fetch()){
    $digital = $rows['tegangan_terukur'] / $rows['nilai_analog'];
    $id_mesin = $rows['id_mesin'];
}

try{

    $sql_input = 'SELECT a1, a2, a3, a4, a5, a6, a7, a8  FROM input'; 
    $row_input = $connection->query($sql_input);
    $row_input->setFetchMode(PDO::FETCH_ASSOC);
} catch(PDOException $e){
    die("Connection to Database Failed!. Please Check Database Connection!!" . $e->getMessage());
}

while($rows_input = $row_input->fetch()){
   $analog1 = $rows_input['a1'];
   $analog2 = $rows_input['a2'];
   $analog3 = $rows_input['a3'];
   $analog4 = $rows_input['a4'];
   $analog5 = $rows_input['a5'];
   $analog6 = $rows_input['a6'];
   $analog7 = $rows_input['a7'];
   $analog8 = $rows_input['a8'];
}

// Eksperiment temperature
try{
    $sql_temperature = 'SELECT temp FROM input';
    $row_temperature = $connection->query($sql_temperature);
    $row_temperature->setFetchMode(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    die("Database Failed!. Check Database Connection!!". $e->getMessage());
}
while($temperature_rows = $row_temperature->fetch()){
    $temperature = $temperature_rows['temp'];
}
?> 
<?php include "header.php"?>
<head>
    <!-- CSS gauge -->
    <link href="css/jquery.simplegauge.css" type="text/css" rel="stylesheet"/>
        <style>
        @font-face {
            font-family: 'Digital Dream Skew Narrow';
            src: URL('assets/digital-dream.skew-narrow.ttf') format('truetype');
            }
            #tegangan { width:  20em; height: 20em; }
            #aki { width:  20em; height: 20em; }
            #regulator { width:  20em; height: 20em; }
        </style>
</head>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Account)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <div class="sidenav-menu-heading d-sm-none">Account</div>
                            <!-- Sidenav Link (Alerts)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                                Alerts
                                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                            </a>
                            <!-- Sidenav Link (Messages)-->
                            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                            <a class="nav-link d-sm-none" href="#!">
                                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                            </a>
                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Menu</div>
                            <!-- Sidenav Accordion (Dashboard)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                                <div class="nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboards
                            
                            </a>
                            <a class="nav-link" href="./tables.php"><div class="nav-link-icon"><i class="fas fa-chart-line"></i></div>
                                Log Data 
                            </a>
                      
                            <!-- Account -->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseApps" aria-expanded="false" aria-controls="collapseApps">
                            <div class="nav-link-icon"><i class="fas fa-user-circle"></i>
                            </div>
                                Account
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseApps" data-bs-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                                    <!-- Nested Sidenav Accordion (Apps -> Knowledge Base)-->
                                          <a class="nav-link" href="account-profile.php">
                                            <div class="nav-link-icon"><i class="fas fa-user"></i></div>Profile</a>
                                    </a>
                                   
                                    <!-- Nested Sidenav Accordion (Apps -> Posts Management)-->
                                        <a class="nav-link" href="account-security.php">
                                            <div class="nav-link-icon"><i class="fas fa-user-lock"></i></div>Security</a>
                                       
                                </nav>
                            </div>
                         
                            
                            <!-- Sidenav Heading (Custom)-->
                            <div class="sidenav-menu-heading">Admin</div>

                                    <!-- Nested Sidenav Accordion (Pages -> Admin)-->
                                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#appsCollapseUserManagement" aria-expanded="false" aria-controls="appsCollapseUserManagement">
                                        <div class="nav-link-icon"><i data-feather="settings"></i></div> User Management
                                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="appsCollapseUserManagement" data-bs-parent="#accordionSidenavAppsMenu">
                                        <nav class="sidenav-menu-nested nav">
                                            <a class="nav-link" href="user-management-list.php">
                                                <div class="nav-link-icon"><i class="fas fa-user"></i></div>Users List</a>
                                            <a class="nav-link" href="user-management-edit-user.php">
                                                <div class="nav-link-icon"><i class="fas fa-user-edit"></i></div>Edit User</a>
                                            <a class="nav-link" href="user-management-add-user.php">
                                                <div class="nav-link-icon"><i class="fas fa-user-plus"></i></div>Add User</a>
                                            <a class="nav-link" href="user-management-groups-list.php">
                                                <div class="nav-link-icon"><i class="fas fa-user-friends"></i></div>Groups List</a>
                                            
                                        </nav>
                                    </div>
                                    <a class="nav-link" href="calibration.php"><div class="nav-link-icon"><i class="fas fa-compass"></i></div>
                                    Calibration
                                     </a>
                            </div>
                        </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as: </div>
                            <div class="sidenav-footer-title"><?php echo $role; ?></div>
                        </div>
                    </div>
                </nav>
            </div>
        
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                                            Dashboard <?php echo $id_mesin;?>
                                        </h1>
                                        <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                                    </div>
                                    <div class="col-12 col-xl-auto mt-4">
                                    <form action="baca.php" method="get">
                                    <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                                            <input name="datefrom" class="form-control ps-0 pointer" id="litepickerRangePlugin" />
                                        </div>
				                	    <br>
                                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                        <button class="btn btn-info disabled" onclick="dateTime()" type="submit">Update</button>
                                        </div>
									</form>
                                </div>
                            </div>   
                        </div>
                    </header>
                    <!-- Main page content-->
                    <!-- Section 1 -->
                    <div class="container-xl px-4 mt-n10">
                        <div class="rows">
                            <div class="card card-collapsable">
                                <a class="card-header" href="#collapseCardExample" data-bs-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">Monitoring
                                    <div class="card-collapsable-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </a>
                                <div class="collapse show" id="collapseCardExample">
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-teal text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 small">Suhu</div>
                                                                <div class="text-lg fw-bold"><?php echo $temperature . "&deg;"."C"?></div>
                                                            </div>
                                                            <i class="feather-xl text-white-50" data-feather="thermometer"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="#!">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-warning text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 lager">Kelembapan</div>
                                                                <div class="text-lg fw-bold">50%</div>
                                                            </div>
                                                            <i class="feather-xl text-white-50" data-feather="wind"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="#!">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-success text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 large">Input Digital</div>
                                                                <div class="text-lg fw-bold">Status : HIGH</div>
                                                            </div>
                                                            <i class="feather-xl text-white-50" data-feather="zap"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="#!">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-xl-3 mb-3">
                                                <div class="card bg-orange text-white h-100">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="me-3">
                                                                <div class="text-white-75 small">Output Digital</div>
                                                                <div class="text-lg fw-bold">Status : OFF</div>
                                                            </div>
                                                            <i class="feather-xl text-white-50" data-feather="cpu"></i>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                                        <a class="text-white stretched-link" href="#!">View Update</a>
                                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer small text-muted">Updated  : <span id="date2"></span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
           
                            <br>
                        <!-- Section 2 -->
                        <div class="row">
                            <div class="col-lg-4 xl-4 mb-4">
                                <div class="card card-header-actions h-100">
                                    <div class="card-header">
                                            Tegangan
                                        <div class="dropdown no-caret">
                                                <!-- <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="areaChartDropdownExample">
                                                    <a class="dropdown-item" href="#!">Last 12 Months</a>
                                                    <a class="dropdown-item" href="#!">Last 30 Days</a>
                                                    <a class="dropdown-item" href="#!">Last 7 Days</a>
                                                    <a class="dropdown-item" href="#!">This Month</a>
                                            </div> -->
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-center">
                                                <div id="tegangan">
                                                </div>
                                            </div>
                                        </div>
                                    <div class="card-footer small text-muted">Updated  : <span id="date1"></span></div>
                                </div>
                            </div>
                            <div class="col-lg-4 xl-4 mb-4">
                                <div class="card card-header-actions h-100">
                                    <div class="card-header">
                                            Accu
                                        <div class="dropdown no-caret">
                                                <!-- <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="areaChartDropdownExample">
                                                    <a class="dropdown-item" href="#!">Last 12 Months</a>
                                                    <a class="dropdown-item" href="#!">Last 30 Days</a>
                                                    <a class="dropdown-item" href="#!">Last 7 Days</a>
                                                    <a class="dropdown-item" href="#!">This Month</a>
                                            </div> -->
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-center">
                                            <div  id="aki"></div>
                                            </div>

                                        </div>
                                        <div class="card-footer small text-muted">Updated  : <span id="date2"></span> </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 xl-4 mb-4">
                                    <div class="card card-header-actions h-100">
                                        <div class="card-header">
                                            Regulator
                                             <div class="dropdown no-caret">
                                                     <!-- <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="areaChartDropdownExample" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                                 <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="areaChartDropdownExample">
                                                         <a class="dropdown-item" href="#!">Last 12 Months</a>
                                                         <a class="dropdown-item" href="#!">Last 30 Days</a>
                                                         <a class="dropdown-item" href="#!">Last 7 Days</a>
                                                         <a class="dropdown-item" href="#!">This Month</a>
                                                 </div> -->
                                             </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-center">
                                                <div  id="regulator">
                                            
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer small text-muted">Updated  : <span id="date3"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </main>
                    <br>
                 <?php include "footer.php"?>
            </div>
        </div>
        <script src="assets/demo/jquery.min.js"></script>
        <script src="assets/demo/jquery.js"></script>
        <script type="text/javascript" src="js/index.js" ></script>
        <!-- jQuery Knob -->
        <!-- <script src="assets/demo/jquery.knob.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-latest.js" type="text/javascript" charset="utf-8"></script>
        <script src="assets/demo/jquery.simplegauge.js" type="text/javascript"></script>
  
  <!-- Costume -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="js/litepicker.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.1/dist/chart.min.js" integrity="sha256-GMN9UIJeUeOsn/Uq4xDheGItEeSpI5Hcfp/63GclDZk=" crossorigin="anonymous"></script>

        <!-- Javascript  -->
        <script>
$(document).ready(function() {
  $('#tegangan').simpleGauge({
    value:  <?php $tegangan = $digital * $analog6;
            $min = 20;
            $max = 30; //edited $digital * $analog6
            if($tegangan < $min){
                echo $min;
            }elseif($tegangan > $max){
                echo $max;
            }else{
                echo round($tegangan,1);
                }?>,
    min:    20,
    max:    30,

    type:   'analog digital', // enable one or the other, or both
    container: {
      scale:  100,            // scale of gauge, in percent
      style:  'background: #ddd; background: linear-gradient(335deg, #ddd 0%, #fff 30%, #fff 50%, #bbb 100%); border-radius: 1000px; border: 5px solid #bbb;'
    },
    title: {
      text:   'Volts',
      style:  'color: #555; font-size: 20px; padding: 10px;'
    },
    digital: {
        text:  <?php if($tegangan < $min){?> 'Min' <?php }elseif($tegangan > $max){?> 'Max' <?php }else{?> '{value.3}'<?php }?>, // edited
        style:  'color: auto; font-size: 30px;'
    },
    analog: {
      minAngle:   -150,
      maxAngle:   150
    },
    labels: {
      text:   '{value}',
      count:  10,
      scale:  70,
      style:  'font-size: 20px;'
    },
    ticks: {
      count:  10,
      scale1: 84,
      scale2: 93,
      style:  'width: 2px; color: #999;'
    },
    subTicks: {
      count:  10,
      scale1: 93,
      scale2: 96,
      style:  'width: 1px; color: #bbb;'
    },
    bars: {
      scale1: 88,
      scale2: 94,
      style:  '',
      colors: [
        [ 20,   '#666666',0, 0],
        // [ 20.0, '#378618', 0, 0 ],
        [ 22.0, '#dd2222', 0, 0 ],
        [ 24.0, '#ffa500', 0, 0 ],
        [ 25.0, '#378618', 0, 0 ],
        [28.1, '#666666', 0,0]
      ]
    },
    pointer: {
      scale: 100,
      //shape: '2,100 -2,100 ...', // x,y coordinates for custom shape
      style: 'color: #ee0; opacity: 0.5; filter: drop-shadow(-3px 3px 2px rgba(0, 0, 0, .7));'
    }
  });
});
$(document).ready(function() {
  $('#aki').simpleGauge({
    value:  <?php $tegangan = $digital * $analog2;
            $min = 16;
            $max = 26;
            if($tegangan < $min){
                echo $min;
            }elseif($tegangan > $max){
                echo $max;
            }else{
                echo round($tegangan,1);
                }?>,
    min:    16,
    max:    26,

    type:   'analog digital', // enable one or the other, or both
    container: {
      scale:  100,            // scale of gauge, in percent
      style:  'background: #ddd; background: linear-gradient(335deg, #ddd 0%, #fff 30%, #fff 50%, #bbb 100%); border-radius: 1000px; border: 5px solid #bbb;'
    },
    title: {
      text:   'Volts',
      style:  'color: #555; font-size: 20px; padding: 10px;'
    },
    digital: {
        text:  <?php if($tegangan < $min){?> 'Min' <?php }elseif($tegangan > $max){?> 'Max' <?php }else{?> '{value.3}'<?php }?>, // edited
        style:  'color: auto; font-size: 30px;'
    },
    analog: {
      minAngle:   -150,
      maxAngle:   150
    },
    labels: {
      text:   '{value}',
      count:  10,
      scale:  70,
      style:  'font-size: 20px;'
    },
    ticks: {
      count:  10,
      scale1: 84,
      scale2: 93,
      style:  'width: 2px; color: #999;'
    },
    subTicks: {
      count:  10,
      scale1: 93,
      scale2: 96,
      style:  'width: 1px; color: #bbb;'
    },
    bars: {
      scale1: 88,
      scale2: 94,
      style:  '',
      colors: [
        [ 16,   '#666666', 0, 0 ],
        [ 18.0, '#dd2222', 0, 0 ],
        [ 20.0, '#ffa500', 0, 0 ],
        [ 21.0, '#378618', 0, 0 ],
        [ 24.1, '#666666', 0,0]
      ]
    },
    pointer: {
      scale: 100,
      //shape: '2,100 -2,100 ...', // x,y coordinates for custom shape
      style: 'color: #ee0; opacity: 0.5; filter: drop-shadow(-3px 3px 2px rgba(0, 0, 0, .7));'
    }
  });
});
$(document).ready(function() {
  $('#regulator').simpleGauge({
    value: <?php $tegangan = $digital * $analog6;
            $min = 6;
            $max = 16; //edited $digital * $analog1
            if($tegangan < $min){
                echo $min;
            }elseif($tegangan > $max){
                echo $max;
            }else{
                echo round($tegangan,1);
                }?>,
    min:    6,
    max:    16,

    type:   'analog digital', // enable one or the other, or both
    container: {
      scale:  100,            // scale of gauge, in percent
      style:  'background: #ddd; background: linear-gradient(335deg, #ddd 0%, #fff 30%, #fff 50%, #bbb 100%); border-radius: 1000px; border: 5px solid #bbb;'
    },
    title: {
      text:   'Volts',
      style:  'color: #555; font-size: 20px; padding: 10px;'
    },
    digital: {
        text:  <?php if($tegangan < $min){?> 'Min' <?php }elseif($tegangan > $max){?> 'Max' <?php }else{?> '{value.3}'<?php }?>, // edited
        style:  'color: auto; font-size: 30px;'
    },
    analog: {
      minAngle:-150,
      maxAngle:150
    },
    labels: {
      text:   '{value}',
      count: 10,
      scale:  70,
      style:  'font-size: 20px;'
    },
    ticks: {
      count:  10,
      scale1: 84,
      scale2: 93,
      style:  'width: 2px; color: #999;'
    },
    subTicks: {
      count:  10,
      scale1: 93,
      scale2: 96,
      style:  'width: 1px; color: #bbb;'
    },
    bars: {
      scale1: 88,
      scale2: 94,
      style:  '',
      colors: [
        [ 6.0,   '#666666', 0, 0 ],
        [ 7.0, '#dd2222', 0, 0 ],
        [ 8.0, '#ffa500', 0, 0 ],
        [ 10.0, '#378618', 0, 0 ],
        [ 15.0, '#666666', 0, 0 ],

      ]
    },
    pointer: {
      scale: 100,
      //shape: '2,100 -2,100 ...', // x,y coordinates for custom shape
      style: 'color: #ee0; opacity: 0.5; filter: drop-shadow(-3px 3px 2px rgba(0, 0, 0, .7));'
    }
  });
});

</script>

    </body>
</html>
