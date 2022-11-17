<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Course</h1>
        <br  /><br  />

        <?php 
            if(isset($_SESSION['add'])) 
            {
                echo $_SESSION['add']; 
                unset($_SESSION['add']); 
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Course Name : </td>
                    <td>
                        <input type="text" name="course_name" placeholder="Enter the course">
                    </td>
                </tr>  
                <tr>
                    <td>Course Code : </td>
                    <td>
                        <input type="text" name="code" placeholder="Enter the code">
                    </td>
                </tr>  
                <tr>
                    <td>Credits: </td>
                    <td>
                        <input type="text" name="credits" placeholder="Enter the no. credits">
                    </td>
                </tr>  
                <tr>
                    <td>User Coordinotor ID : </td>
                    <td>
                        <input type="text" name="C_ID" placeholder="Enter the coordinator ID">
                    </td>
                </tr>  
                <tr>
                    <td>Department ID: </td>
                    <td>
                        <input type="text" name="D_ID" placeholder="Enter the Department ID">
                    </td>
                </tr> 
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Course" class="btn-secondary">
                    </td>
                </tr>   
            </table>
</form>  

    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php

    if(isset($_POST['submit']))
    {
        $Course_Name =$_POST['course_name'];
        $code=$_POST['code'];
        $credits =$_POST['credits'];
        $CoID =$_POST['C_ID'];
        $DeID =$_POST['D_ID']; 

        $sql="INSERT INTO course SET
        CourseName= '$Course_Name',
        code='$code',
        Credits='$credits',
        CoordinatorID='$CoID',
        DepartmentID='$DeID'
        ";
        
        $res=mysqli_query($conn,$sql) or die(mysqli_error());

        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Course Added Successfully.</div>";
           
            header("location:".SITEURL.'admin/manage-course.php');
        }
        else
        {
            
            $_SESSION['add'] = "<div class='error'>Failed to Add Course.</div>";
            
            header("location:".SITEURL.'admin/add-course.php');
        }
        
    }

?>