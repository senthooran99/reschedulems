<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>View Forms </h1>
    <br  /><br  />
<table class="tbl-full">
    <tr>
            <th>Form ID </th>
            <th>Student ID</th>
            <th>Course Code</th>
            <th>Session </th>
            <th>Purpose_ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Document</th>
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
                $doc = $rows['Document'];
                $date=$rows['Date'];
                $time=$rows['Time'];
                $code=$rows['Code'];
                
                

                ?>
                <tr>
                    <td><?php echo $ID; ?> </td>
                    <td><?php echo $studentID; ?></td>
                    <td><?php echo $code; ?></td>
                    <td><?php echo $session; ?></td>
                    <td><?php echo $PId; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $time; ?></td>
                    <td><a href="/images/.jpg" download><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($doc); ?>" width="250" height="200"/> </td>
                    <td> 
                    <a href="<?php echo SITEURL; ?>admin/View-Notification.php?id=<?php echo $ID; ?>" class="btn-secondary">Accepted</a>
                    <a href="<?php echo SITEURL; ?>admin/View-Notification.php?id=<?php echo $ID; ?>" class="btn-secondary">Rejected</a>
                   
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
<br  />
</div>
</div>
<?php include('partials/footer.php'); ?>
