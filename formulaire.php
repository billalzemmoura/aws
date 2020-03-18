<?php
session_start();
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$nom = $_POST['nom'];
$password=$_POST['password'];
$hash = sha1($password);
$prenom = $_POST['prenom'];
$email = $_POST['email'];








if(!empty($nom) AND !empty($prenom)AND !empty($password) AND !empty($email) ){
 $stmt=$db->prepare("INSERT INTO joueur(nom,prenom,password,email)
 	           VALUES (:wnom,:wprenom,:wpss,:wemail);
	                   
	                  ");	
 $stmt->execute( array(

 	'wnom' => $nom,
 	'wprenom' =>$prenom ,
 	'wpss' =>$password,
 	'wemail' => $email


 	 ));
 echo "okkk";
 header('location:login.php');
}else {
	echo "err user";
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
		<title>formulaire</title>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<!-- start header -->
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
					
						<li class="active"><a href="formulaire.php">inscription</a></li>
							
					
					</ul>
				</div>
			</div>
		</div>
		<!-- end header -->

		
		<div class="contact">
			<div class="container">
			
				<form method="POST" class="form fl-left">
					<label>nom</label>
					<input type="text" name="nom">
					<label>prenom</label>
					<input type="text" name="prenom">
					<label>email</label>
					<input type="email" name="email">
					<label>password</label>
					<input type="password" name="password">
					<input type="submit" value="valide">
					
				</form>
			</div>
		</div>
		
		
		
		
		
	<div class="footer">
			<div class="container">
				<span>Copyright &copy; aws bataille </span>
			</div>
		</div>	
		
		
		
	</body>
</html>
