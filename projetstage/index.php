<?php
include '_conf.php';

?>

<?php
if ($bdd=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
{
//SI LA CONNEXION A REUSSI
echo ""; 
}
else//mais si elle rate
{
echo'erreur'; //on affiche un message d'erreur.
}
?>
<html>
<head>  <link href="style.css" media="all" rel="stylesheet" type="text/css"/> 
   
<title>  page de conexion </title>
</head>
<body>

<br>
<center>

<h2><p> page de conexion  </p></h2></center>

<br>

<FORM method="post" action="acceuil.php">
<br><p align=center> 
<input name="login" value="login">
<br>
<br>
<input type="password" name="mdp" value="mots de passe"> 
<br><br><a href="acceuil.php">     
<input type="submit" name="send_con" value="OK"> 
      </a>
<br><br>
<a href="oubli.php">      
     mdp oublié </a>
</FORM>














