<?php 
    
    include('partials/constants.php');
    $id = $_GET['id'];

    // Create SQL Query to Delete Admin
    $sql = "DELETE FROM student WHERE Student_id='$id'";

    //Execute the Query
    $res=mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Student Deleted Successfully.</div>";
       
        header('location:'.SITEURL.'admin/manage-student.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Student. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-student.php');
    }

   

?>