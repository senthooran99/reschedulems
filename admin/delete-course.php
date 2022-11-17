<?php 
    include('partials/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM course WHERE code='$id'";

    $res=mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Course Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/manage-course.php');
    }
    else
    {

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-course.php');
    }

?>