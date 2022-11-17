<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Student</h1>
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

                ?>
             <br><br><br>   

    <a href="add-student.php" class="btn-primary">Add Student</a>
    <br  /><br  /><br  />
<table class="tbl-full">
    <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department ID</th>
            <th>Contact No</th>
            <th>Batch ID</th>
            <th>Actions</th>
        <br  />
</tr>
<br  /><br  />

<?php
    $sql ="SELECT * FROM student";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count =mysqli_num_rows($res);
        if($count>0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
                $ID = $rows['Student_id'];
                $Fname = $rows['First_name'];
                $Lname = $rows['Last_Name'];
                $dId = $rows['Dep_ID'];
                $cNo = $rows['ContactNo'];
                $batch=$rows['BatchID']
                
                

                ?>
                <tr>
                    <td><?php echo $ID; ?> </td>
                    <td><?php echo $Fname; ?></td>
                    <td><?php echo $Lname; ?></td>
                    <td><?php echo $dId; ?></td>
                    <td><?php echo $cNo; ?></td>
                    <td><?php echo $batch; ?></td>
                    
                    <td> 
                    <a href="<?php echo SITEURL; ?>admin/update-student.php?id=<?php echo $ID; ?>" class="btn-secondary">Update Student</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-student.php?id=<?php echo $ID; ?>" class="btn-delete">Delete Student</a>
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
