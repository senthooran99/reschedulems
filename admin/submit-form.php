<?php include('partials/menu.php'); 

$query = "SELECT * From form order by ID desc Limit 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$lastid = $row['ID'];
if ($lastid == "") {
    $fid = "F001";
} else {
    $fid = substr($lastid, 1);
    $fid = intval($fid);
    $fid = "F0" . ($fid + 1);
}


?>

<div class="main-content">
    <div class="wrapper">
        <h1>Submit Form</h1>

        <br><br>

        

        <form enctype="multipart/form-data" method="post">
            <table class="tbl-30">

            <tr>
                    <td>Form ID : </td>
                    <td>
                        <input type="text"  name="ID" value="<?php echo $fid; ?>" readonly >
                    </td>
                </tr> 
                
                <tr>
                    <td>Student ID : </td>
                    <td>
                        <input type="text" name="Student_ID" placeholder="Enter the Student_ID">
                    </td>
                </tr>
                
                <tr>
                    <td>Course Code : </td>
                    <td>
                        <input type="text" name="Course_ID" placeholder="Enter the Course Code">
                    </td>
                </tr> 

                <tr>
                    <td>Missed Session : </td>
                    <td>
                        <input type="text" name="Session" placeholder="Enter the missed session">
                    </td>
                </tr> 

                <tr>
                    <td>Missed session Date : </td>
                    <td>
                        <input type="text" name="date" placeholder="yyyy-mm-dd">
                    </td>
                </tr> 
                 
                <tr>
                    <td>Missed session Time : </td>
                    <td>
                        <input type="text" name="time" placeholder="hh:mm:ss">
                    </td>
                </tr> 

                <tr>
                    <td>Purpose Code : </td>
                    <td>
                        <input type="text" name="Purpose_ID" placeholder="Enter the Purpose_ID">
                    </td>
                </tr> 

            </table>



  Medical File Upload:<input type="file" name="file">
<input type="submit" name="submit" value="upload details">
</form>


</div>

<?php 


if(isset($_REQUEST["submit"]))
{


    $ID =$_POST['Student_ID'];
    $code=$_POST['Course_ID'];
    $sess=$_POST['Session'];
    $purpose =$_POST['Purpose_ID'];
    $formId=$_POST['Form_ID'];
    $date=$_POST['date'];
    $time=$_POST['time'];

	 $file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="images/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	$allowed=array("jpg");


    $sql = "INSERT INTO form SET
    ID='$fid',
    StudentID= '$ID',
    Session='$sess',
    PurposeID='$purpose',
    Document='$file',
    Date='$date',
    Time='$time',
    Code='$code'
    ";

//mysqli_query($conn, $sql);

	if(in_array($ext,$allowed))
	{
 move_uploaded_file($tmp_name,$path);
// $res= mysqli_query($conn,"insert into form(Document)values('$file')");	
}


$res=mysqli_query($conn,$sql) ;
       if($res==TRUE)
        {
           
            $_SESSION['update'] = "<div class='success'>Form Updated Successfully.</div>";
           
            header('location:'.SITEURL.'admin/submit-form.php');
        }
        else
        {
            
            $_SESSION['update'] = "<div class='error'>Form not Updated Successfully.</div>";
         
            header('location:'.SITEURL.'admin/submit-form.php');
        }
        
    
}
?>
    

<?php include('partials/footer.php'); ?>