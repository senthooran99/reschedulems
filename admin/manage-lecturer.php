<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Lecturer</h1>
    <br  />
    <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                ?>
             <br><br><br>   

    <a href="add-lecturer.php" class="btn-primary">Add Lecturer</a>
    <br  />
<table class="tbl-full">
    <tr>
            <th>ID</th>
            <th>Lecturer Name</th>
            <th>Department ID</th>
            <th>Action</th>
        <br  />
</tr>
<br  /><br  />

<?php
    $sql ="SELECT * FROM lecturer";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count =mysqli_num_rows($res);
        if($count>0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
                $code = $rows['ID'];
                $name = $rows['Name'];
                $D_ID = $rows['Dep_ID'];

                ?>
                <tr>
                    <td><?php echo $code; ?> </td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $D_ID; ?></td>
                    <td> 
                    <a href="<?php echo SITEURL; ?>admin/update-lecturer.php?id=<?php echo $ID; ?>" class="btn-secondary">Update lecturer</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-lecturer.php?id=<?php echo $ID; ?>" class="btn-delete">Delete lecturer</a>
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
