<!DOCTYPE html>
<style>
    header nav ul li:first-child a {
      font-weight: bold;
    }
  </style>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="SISTEM IRIGASI TETES"/>
        <meta name="author" content=""/>
        <title>SISTEM IRIGASI TETES</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" /> -->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <!-- <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/brands.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
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
                            <a class="nav-link" href="log.php"><div class="nav-link-icon"><i class="fas fa-database"></i></div>
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