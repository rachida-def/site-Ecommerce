<?php 
session_start();
//cette fonction sert à démarer une session et à générer un identifiant de session unique pour l'utilisateur
if(! isset($_POST["envoi"])) $_POST["envoi"]=""; 
if(! isset($_SESSION['prixTotal'])) $_SESSION['prixTotal']=0; 
if(! isset($_SESSION['code'])) $_SESSION['code']=0;
if(! isset($_SESSION['article'])) $_SESSION['article']=""; 
if(! isset($_SESSION['prix'])) $_SESSION['prix']=0; 
//La fonction isset permet de déterminer si une variable est bien définie 
if($_POST["envoi"]=="ADD" && $_POST["code"]!="" && $_POST["article"]!="" && $_POST["prix"]!="") //vérifier si le submit cliqué est ADD 
{
    $code=$_POST["code"];               
    $article= $_POST["article"]; 
    $prix= $_POST["prix"];
    //on récupère la valeur de chaque input dans une varaible
    $_SESSION['code']= $_SESSION['code']."//".$code;
    $_SESSION['article']= $_SESSION['article']."//".$article; 
    $_SESSION['prix']= $_SESSION['prix']."//".$prix;
    /*La variable $_SESSION sert à sauvegarder les informations pour résoudre le problème posé par le protocole HTTP qui est un protocole sans état càd que à chaque fois une nouvelle valeur écrase l'ancienne valeur
    dans cette partie on va récupérer les valeurs dans un tableau associatif en les séparant par '//' */
 } 
 if($_POST["envoi"]=="CHECK") 
{ 
  echo "<table border=\"1\">";
  echo "<tr><td colspan=\"3\"><b>Récapitulatif de votre commande</b></td>";
  echo "<tr><th>&nbsp;code&nbsp;</th><th>&nbsp;article&nbsp;</ th><th>&nbsp; ?prix&nbsp;</th>";
  $total=0; 
  $tab_code=explode("//",$_SESSION['code']);    
  $tab_article=explode("//",$_SESSION['article']); 
  $tab_prix=explode("//",$_SESSION['prix']);
 for($i=1;$i<count($tab_code);$i++) 
 { echo "<tr><td>{$tab_code[$i]}</td><td>{$tab_article[$i]}</td><td> ?".sprintf("%01.2f", $tab_prix[$i])."</td>";
   $_SESSION['prixTotal']+=$tab_prix[$i];
 } 
  echo "<tr><td colspan=2> PRIX TOTAL </td><td>".sprintf("%01.2f", $_SESSION['prixTotal'])." ?</td>"; echo "</table>";
 }
 /*à chaque fois on clique sur check on obtient un tableau qui récupère les données ajoutées 
  La fonction explode permet de couper une chaine de caractère selon le séparateur utilisé dan notre cas "//"
 */

if($_POST["envoi"]=="SAVE"){
  try{

    $idfile=fopen("commande.txt",'w');
    $tab_code=explode("//",$_SESSION['code']);
    $tab_article=explode("//",$_SESSION['article']);
    $tab_prix=explode("//",$_SESSION['prix']); 
    for($i=0;$i<count($tab_code);$i++)
       fwrite($idfile, $tab_code[$i]." | ".$tab_article[$i]." | ".$tab_prix[$i].";\n");
    fclose($idfile); 
 }catch(Exception $e){
    die("erreur est survenue");
 }
} 
/*si on clique sur save les informations stockées dans les tableaux associatifs seront enregistrées dans un fichier "commande.txt"  
on utilise try=>catch pour gérer les exceptions
*/

 if($_POST["envoi"]=="LOGOUT") 
{ 
   session_unset(); 
   session_destroy(); 
   echo "<h3>La session est terminée</h3>";
}
/* le bouton logout permet de détruire la session par la fonction seeion_destroy()
La fonction session_unset permet de détruire toute les variables de la session courante
*/
 $_POST["envoi"]="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Gestion de panier</title>
<style type="text/css">
	input {
	width: 25%;
  padding: 12px 20px;
  margin:9px 15px;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
  position: relative;left:10px;
	}
	input[type=submit] {
  width: 15%;
  background-color: aqua;
  color: black;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
#panier {
	position: relative;left:200px;top:80px;
}
#saiser{
	position: relative;left:200px;
}
label {
	 	   font-variant: small-caps;
	 	   font-size: 120%;
}
legend {
	font-size: 120%;
}
fieldset{
  width:51%;
  padding:10px;
  margin:50px;
  border-radius: 6px;
}


</style>
</head>
<body>
	<div id="panier">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" ?enctype="application/x-www-form-urlencoded">
  <?php
  /* L'attribut action permet de préciser la page qui traite les données envoyées par le formulaire, dans notre cas c'est la page elle même
     L'attribut method montre la façon de transmission ,dans ce formulaire c'est POST qui fait la transmission d'une façon implicite
   */
  ?>
  <fieldset>
<legend ><b>Saisies d'articles</b></legend>
 <div id="saiser">
   <label>code :</label><br>
     <input type="text" name="code" /><br>
   <label>article :</label><br> 
     <input type="text" name="article" /><br>
   <label>prix :</label><br>
    <input type="text" name="prix" /><br><br>
</div>
          <input type="submit" name="envoi" value="ADD" />
          <input type="submit" name="envoi" value="CHECK" />
          <input type="submit" name="envoi" value="SAVE" />
          <input type="submit" name="envoi" value="LOGOUT" />
  </fieldset>
</form>
</div>
</body>
</html> 