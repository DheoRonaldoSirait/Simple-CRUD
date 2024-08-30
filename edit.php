<?php
session_start();

require 'db_con.php';
?>

<?php include('resources/header.php') ?>


  <div class="container mt-5">

        <?php include('message.php'); ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee Update
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
                                                                
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="employee_id" value="<?= $employee_id;  ?>"> 
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?=  $employee['name']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?=  $employee['email']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="<?=  $employee['phone']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Position</label>
                                        <input type="text" name="position" value="<?=  $employee['position']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </form>
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
