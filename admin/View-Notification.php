<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Notifications </h1>
    
    <?php 
                ?>
              
<table class="tbl-full">
    <tr>
            <th>Accepted Form ID </th>
            <th>Student ID</th>
            <th>Course Code</th>
            <th>Session </th>
            <th>Purpose</th>
        <br  />
</tr>
<br  /><br  />

<?php
 $id=$_GET['id'];
    //$sql ="SELECT * FROM form";
    $sql="SELECT * FROM form WHERE ID='$id'";

    $res=mysqli_query($conn,$sql);
    if($res==TRUE){
        $count =mysqli_num_rows($res);
        if($count==1)
        {
            $rows=mysqli_fetch_assoc($res);
            
                $ID=$rows['ID'];
                $studentID = $rows['StudentID'];
                $session = $rows['Session'];
                $PId = $rows['PurposeID'];
                $code=$rows['Code'];
                
                ?>

                <tr>
                    <td><?php echo $ID; ?> </td>
                    <td><?php echo $studentID; ?></td>
                    <td><?php echo $code; ?></td>
                    <td><?php echo $session; ?></td>
                    <td><?php echo $PId; ?></td>
                    <br  /><br  />
            </td>
            </tr>                
                <?php
            

        }
        else{

        }
    }
?>

</table>

<table class="tbl-full">

<tr>
            <th>Rejected Form ID </th>
            <th>Student ID</th>
            <th>Course Code</th>
            <th>Session </th>
            <th>Purpose</th>
        <br  />
</tr>




</table>
<br  />
</div>
</div>
<?php include('partials/footer.php'); ?>
