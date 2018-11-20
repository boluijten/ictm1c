<?php
session_start();
// Register system
	if(isset($_POST['submitRegisterBTN'])){
		$voornaam = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'voornaamRegisterTXT'));
		$achternaam = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'achternaamRegisterTXT'));
		$email = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'emailRegisterTXT'));
		$telnummer = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'telnrRegisterTXT'));
		$woonplaats = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'woonplaatsRegisterTXT'));
		$straat = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'straatRegisterTXT'));
		$huisnummer = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'huisnummerRegisterTXT'));
		$postcode = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'postcodeRegisterTXT'));
		$password = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'passwordRegisterTXT'));
		$passwordCheck = mysqli_real_escape_string($connect, filter_input(INPUT_POST,'passwordRetypeRegisterTXT'));
		if($password == $passwordCheck){
			

			$result = mysqli_query($connect,"SELECT * FROM user WHERE email = '$email'");
			if (!mysqli_num_rows($result)==0){
				echo "Username already taken!";
			}else{
				$hash = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO user (voornaam, achternaam, email, telnr, woonplaats, straat, huisnummer, postcode, password) VALUES ('$voornaam', '$achternaam', '$email', '$telnummer', '$woonplaats', '$straat', '$huisnummer', '$postcode', '$hash')";
				if ($connect->query($sql) === TRUE) {
				    echo "<script>alert('New user created successfully');</script>";
				} else {
				    echo "Error: " . $sql . "<br>" . $connect->error;
				}
			}


			
		}else{
			echo "Passwords don't match!";
		}
	}

// Login system
	if(isset($_POST['submitLoginBTN'])){
		$usernameLogin = mysqli_real_escape_string($connect, filter_input(INPUT_POST, 'emailLoginTXT'));
		$passwordLogin = mysqli_real_escape_string($connect, filter_input(INPUT_POST, 'passwordLoginTXT'));
		$result = mysqli_query($connect,"SELECT * FROM user WHERE email = '$usernameLogin'");
		
		if (mysqli_num_rows($result)==1){
			$row=mysqli_fetch_row($result);
			if(password_verify($passwordLogin, $row[9])){
				echo "Welcome ".$row[1]."!";
				$_SESSION['naam'] = $row[1];
				$_SESSION['user_id'] = $row[0];
				echo "<script>alert('Logged in! Welcome ".$_SESSION['username']."');</script>";
				header("location: index.php");

			}else{
				echo "Wrong password!";
			}
		}else{
			echo "Username not found!";
		}
		
	}

// Logout system
	if(isset($_POST['logout'])){
		session_destroy();
		header("location: login.php");
	}

?>