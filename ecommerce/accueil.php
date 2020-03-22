<?php
session_start();
if($_SESSION['acces']!="oui")  
{
header("Location:pageindex.php");  	
}
else
{
echo "<h4>Bonjour ". $_SESSION['nom']."</h4>"; 
if( !isset($_SESSION['html']))  $_SESSION['html']=0;   
$_SESSION['html'] ++;  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>La page du (X)HTML.</title>
</head>
<body>
<h4> Accès réservé aux personnes autorisées</h4>
<p> Visiter les autres pages du site :
<?php echo "Page XHTML vue ". $_SESSION['html']. " fois"; ?>  
<ul>
<li><a href="pageindex.php">Page d'accueil </a> </li>
<li><a href="pagephp.php">Page PHP 5</a>
<? if(isset($_SESSION['php']))echo " vue ". $_SESSION['php']. " fois"; ?>  
</li>
</ul>
<h3>Contenu de la page XHTML</h3>
</body>
</html>