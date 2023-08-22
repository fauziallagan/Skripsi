<?php
require 'connection.php';
require 'datalahan4/dataxl4kelembapan.php'; //a> memasukan memnaggil fungsi
require 'dataywaktu.php'; //a> memasukan memnaggil fungsi
require 'datalahan4/dataxl4ph.php';
require 'datalahan4/dataxl4kalium.php';
require 'datalahan4/dataxl4potasium.php';
// $page = $_SERVER['PHP_SELF'];
// $timer = "1";


// Time
date_default_timezone_set('Asia/Jakarta');
$timeZone = date('h:i:s');
?>
<?php include "header.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="SMART IRIGATION" />
  <meta name="author" content="GUNADARMA UNIVERSITY" />
  
  <title>IRIGASI TETES</title>

  <link href="css/styles.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
  <script data-search-pseudo-elements defer
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
    crossorigin="anonymous"></script>
  <!-- Button Section -->

  <head>
    <!-- CSS gauge -->
    <!-- <meta http-equiv="refresh" content="10"> -->

    <!-- USE SCRIPT BELOW IF BROWSER REFRESH 10 SECONDS -->
    <!-- <meta http-equiv="refresh" content="10"> --> 

  </head>
 
  <div id="layoutSidenav_content">
    <main>
      <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
          <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
              <div class="col-auto mt-4">
                <h1 class="page-header-title">
                  <div class="page-header-icon"><i class="fas fa-tachometer-alt"></i></div>
                           Dashboard Lahan 2
                </h1>
                <div class="page-header-subtitle">Sistem Irigasi</div>
              </div>
            </div>
          </div>
      </header>
      <!-- Main page content-->
      <!-- Section 1 -->
      <div class="container-xl px-4 mt-n10">
        <!-- update frequency chart-->
        <!-- <div class="card mb-4">
                            <div class="card-header">Update Frequency</div>
                            <div class="card-body">
                                <div class="chart-area"><canvas id="updateFrequencyChart" width="100%" height="30"></canvas></div>
                            </div>
                            <div class="card-footer small text-muted">Updated today at <?php echo (date("H:i:s", time())); ?> </div>
                        </div> -->
        <!-- Started -->
        <div class="row">
          <div class="col-xl-6 mb-4">
            <div class="card card-collapsable">
              <a class="card-header" href="#collapseCardExampleAccelZ" data-bs-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExampleAccelZ">Sensor Kelembaban
                <div class="card-collapsable-arrow">
                  <i class="fas fa-chevron-down"></i>
                </div>
              </a>
              <div class="collapse show" id="collapseCardExampleAccelZ">
                <div class="container-fuild">
                  <div class="row">
                    <div class="card-body">
                      <div class="chart-area"><canvas id="updateKelembaban" width="100%" height="40"></canvas>
                      </div>
                    </div>
                  <div class="card-footer large text-muted">Updated today at : <?=$timeZone;?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 mb-4">
            <div class="card card-collapsable">
              <a class="card-header" href="#collapseCardExampleGyroX" data-bs-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExampleGyroX">Sensor Nitrogen
                <div class="card-collapsable-arrow">
                  <i class="fas fa-chevron-down"></i>
                </div>
              </a>
              <div class="collapse show" id="collapseCardExampleGyroX">
                <div class="container-fuild">
                  <div class="row">
                    <div class="card-body">
                      <div class="chart-area"><canvas id="updateNitrogen" width="100%" height="40"></canvas>
                      </div>
                    </div>
                   <div class="card-footer large text-muted">Updated today at : <?=$timeZone;?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-6 mb-4">
            <div class="card card-collapsable">
              <a class="card-header" href="#collapseCardExampleGyroY" data-bs-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExampleGyroY">Sensor Potasium
                <div class="card-collapsable-arrow">
                  <i class="fas fa-chevron-down"></i>
                </div>
              </a>
              <div class="collapse show" id="collapseCardExampleGyroY">
                <div class="container-fuild">
                  <div class="row">
                    <div class="card-body">
                      <div class="chart-area"><canvas id="updatePotasium" width="100%" height="40"></canvas>
                      </div>
                    </div>
                    <div class="card-footer large text-muted">Updated today at : <?=$timeZone;?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 mb-4">
            <div class="card card-collapsable">
              <a class="card-header" href="#collapseCardExampleGyroZ" data-bs-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExampleGyroZ">Sensor Kalium
                <div class="card-collapsable-arrow">
                  <i class="fas fa-chevron-down"></i>
                </div>
              </a>
              <div class="collapse show" id="collapseCardExampleGyroZ">
                <div class="container-fuild">
                  <div class="row">
                    <div class="card-body">
                      <div class="chart-area"><canvas id="updateKalium" width="100%" height="40"></canvas>
                      </div>
                    </div>
                     <div class="card-footer large text-muted">Updated today at : <?=$timeZone;?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 mb-4">
            <div class="card card-collapsable">
              <a class="card-header" href="#collapseCardExampleGyroZ" data-bs-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExampleGyroZ">Sensor Ph
                <div class="card-collapsable-arrow">
                  <i class="fas fa-chevron-down"></i>
                </div>
              </a>
              <div class="collapse show" id="collapseCardExampleGyroZ">
                <div class="container-fuild">
                  <div class="row">
                    <div class="card-body">
                      <div class="chart-area"><canvas id="updatePh" width="100%" height="40"></canvas>
                      </div>
                    </div>
                     <div class="card-footer large text-muted">Updated today at : <?=$timeZone;?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
    <br>
  </div>
  </div>
       <?php include "footer.php"?>
  </body>

