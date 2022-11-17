<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Purpose</h1>
    <br  />
    <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Displaying Session Message
                        unset($_SESSION['add']); //REmoving Session Message
                    }


                ?>
             <br><br><br>   

    <a href="add-purpose.php" class="btn-primary">Add Purpose</a>
    <br  />
<table class="tbl-full">
    <tr>
            <th>Purpose ID</th>
            <th>Purpose type</th>
        <br  />
</tr>
<br  /><br  />

<?php
    $sql ="SELECT * FROM purpose";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count =mysqli_num_rows($res);
        if($count>0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
                $code = $rows['PID'];
                $name = $rows['PurposeType'];
                ?>
                <tr>
                    <td><?php echo $code; ?> </td>
                    <td><?php echo $name; ?></td>
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
