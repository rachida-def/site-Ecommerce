<?php
session_start(); 
if(isset($_POST['login']) && isset($_POST['pass'])) 
  if($_POST['login']=="Ahmed" && $_POST['pass']=="1234")  
  {
    echo 'Bonjour ';
    echo  $_POST['login'] ; 
    $_SESSION['acces']="oui";  
    $_SESSION['nom']=$_POST['login'];  
  }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LES SESSIONS</title>
</head>
<body>

Visiter les pages du site <br />
<ul>
<li><a href="pagehtml.php">pagehtml </a> </li>
<li><a href="pagephp.php">pagephp</a>   </li>  
</ul>
</div>
</body>
</html>

