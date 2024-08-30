<?php
require 'db_con.php';
?>

<?php include('resources/header.php') ?>

  <div class="container mt-5">        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee Details
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php 
                        if(isset($_GET['id'])){
                            $employee_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM employee WHERE id='$employee_id'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $employee = mysqli_fetch_array($query_run);

                                ?>
                                                                
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <p class="form-control">
                                            <?=  $employee['name']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=  $employee['email']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <p class="form-control">
                                            <?=  $employee['phone']; ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Position</label>
                                        <p class="form-control">
                                            <?=  $employee['position']; ?>
                                        </p>
                                    </div>
                        <?php
                            }
                            else
                            {
                                echo "<h5> No ID Found </h5>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('resources/footer.php') ?>
