<?php
include("header.php");
include("sidebar.php");

$qa = "SELECT * FROM  posts";
$qb = "SELECT * FROM `users`";
$qc = "SELECT * FROM contact";

$resulta = mysqli_query($conn, $qa);
$resultb = mysqli_query($conn, $qb);
$resultc = mysqli_query($conn, $qc);

$postCount = mysqli_num_rows($resulta);
$userCount = mysqli_num_rows($resultb);
$messageCount = mysqli_num_rows($resultc);

?>


<main id="main" class="main">

  <div class="pagetitle">
    <h1>Chart.js</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Charts</li>
        <li class="breadcrumb-item active">Progress</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pie Chart</h5>

            <!-- Pie Chart -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <canvas id="pieChart" style="max-height: 400px;"></canvas>
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new Chart(document.querySelector('#pieChart'), {
                  type: 'pie',
                  data: {
                    labels: [
                      'Posts',
                      'Users',
                      'Messages'
                    ],
                    datasets: [{
                      label: 'My First Dataset',
                      data: [<?php echo $postCount ?>, <?php echo $userCount ?>, <?php echo $messageCount ?>],
                      backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                      ],
                      hoverOffset: 4
                    }]
                  }
                });
              });
            </script>
            <!-- End Pie Chart -->

          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<?php include("footer.php") ?>