</html>


<!-- Javascript  -->
<script>




$(document).ready(function() {
const ctx = document.getElementById('updateKelembaban').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: <?php echo $json_datawaktu; ?>,
        datasets: [{
            label: "Update per minutes",
            lineTension: 0.3,
            backgroundColor: "rgba(0, 97, 242, 0.05)",
            borderColor: "rgba(0, 97, 242, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(0, 97, 242, 1)",
            pointBorderColor: "rgba(0, 97, 242, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(0, 97, 242, 1)",
            pointHoverBorderColor: "rgba(0, 97, 242, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: <?php echo $json_data; ?>
        }]
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: "time"
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 10
                }
            }],
            y: {
                beginAtZero: true
            }
        },
        legend: {
            display: true
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: "#6e707e",
            titleFontSize: 14,
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: "index",
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel =
                        chart.datasets[tooltipItem.datasetIndex].label || "";
                    return datasetLabel + ": $" + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});

const nitro = document.getElementById('updateNitrogen').getContext('2d');
const nitroChart = new Chart(nitro, {
    type: 'line',
    data: {
        labels: <?php echo $json_datawaktu; ?>,
        datasets: [{
            label: "Update per minutes",
            lineTension: 0.3,
            backgroundColor: "rgba(0, 97, 242, 0.05)",
            borderColor: "rgba(0, 97, 242, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(0, 97, 242, 1)",
            pointBorderColor: "rgba(0, 97, 242, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(0, 97, 242, 1)",
            pointHoverBorderColor: "rgba(0, 97, 242, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [30,20,50,20,10,60,10,30,20,50 ]
        }]
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: "time"
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 10
                }
            }],
            y: {
                beginAtZero: true
            }
        },
        legend: {
            display: true
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: "#6e707e",
            titleFontSize: 14,
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: "index",
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel =
                        chart.datasets[tooltipItem.datasetIndex].label || "";
                    return datasetLabel + ": $" + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});


const phos = document.getElementById('updatePotasium').getContext('2d');
const potasiumChart = new Chart(phos, {
    type: 'line',
    data: {
        labels: <?php echo $json_datawaktu; ?>,
        datasets: [{
            label: "Update per minutes",
            lineTension: 0.3,
            backgroundColor: "rgba(0, 97, 242, 0.05)",
            borderColor: "rgba(0, 97, 242, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(0, 97, 242, 1)",
            pointBorderColor: "rgba(0, 97, 242, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(0, 97, 242, 1)",
            pointHoverBorderColor: "rgba(0, 97, 242, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: <?php echo $json_datapotasium; ?>
        }]
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: "time"
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 10
                }
            }],
            y: {
                beginAtZero: true
            }
        },
        legend: {
            display: true
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: "#6e707e",
            titleFontSize: 14,
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: "index",
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel =
                        chart.datasets[tooltipItem.datasetIndex].label || "";
                    return datasetLabel + ": $" + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});


const kal = document.getElementById('updateKalium').getContext('2d');
const kalChart = new Chart(kal, {
    type: 'line',
    data: {
        labels: <?php echo $json_datawaktu; ?>,
        datasets: [{
            label: "Update per minutes",
            lineTension: 0.3,
            backgroundColor: "rgba(0, 97, 242, 0.05)",
            borderColor: "rgba(0, 97, 242, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(0, 97, 242, 1)",
            pointBorderColor: "rgba(0, 97, 242, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(0, 97, 242, 1)",
            pointHoverBorderColor: "rgba(0, 97, 242, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: <?php echo $json_datakalium; ?>
        }]
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: "time"
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 10
                }
            }],
            y: {
                beginAtZero: true
            }
        },
        legend: {
            display: true
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: "#6e707e",
            titleFontSize: 14,
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: "index",
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel =
                        chart.datasets[tooltipItem.datasetIndex].label || "";
                    return datasetLabel + ": $" + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});

const ph = document.getElementById('updatePh').getContext('2d');
const phChart = new Chart(ph, {
    type: 'line',
    data: {
       labels: <?php echo $json_datawaktu; ?>,
        datasets: [{
            label: "Update per minutes",
            lineTension: 0.3,
            backgroundColor: "rgba(0, 97, 242, 0.05)",
            borderColor: "rgba(0, 97, 242, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(0, 97, 242, 1)",
            pointBorderColor: "rgba(0, 97, 242, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(0, 97, 242, 1)",
            pointHoverBorderColor: "rgba(0, 97, 242, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: <?php echo $json_dataph; ?>
        }]
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                time: {
                    unit: "time"
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 10
                }
            }],
            y: {
                beginAtZero: true
            }
        },
        legend: {
            display: true
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: "#6e707e",
            titleFontSize: 14,
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: "index",
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel =
                        chart.datasets[tooltipItem.datasetIndex].label || "";
                    return datasetLabel + ": $" + number_format(tooltipItem.yLabel);
                }
            }
        }
    }
});
});
</script>

</body>

</html>