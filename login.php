<?php
session_start();
if(isset($_SESSION['email'])){
	
	  header('location:index.html');
	
	}


include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$mail = $_POST['email'];
$password=$_POST['password'];



$stmt = $db->prepare("SELECT email , password ,id
	                  FROM joueur
	                  WHERE  email=? AND password=?  LIMIT 1");

$stmt->execute(array($mail,$password));
$row = $stmt->fetch();
$count = $stmt->rowCount();

if($count > 0){
$_SESSION['email']=$mail; 
$_SESSION['uid']=$row['id']; 

header('location:index.html');

}

}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, intial-scale=1">
		<meta name="author" content="discoveryvip">
		<meta name="description" content="155 characters what is onthis page">
		<title>login</title>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	
		<div class="header">
			<div class="slider">
				<div class="container">
					
				</div>
			</div>
			<div class="navbar">
				<div class="container">
					<h2 class="fl-left"><span>bataille navale</span></h2>
					<ul>
						<li  ><a href="index.html">acceuil</a></li>
						<li ><a href="formulaire.php">inscription</a></li>
						<li class="active"><a href="#">login</a></li>
							
					
					</ul>
				</div>
			</div>
		</div>
		

		
		<div   class="contact" >
			<div class="container">
			
				<form class="form fl-left"   action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >

					<label>username</label>
					<input type="email" name="email">
					<label>password</label>
					<input type="password" name="password">		
					<input type="submit" value="login">
					
				</form>
			</div>
		</div>
		

			<div class="footer">
			<div class="container">
				<span>Copyright &copy; aws bataille</span>
			</div>
		</div>
		
		
	
		
	
		
		
		
	</body>
</html>
