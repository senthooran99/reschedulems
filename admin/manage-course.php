<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Course</h1>
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

    <a href="add-course.php" class="btn-primary">Add Course</a>
    <br  /><br  /><br  />
<table class="tbl-full">
    <tr>
            <th>CourseCode</th>
            <th>CourseName</th>
            <th>Credits</th>
            <th>DepartmentID</th>
            <th>CoordinatorID</th>
            <th>Actions</th>
        <br  />
</tr>
<br  /><br  />

<?php
    $sql ="SELECT * FROM course";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count =mysqli_num_rows($res);
        if($count>0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
                $code = $rows['code'];
                $cname = $rows['CourseName'];
                $credits = $rows['Credits'];
                $dId = $rows['DepartmentID'];
                $cID = $rows['CoordinatorID'];
                

                ?>
                <tr>
                    <td><?php echo $code; ?> </td>
                    <td><?php echo $cname; ?></td>
                    <td><?php echo $credits; ?></td>
                    <td><?php echo $dId; ?></td>
                    <td><?php echo $cID; ?></td>
                    
                    <td> 
                    <a href="<?php echo SITEURL; ?>admin/update-course.php?id=<?php echo $code; ?>" class="btn-secondary">Update Course</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-course.php?id=<?php echo $code; ?>" class="btn-delete">Delete Course</a>
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
