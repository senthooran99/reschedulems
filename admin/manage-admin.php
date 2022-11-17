<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Admin</h1>
    <br  /><br  />
    <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; 
                        unset($_SESSION['add']); 
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }

                ?>
             <br><br><br>   

    <a href="add-admin.php" class="btn-primary">Add Admin</a>
    <br  /><br  /><br  />
<table class="tbl-full">
    <tr>
        <th>Emplyee ID</th>
        <th>Emplyee Name</th>
        <th>Contact No</th>
        <th>User name</th>
        <th>Actions</th>
        <br  />
</tr>
<br  /><br  />

<?php
    $sql ="SELECT * FROM admin";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count =mysqli_num_rows($res);
        if($count>0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
                $ID=$rows['EmployeeID'];
                $Employee_name=$rows['Name'];
                $ContactNo=$rows['ContactNo'];
                $user_name=$rows['UserName'];
                

                ?>
                <tr>
                    <td> <?php echo $ID; ?> </td>
                    <td> <?php echo $Employee_name; ?> </td>
                    <td> <?php echo $ContactNo; ?> </td>
                    <td> <?php echo $user_name; ?> </td>
                    
                    <td> 
                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $ID; ?>" class="btn-primary">Change Password</a>
                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $ID; ?>" class="btn-secondary">Update Admin</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $ID; ?>" class="btn-delete">Delete Admin</a>
                    <br  /><br  />
            </td>
            </tr>                
                <?php
            }

        }
        else{

        }
    }
?>
</table>
<br  />

</div>
</div>
<?php include('partials/footer.php'); ?>
