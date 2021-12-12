<?php      
    $username = $_POST['user'];
	$password = $_POST['pass'];
	
	//connection
	$con = new mysqli("localhost", "root","","studentdb");
	if($con->connect_error) {
		die("Failed to Connect: ".$con->connect_error);
	} 
	else 
	{
		$stmt = $con->prepare("select * from stu_admin_login where username=?");
		$stmt->bind_param("s",$username);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows>0)
		{
			$data = $stmt_result->fetch_assoc();
			if($data['password']=== $password)
			{
				echo "<h2> Login Success </h2>";
				echo "<center><h2> Your name='$username'</h2><br><h2> Your password='$password'</h2></center>";
				
			}
		
		 else 
		 {
				echo "<h2> Invalid Email or Password</h2>";
		}
		}
	}
?>  