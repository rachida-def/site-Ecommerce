<?php
session_start();

/* try{
      $db=new PDO('mysql:host=localhost;dbname=site_ecommerce','root','');
      $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 }catch(PDOException $e){
   
      die('erreur est survenue');
     }*/


?>
<!DOCTYPE html>
<html>
<head>
    <link href="style/style1.css?t=<? echo time();?>" type="text/css"  rel="stylesheet"/>
</head>
<header >
	<h2>high-shpping</h2>
	<ul class="menu">
		<li><a href="accueil.php">ACCUEIL</a></li> 
		<li><a href="boutique.php">BOUTIQUE</a></li>
		<li><a href="panier.php">PANIER</a></li>
		<li><a href="inscrire.php">INSCRIPTION</a></li>
		<li><a href="connect.php">CONNEXION</a></li>
		<li><a href="connect.php">CONDITIONS DE VENTE</a></li>
	</ul>
</header>
<body></body>
 
</html>
