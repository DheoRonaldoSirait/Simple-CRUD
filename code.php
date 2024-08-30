<?php 
session_start();
require 'db_con.php';

if(isset($_POST['delete']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['delete']);
    $query = "DELETE FROM employee WHERE id='$employee_id'";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Data Deleted Succesfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Data Not Deleted ";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update']))
{   
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);
    $nama = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $position = mysqli_real_escape_string($con, $_POST['position']);

    $query = "UPDATE employee SET name='$nama', email='$email', phone='$phone', position='$position' 
                WHERE id='$employee_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "Employee Data Updated Succesfully";
        header("Location: index.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Employee Data Not Updated ";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save']))
{
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $position = mysqli_real_escape_string($con, $_POST['position']);

    $query = "INSERT INTO employee (name,email,phone,position) VALUES ('$nama','$email','$phone','$position')";

    $query_run = mysqli_query($con, $query);
    if($query_run) {
        $_SESSION['message'] = "Employee Data Created Succesfully";
        header("Location: create.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Employee Data Not Created ";
        header("Location: create.php");
        exit(0);
    }
}

?>