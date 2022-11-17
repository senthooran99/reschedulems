<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Course</h1>

        <br><br>

        <?php 
            
            $id=$_GET['id'];

            //Create SQL Query to Get the Details
            $sql="SELECT * FROM course WHERE code='$id'";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    // Get the Details
                    $row=mysqli_fetch_assoc($res);

                    $Course_Name=$row['CourseName'];
                    $code=$row['code'];
                    $credits=$row['Credits'];
                    $CoID =$row['CoordinatorID'];
                    $DeID =$row['DepartmentID']; 
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin/manage-course.php');
                }
            }
        
        ?>

<form action="" method="POST">
            <table class="tbl-30">
            <tr>
                    <td>Course Code : </td>
                    <td>
                        <input type="text" name="code" value="<?php echo $code; ?>"readonly>
                    </td>
                </tr>  
                <tr>
                    <td>Course Name : </td>
                    <td>
                        <input type="text" name="course_name" value="<?php echo $Course_Name; ?>">
                    </td>
                </tr>  
    
                <tr>
                    <td>Credits: </td>
                    <td>
                        <input type="text" name="credits" value="<?php echo $credits; ?>">
                    </td>
                </tr>  
                <tr>
                    <td>User Coordinotor ID : </td>
                    <td>
                        <input type="text" name="C_ID" value="<?php echo $CoID; ?>">
                    </td>
                </tr>  
                <tr>
                    <td>Department ID: </td>
                    <td>
                        <input type="text" name="D_ID" value="<?php echo $DeID; ?>">
                    </td>
                </tr> 
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Course" class="btn-secondary">
                    </td>
                </tr>   
            </table>
</form> 
    </div>
</div>

<?php 

    if(isset($_POST['submit']))
    {
        
        $Course_Name =$_POST['course_name'];
        $code=$_POST['code'];
        $credits =$_POST['credits'];
        $CoID =$_POST['C_ID'];
        $DeID =$_POST['D_ID']; 
        $sql = "UPDATE course SET
        CourseName= '$Course_Name',
        Credits='$credits',
        CoordinatorID='$CoID',
        DepartmentID='$DeID'
        WHERE code='$code'
        ";

        $res = mysqli_query($conn, $sql);
   
        if($res==TRUE)
        {
            
            $_SESSION['update'] = "<div class='success'>Course Updated Successfully.</div>";
          
            header('location:'.SITEURL.'admin/manage-course.php');
        }
        else
        {
           
            $_SESSION['update'] = "<div class='error'>Failed to Delete course.</div>";
           
            header('location:'.SITEURL.'admin/manage-course.php');
        }
    }

?>

<?php include('partials/footer.php'); ?>