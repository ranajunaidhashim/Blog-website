<?php include("header.php") ?>
<?php include("sidebar.php") ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Manage Messages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Messages</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Messages</h5>
                        <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>-->

                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead class="datatable">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q1 = "SELECT * FROM `contact` order by id desc";
                                $result = mysqli_query($conn, $q1);
                                $counter = 1;
                                while ($msg = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <th scope="row" id="tableid"><?php echo $counter; ?></th>
                                        <!-- <th scope="row" id="tableid"><?php echo $msg["id"] ?></th> -->
                                        <td><?php echo $msg["name"] ?></td>
                                        <td><?php echo $msg["email"] ?></td>
                                        <td><?php echo $msg["phone"] ?></td>
                                        <td><?php echo $msg["message"] ?></td>
                                        <td><?php echo $msg["date"] ?></td>
                                    </tr>
                                    
                                <?php  $counter++; } ?>
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
<!-- <script>
    document.getElementById("tableid").value =""
    function myfun(){
        while(true){
            i++;

        }
    }
</script> -->