<?php include('partials/menu.php'); 
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Report Form by session </h1>
<form enctype="multipart/form-data" method="post">
            <table class="tbl-30">
                
                <tr>
                    <td>Course code : </td>
                    <td>
                        <input type="text" name="Session" placeholder="Enter the session">
                    </td>
                </tr>
<tr>
    <td>
<input type="submit" name="submit" value="Filter">
</td>
</tr>
</form>
</div>

<tr>
            <td><h2>Student ID</h2> </td>
            <td> <h2> course code </h2> </td>
        </tr>

<?php 


if(isset($_REQUEST["submit"]))
{
    $code=$_POST['Session'];
   
$sql="SELECT * FROM form WHERE Session='$code'";

$res=mysqli_query($conn,$sql) ;

       
if($res==TRUE){
    $count =mysqli_num_rows($res);
    if($count>0)
    {
        while($rows=mysqli_fetch_assoc($res))
        {
            $id = $rows['StudentID'];
            $sess = $rows['Code'];
        
            ?>
    
            <tr>
                <td><?php echo $id; ?> </td>
                <td><?php echo $sess; ?></td>
    
        </td>
        </tr>                
            <?php
        }

    }
    else{

    }
}
}
?>
</table>