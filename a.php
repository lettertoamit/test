
<?php 
	print_r($_POST);
	if( !isset($_POST['encription'] ) )
	{ 
		session_start();
		$encription = md5(rand());
		$_SESSION["encription"] = $encription;
		echo "inside not submit";
	//	print_r( $_POST['submit']);
	}
	else
	{
		echo "inside submit";
	 $con =	mysqli_connect("localhost" , "root","","storage");
	 if( mysqli_connect_errno())
	 {
	 	die("Connection failed: " . $con->connect_error);
	 }
	 $name = $_POST['name'];
	 $number = $_POST['number'];
	 $desc = $_POST['desc'];
	 $dob = $_POST['dob'];
	 $encription = $_POST['encription'];
	 $sql = "INSERT INTO data(name,number,descx,dob)
VALUES ( '$name' , '$number', '$desc' , '$dob' )";

	if( $_SESSION['encription'] == $encription ){
		if ($con->query($sql) === TRUE) {
    	echo "New record created successfully";
    	$_SESSION["encription"] = null;
   		session_destroy();
  	  //	header("redirect:a.php?msg=New record created successfully");
	} else {
    	echo "Error: " . $sql . "<br>" . $con->error;
	}
}else{
	echo "cannot submit form twice";
}

     $con->close();
	}
?>
<form  method="post"  action="a.php"  id="form1"  >
Name <input type='text' value='' name='name' />
Number <input type='text' value='' name='number' />
Desc <input type='text' value='' name='desc' />
DOB <input type='text' value='' name='dob' />
<input type='hidden' value="<?=$encription?>" name='encription' />
  <input type="submit" value="Submit">
</form> 
 