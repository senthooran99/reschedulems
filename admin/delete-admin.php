<?php 

session_start();
    include('partials/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM admin WHERE EmployeeID=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {

        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

?>