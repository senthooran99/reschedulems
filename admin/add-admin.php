<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
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
                    <td>Employee Name : </td>
                    <td>
                        <input type="text" name="Employee_name" placeholder="Enter the name">
                    </td>
                </tr>  
                <tr>
                    <td>Employee ID : </td>
                    <td>
                        <input type="text" name="Employee_ID" placeholder="Enter the ID">
                    </td>
                </tr>  
                <tr>
                    <td>Contact No : </td>
                    <td>
                        <input type="text" name="Employee_ContactNo" placeholder="Enter the contactNo">
                    </td>
                </tr>  
                <tr>
                    <td>User Name : </td>
                    <td>
                        <input type="text" name="User_name" placeholder="Enter the user name">
                    </td>
                </tr>  
                <tr>
                    <td>Password : </td>
                    <td>
                        <input type="password" name="Password" placeholder="Enter the Password">
                    </td>
                </tr> 
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
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
        //Get the data from form
        $Employee_Name =$_POST['Employee_name'];
        $ID=$_POST['Employee_ID'];
        $contactNo =$_POST['Employee_ContactNo'];
        $User_Name =$_POST['User_name'];
        $Password =$_POST['Password']; 

        //Sql Query to save
        $sql="INSERT INTO admin SET
        Name= '$Employee_Name',
        EmployeeID='$ID',
        ContactNo='$contactNo',
        UserName='$User_Name',
        Password='$Password'
        ";
        
        $res=mysqli_query($conn,$sql) ;

        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
        
    }

?>