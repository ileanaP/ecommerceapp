<?php

	require('controllers/dbconn');
	
	
	
	$log_in_email = '';
	
	if(isset($_POST['email']) && !empty($_POST['email']))
	{		
		$log_in_email = $_POST['email'];			
	}
	
	if(isset($_POST['password']) && !empty($_POST['password']))
	{		
		$log_in_password = $_POST['password'];
		var_dump($password);	
	}
	

	$user_check_query = "Select * FROM user where email = '$log_in_email'";
	
//	echo "query";
	
//	var_dump($user_check_query);
			
	$check_result = mysqli_query($conn, $user_check_query);
				
	$user_checker = mysqli_fetch_assoc($check_result);
			
	//echo "User checker:";
	
	//var_dump ($user_checker);
			
	if($user_checker)// if exists
	{
		$user_pass = "Select password FROM user where email = '$log_in_email'";
				
		$check_pass_result = mysqli_query($conn, $user_pass);
				
		$check_pass = mysqli_fetch_assoc($check_pass_result);
				
		//var_dump ($check_pass);
				
		//echo "checker";
		
		//echo "check_pass array";
		
		$check_pass = implode($check_pass);
		
		
		//var_dump("implode",$check_pass);
		
		
		//var_dump("check strcmp",strcmp(sha1($log_in_password, FALSE), $check_pass));
				
		//var_dump(!($check_pass == sha1($log_in_password, FALSE)));
		
		//echo "pass cript";
		
		var_dump(sha1($log_in_password, FALSE));
				
				
		if(!($check_pass == sha1($log_in_password, FALSE)))
			{
				echo "Wrong username or password!";
			}
		
		else
			{
				//echo " good";
				
				//$f3->
				//$f3->route('POST /index.php',
				//	function(){
		
				//	});
				
				
			}
		
				
				
              			
	}
	else
		{
			echo "User is not registered !";
		}


?>