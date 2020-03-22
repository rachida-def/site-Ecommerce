<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<FORM method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
	<fieldset>
<legend><b>Inscrire:</b></legend>
<table>
<tbody>
<tr>
<th>NOM : </th>
<td> <input type="text" name="name" /></td>
</tr>
<tr>
<th>PRENOM : </th>
<td><input type="text" name="prenom" /></td>
</tr>
<tr>
<th>LOGIN :</th>
<td><input type="text" name="log" /></td>
</tr>
<tr>
<th>PASSWORD :</th>
<td><input type="password" name="pass"</td>
</tr>
<tr>
	<td><input type="submit" name="envoi" value="s'inscrire"></td>
</tr>
</tbody>
</table>
</FORM>
</body>
</html>