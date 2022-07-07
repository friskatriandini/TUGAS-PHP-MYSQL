<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Elearning</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<img src="31.png " style="width: 100%;"><br><br>
		<h3><center>LOG IN ELEARNING:</center></h3><br><br>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control">
			<input type="password" name="pass" placeholder="Password"class="input-control">
			<input type="submit" name="submit" value="Log in" class="btn">

		</form>	
		<?php 
			if(isset($_POST['submit'])){
				include 'db.php';

				$user = $_POST['user'];
				$pass = $_POST['pass'];

				$cek = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '".$user."' AND password = '".($pass)."'");
				if(mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login']= true;
					$_SESSION['a_global']= $d;
					$_SESSION['id']= $d->admin_id;
					echo '<script>window.location="tampilan.php"</script>';
				}else{
					echo '<script>alert("Username atau password Anda salah!")</script>';
				}
			}		
		?>
			
	</div>
</body>
</html>