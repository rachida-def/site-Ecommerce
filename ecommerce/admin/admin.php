<?php
session_start();

        try{
              $db=new PDO('mysql:host=localhost;dbname=site_ecommerce','root','');
              $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
              $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
   
              die('erreur est survenue');
        }
?>
<?php
if(isset($_SESSION['user'])){
	if(isset($_GET['action'])){
	 if($_GET['action']=='add'){
       if(isset($_POST['envoi'])){
                  // $id=$_POST['ident'];
                   $title=$_POST['title'];
                   $description=$_POST['desc'];
                   $price=$_POST['price'];
                  
             if($title&&$description&&$price){ 
                   $id='';
                  $sql = "INSERT INTO produits (id,titre,description,prix) VALUES(:id,:title,:description,:price)";
                  $datas = array(':id'=>$id,':title'=>$title, ':description'=>$description, ':price'=>$price);
                   
                 // $sql = "INSERT INTO produits (id,titre,description,prix)VALUES(:title,:description,:price)";
                 // $datas = array(':title'=>$title, ':description'=>$description, ':price'=>$price);                      
                    //execution de la requete
                 try{
                  $insert = $db->prepare($sql);
                  $insert->execute($datas );
                }catch(Exception $e){
                       //en cas de pb dans la requete :
                       echo "<br>Erreur dans la requête :" .$sql;
                       echo "<br>erreur : ".$e->getMessage();
                       echo "<br> Datas : <br>";
                        print_r($datas);
                 /* $insert=$db->prepare("INSERT INTO produits VALUES('','$title','$description','$price')"); 
                  $insert->execute();   */  
              }
             }else{
             	echo'remplir tous les champs';
             }
       }
?>		

<form action="" method="POST">
   <h3>titre du produit : </h3><input type="text" name="title"/>
   <h3>description du produit  : </h3><input type="text" name="desc"/>
   <h3>le prix du produit : </h3><input type="number" name="price"/>
   <h3>ajouter : </h3><input type="submit" name="envoi"/>

</form>
<?php

  }else if($_GET['action']=='modifyanddelete'){
    	$select=$db->prepare("SELECT * FROM produits");
    	$select->execute();

    	while($s=$select->fetch(PDO::FETCH_OBJ)){
    		echo $s->titre ,"<br/>";
        ?>
        <a href="?actionmodify&amp;id=<?php echo $s->id ?>">Modifier</a></br></a>
        <a href="?actiondelete&amp;id=<?php echo $s->id ?>">X</a>
       <?php 
    	}
      $select->closeCursor();

	}else if($_GET['action']=='modify'){
          $id=$_GET['id'];
          $select=$db->prepare("SELECT * FROM produits WHERE $id=id");
          $select->execute();
          $data=$select->fetch(PDO::FETCH_OBJ);

	}else if($_GET['action']=='delete'){
    $id=$_GET['id'];
    $delete=$db->prepare("DELETE FROM produits WHERE id->$id ");
    $delete->execute();

	}else{
		die('une erreur produite');
  }
	
  }else{

  }

}else{
	header('Location:../index.php');
}
?>

<link href="style/style1.css?t=<? echo time();?>" type="text/css"  rel="stylesheet"/>
<h3>welcome admin!</h3>
<a href="?action=add">AJOUTER UN PRODUITS</a>
<a href="?action=modifyanddelete">MODIFIER/SUPPRIMER UN PRODUITS</a>
