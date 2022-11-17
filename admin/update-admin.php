<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php 
           
            $id=$_GET['id'];

            //Create SQL Query to Get the Details
            $sql="SELECT * FROM admin WHERE EmployeeID=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
              
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['Name'];
                    $username = $row['UserName'];
                    $ContactNo=$row['ContactNo'];
                }
                else
                {

                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="Employee_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Contact No : </td>
                    <td>
                        <input type="text" name="ContactNo" value="<?php echo $ContactNo; ?>">
                    </td>
                </tr>  


                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>


              
            </table>

        </form>
    </div>
</div>

<?php 
session_start();

    if(isset($_POST['submit']))
    {
       
        $id = $_POST['id'];
        $full_name = $_POST['Employee_name'];
        $username = $_POST['username'];
        $contactNo=$_POST['ContactNo'];

        //Update a SQL Query to Update Admin
        $sql = "UPDATE admin SET
        Name = '$full_name',
        UserName = '$username',
        ContactNo='$contactNo' 
        WHERE EmployeeID='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

    
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            //Redirect to Manage Admin Page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }

?>

<?php include('partials/footer.php'); ?>