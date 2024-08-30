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
                    <h4 class="">Employee Detail
                        <a href="create.php" class="btn btn-primary float-end">Add Employee</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Position</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM employee";
                                $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $employee)
                                    {
                                        // echo $employee['name'];
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $employee['id']; ?></td>
                                            <td class="text-center"><?= $employee['name']; ?></td>
                                            <td class="text-center"><?= $employee['email']; ?></td>
                                            <td class="text-center"><?= $employee['phone']; ?></td>
                                            <td class="text-center"><?= $employee['position']; ?></td>
                                            <td class="text-center">
                                                <a href="view.php?id=<?= $employee['id']; ?>" class="btn btn-info btn-sm"> <i class="fa-solid fa-pen-to-square"></i> View</a>
                                                <a href="edit.php?id=<?= $employee['id']; ?>" class="btn btn-success btn-sm"> <i class="fa-solid fa-eye"></i> Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete" value="<?= $employee['id']; ?>" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else{
                                    echo "<h5>No record</h5>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>

<?php include('resources/footer.php') ?>

