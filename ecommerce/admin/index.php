
<?php 
 session_start();
 ?>
 <?php
   $user='easylearn';
   $pass='123456789';
   if(isset($_POST['envoi'])){ 
//si les champs sont remplis
   	$username=$_POST['user'];
   	$passwd=$_POST['pass'];
   	if($username&&$passwd){
       if($username==$user&&$passwd==$pass){
           $_SESSION['user']=$username;
           header('Location:admin.php');
       }else{
       	 echo'id errones';
       }
   	}else{
   	
   	}
   }

?>
<div>
</div>
<form action="" method="POST">
	<h4>USERNAME:</h4><input type="text" name="user"></br>
	<h4>PASSWORD:</h4><input type="password" name="pass"></br>
	<h4>CONFIRM:</h4><input type="submit" name="envoi"></br>
</form>