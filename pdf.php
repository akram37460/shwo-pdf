<?php
$con=mysqli_connect('localhost','root','','contact');
if(isset($_POST['submit']))
{
	$allow=array('pdf');

	$rollno=$_POST['rollno'];

	$temp=explode(".", $_FILES['pdf_file']['name']);

	$extension=end($temp);

	$upload_file=$_FILES['pdf_file']['name'];

	$a=move_uploaded_file($_FILES['pdf_file']['tmp_name'],"upload/pdf_".$_FILES['pdf_file']['name']);
	if($a)
	{
		$qry=mysqli_query($con,"INSERT INTO `uoload_pdf_file`(`pdf_file`, `rollno`) VALUES ('$upload_file','$rollno')");
		echo "PDF upload successfully";
	}
	else
	{
		echo "Please try again";
	}

	//$qry=mysqli_query($con,"INSERT INTO 'upload_pdf_file' ('pdf_file')VALUES('".$upload_file."')");
	
	//echo $qry;
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" role="form" enctype="multipart/form-data"> <br>
	Roll No<input type="number" name="rollno" required=""><br>
	<input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" />
	<button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
</body>
</html>