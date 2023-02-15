<?php
session_start();
?>
<html>
<head> <link href="style.css" media="all" rel="stylesheet" type="text/css"/> </head>

<ul class="nav">
  <li><a href="acceuil.php">Accueil</a></li>
  <li><a href="profil.php">Profil</a></li>
  <li><a href="cr.php">Compte rendus</a></li>
  <li><a href="ccr.php">Nouveau compte-rendu</a></li>

</ul>
 
<FORM method="post" action="cr.php"> 

<div> <font size=20 align="center"> Créer un compte rendu  </font> </div>
<br> 
<div> Date <input type="date" name="date" required> </div>
<div> Contenu <textarea name="contenu" rows=10 cols=40></textarea>
<br>

<P>note de la jounée :<INPUT type="radio" id=0 name="note" value=0 checked> NULL <INPUT type="radio"id=1 name="note" value=1 checked> 1<INPUT type="radio"id=2 name="note" value=2> 2 <INPUT type="radio" id=3 name="note" value=3 checked> 3 <INPUT type="radio" id=4 name="note" value=4 checked> 4 <INPUT type="radio"id=5 name="note" value=5 checked> 5
<div> <button type="submit" name="update"> Confirmer </button></FORM>

</html>

