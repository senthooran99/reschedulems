<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Department</h1>
    <br  />
    <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; 
                        unset($_SESSION['add']); 
                    }


                ?>
             <br><br><br>   

    <a href="add-department.php" class="btn-primary">Add Department</a>
    <br  />
<table class="tbl-full">
    <tr>
            <th>Batch ID</th>
            <th>Batch Name</th>
            <th>Head of the Department ID</th>
        <br  />
</tr>
<br  /><br  />

<?php
    $sql ="SELECT * FROM department";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count =mysqli_num_rows($res);
        if($count>0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
                $code = $rows['DepartmentCode'];
                $name = $rows['DepartmentName'];
                $HOD = $rows['HOD_ID'];

                ?>
                <tr>
                    <td><?php echo $code; ?> </td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $HOD; ?></td>
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
