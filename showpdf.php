<?php
$con=mysqli_connect('localhost','root','','erp');

//print_r($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if(isset($_POST['search']))
		{
			$rollno=$_POST['rollno'];

			$qry=mysqli_query($con,"SELECT * FROM `view_marksheet` WHERE '$rollno'=rollno");
			if(mysqli_num_rows($qry)>0)
			{
				while($row=mysqli_fetch_assoc($qry))
				{
					//echo $row['pdf_file'];
					header('Content-type:application/pdf');
					header('Content-Transfer-Encoding: binary');
					header('Content-Ranges:bytes');
					$file=$row['marksheet'];
					readfile($file);
				}
			}
			else
			{
				echo "please tri again !!";
			}
		}
	?>
<form method="post">
	Roll No :<input type="number" name="rollno"><br>
	<button name="search" value="search">search</button>
</form>
</body>
</html>