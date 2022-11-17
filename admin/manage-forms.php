<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Forms</h1>
             <br><br><br>   
<table class="tbl-full">
    <tr>
            <th>Form ID</th>
            <th>Student ID</th>
            <th>Date</th>
            <th>Actions</th>
        <br  />
</tr>
<br  /><br  />

<?php
    $sql ="SELECT * FROM form";
    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count =mysqli_num_rows($res);
        if($count>0)
        {
            while($rows=mysqli_fetch_assoc($res))
            {
                $code = $rows['ID'];
                $sId = $rows['StudentID'];
                $date = $rows['Date'];

                ?>
                <tr>
                    <td><?php echo $code; ?> </td>
                    <td><?php echo $sId; ?></td>
                    <td><?php echo $date; ?></td>
                    <td> 
                    <a href="<?php echo SITEURL; ?>admin/view-forms.php?id=<?php echo $code; ?>" class="btn-secondary">View Form</a>
                    
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
