<?php include("header.php") ?>
<?php include("sidebar.php") ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manage Users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Users</h5>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $q1 = "SELECT * FROM `users` order by user_id desc";
                $result = mysqli_query($conn, $q1);
                $counter = 1;
                while ($msg = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <th scope="row" id="tableid"><?php echo $counter; ?></th>
                    <td><?php echo $msg["name"] ?></td>
                    <td><?php echo $msg["username"] ?></td>
                    <td><?php echo $msg["email"] ?></td>
                    <td><?php echo $msg["password"] ?></td>
                    <td><?php echo $msg["created_at"] ?></td>
                  </tr>

                <?php $counter++;
                } ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php include("footer.php") ?>