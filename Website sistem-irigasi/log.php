<?php 
require "connection.php";
try{
$sql = 'SELECT * FROM coba';
  $row = $connection->query($sql);
  $row->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Connection to Database Failed!. Please Check Database Connection!!" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
 <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>
 <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
            <!-- Sidenav Toggle Button-->
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
            <!-- Navbar Brand-->
            <!-- * * Tip * * You can use text or an image for your navbar brand.-->
            <!-- * * * * * * When using an image, we recommend the SVG format.-->
            <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
            <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.php">SISTEM IRIGASI TETES</a>
            <!-- Navbar Search Input-->
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ms-auto">
              
                <!-- Navbar Search Dropdown-->
                <!-- * * Note: * * Visible only below the lg breakpoint-->
                <!-- Alerts Dropdown-->
                <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="me-2" data-feather="bell"></i>
                            Alerts Center
                        </h6>
                        <!-- Example Alert 1-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 29, 2021</div>
                                <div class="dropdown-notifications-item-content-text">This is an alert message. It's nothing serious, but it requires your attention.</div>
                            </div>
                        </a>
    
                    </div>
                </li>
                <!-- Messages Dropdown-->
                <!-- User Dropdown-->
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="assets/img/illustrations/profiles/profile-1.png" /></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-1.png" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">Halo, User</div>
                                <div class="dropdown-user-details-email">user@example.com</div>
                            </div>
                        </h6>
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="account-profile.php">
                            <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                            Account
                        </a>
                        <a class="dropdown-item" href="logout.php">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Logout
                        </a>
                    </div> -->
                </li>
            </ul>
        </nav>
        <div>
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
                            <a class="nav-link collapsed" href="index.php">
                                <div class="nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboards
                            
                            </a>
                            <a class="nav-link" href="logData.php"><div class="nav-link-icon"><i class="fas fa-database"></i></div>
                                Log Data 
                            </a>
                      
                            <!-- Account -->
                            <a class="nav-link collapsed" href="landingpage.php">
                            <div class="nav-link-icon"><i class="fas fa-user-circle"></i>
                            </div>
                                Landing page
                              
                            </a>
                            <!-- Sidenav Heading (Custom)-->
                       
                            <div class="sidenav-menu-heading">Monitoring Area</div>
                             
                                    <a class="nav-link" href="lahan1.php"><div class="nav-link-icon"><i class="fas fa-leaf"></i></div>
                                    Lahan 1
                                     </a>
                                       <a class="nav-link" href="lahan2.php"><div class="nav-link-icon"><i class="fab fa-pagelines"></i></div>
                                    Lahan 2
                                     </a>
                                       <a class="nav-link" href="lahan3.php"><div class="nav-link-icon"><i class="fas fa-tree"></i></div>
                                    Lahan 3
                                     </a>
                                       <a class="nav-link" href="lahan4.php"><div class="nav-link-icon"><i class="fab fa-canadian-maple-leaf"></i></div>
                                    Lahan 4
                                     </a>
                            </div>
                        </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as: </div>
                            <div class="sidenav-footer-title">User</div>
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
                                            <div class="page-header-icon"><i data-feather="filter"></i></div>
                                            Log Data Sensor
                                        </h1>
                                        <div class="page-header-subtitle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Extended DataTables</div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                   
                                     <thead>
    <tr>
      <th>id</th>
      <th>nama</th>
      <th>kelembaban</th>
      <th>sensor N</th>
      <th>sensor P</th>
      <th>sensor K</th>
      <th>PH</th>
      <th>Time</th>
    </tr>
  </thead>
  <tbody>
    <?php  while ($rows = $row->fetch()):?>
  <?php $id = $rows['id'];
  $nama = $rows['nama'];
  $kelembaban = $rows['sensor_kelembaban'];
  $sensor_n = $rows ['sensor_n'];
  $sensor_p = $rows['sensor_p'];
  $sensor_k = $rows['sensor_k'];
  $ph = $rows ['sensor_ph'];
  $times =$rows['timestamp'];
?>
<tr>
  <td><?php echo $id?></td>
 <td><?php echo $nama?></td>
 <td><?php echo $kelembaban?></td>
 <td><?php echo $sensor_n?></td>
  <td><?php echo $sensor_p?></td>
 <td><?php echo $sensor_k?></td>
 <td><?php echo $ph?></td>
  <td><?php echo $times?></td>
                                
</tr>
<?php endwhile;?>

  </tbody>
                                </table>
                            </div>
                        </div>
             
                    </div>
                </main>
            

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables/datatables-simple-demo.js"></script>
</body>
</html>