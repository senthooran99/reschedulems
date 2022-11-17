<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Student</h1>
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
                    <td>Student ID: </td>
                    <td>
                        <input type="text" name="student_id" placeholder="Enter the Student ID">
                    </td>
                </tr> 
                <tr>
                    <td>First Name : </td>
                    <td>
                        <input type="text" name="first_name" placeholder="Enter the First name">
                    </td>
                </tr>  
                <tr>
                    <td>Last Name : </td>
                    <td>
                        <input type="text" name="last_name" placeholder="Enter the Last Name">
                    </td>
                </tr>  
               
                <tr>
                    <td>Department ID : </td>
                    <td>
                        <input type="text" name="D_ID" placeholder="Enter the Department ID">
                    </td>
                </tr>  
                <tr>
                <tr>
                    <td>ContactNo: </td>
                    <td>
                        <input type="text" name="ContactNo" placeholder="Enter the Contact No">
                    </td>
                </tr> 
                    <td>Batch ID: </td>
                    <td>
                        <input type="text" name="B_ID" placeholder="Enter the Batch ID">
                    </td>
                </tr> 
                <tr>
                    <td>Advisor ID: </td>
                    <td>
                        <input type="text" name="A_ID" placeholder="Enter the Advisor ID">
                    </td>
                </tr> 
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Student" class="btn-secondary">
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
        $ID=$_POST['student_id'];
        $Fname=$_POST['first_name'];
        $Lname=$_POST['last_name'];
        $dId=$_POST['D_ID'];
        $cNo=$_POST['ContactNo'];
        $batch=$_POST['B_ID'];
        $Ad_ID=$_POST['A_ID'];

        $sql="INSERT INTO student SET
        Student_id='$ID',
        First_name='$Fname',
        Last_Name='$Lname',
        Dep_ID='$dId' ,
        ContactNo='$cNo',
        BatchID='$batch',
        AdvisorID='$Ad_ID'
        ";
        
        $res=mysqli_query($conn,$sql) or die(mysqli_error());

        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Student added Successfully.</div>";
        
            header("location:".SITEURL.'admin/manage-student.php');
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed to Add Student.</div>";
        
            header("location:".SITEURL.'admin/add-student.php');
        }
        
    }

?>