<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Student</h1>

        <br><br>

        <?php 
           
            $id=$_GET['id'];

            //Create SQL Query to Get the Details
            $sql="SELECT * FROM student WHERE Student_id='$id'";

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

                $ID=$row['Student_id'];
                $Fname=$row['First_name'];
                $Lname=$row['Last_Name'];
                $dId=$row['Dep_ID'];
                $cNo=$row['ContactNo'];
                $batch=$row['BatchID'] ;
                $Ad_ID=$row['AdvisorID'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-student.php');
                }
            }
        
        ?>

<form action="" method="POST">
            <table class="tbl-30">
            <tr>
                    <td>Student ID: </td>
                    <td>
                        <input type="text" name="student_id" value="<?php echo $ID; ?>" readonly>
                    </td>
                </tr> 
                <tr>
                    <td>First Name : </td>
                    <td>
                        <input type="text" name="first_name" value="<?php echo $Fname; ?>">
                    </td>
                </tr>  
                <tr>
                    <td>Last Name : </td>
                    <td>
                        <input type="text" name="last_name" value="<?php echo $Lname; ?>">
                    </td>
                </tr>  
               
                <tr>
                    <td>Department ID : </td>
                    <td>
                        <input type="text" name="D_ID" value="<?php echo $dId; ?>">
                    </td>
                </tr>  
                <tr>
                <tr>
                    <td>ContactNo: </td>
                    <td>
                        <input type="text" name="ContactNo" value="<?php echo $cNo; ?>">
                    </td>
                </tr> 
                    <td>Batch ID: </td>
                    <td>
                        <input type="text" name="B_ID" value="<?php echo $batch; ?>">
                    </td>
                </tr> 
                <tr>
                    <td>Advisor ID: </td>
                    <td>
                        <input type="text" name="A_ID" value="<?php echo $Ad_ID; ?>">
                    </td>
                </tr> 
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Student" class="btn-secondary">
                    </td>
                </tr>   
            </table>
</form>  

    </div>
</div>

<?php 
//session_start();
    if(isset($_POST['submit']))
    {
        //Get all the values from form to update
        $ID=$_POST['student_id'];
        $Fname=$_POST['first_name'];
        $Lname=$_POST['last_name'];
        $dId=$_POST['D_ID'];
        $cNo=$_POST['ContactNo'];
        $batch=$_POST['B_ID'];
        $Ad_ID=$_POST['A_ID']; 

        //Create a SQL Query
        $sql = "UPDATE student SET
        First_name='$Fname',
        Last_Name='$Lname',
        Dep_ID='$dId',
        ContactNo='$cNo',
        BatchID='$batch',
        AdvisorID='$Ad_ID'
        WHERE Student_id='$ID'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //Check whether the query executed successfully or not
        if($res==TRUE)
        {
           
            $_SESSION['update'] = "<div class='success'>Student Updated Successfully.</div>";
           
            header('location:'.SITEURL.'admin/manage-student.php');
        }
        else
        {
            
            $_SESSION['update'] = "<div class='error'>Failed to update student.</div>";
           
            header('location:'.SITEURL.'admin/manage-student.php');
        }
    }

?>
<?php include('partials/footer.php'); ?>