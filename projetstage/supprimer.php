<?php
session_start();
?>

<html>
<head> <link href="style.css" media="all" rel="stylesheet" type="text/css"/> </head>
<body> </html>

<?php
include '_conf.php';
if ($_SESSION["type"] ==1) //si connexion en prof
  {
    ?>
    <html>
    <ul class="nav">
    <li><a href="acceuil.php">Accueil</a></li>
    <li><a href="profil.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="eleve.php">eleves</a></li>
    </ul> </html> <?php
  }
else
  {
    ?>
    <html>
    </html> 

    <?php
  }
  if($connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
      {

        $num=$_SESSION["num"];  
        $id=$_GET["id"];
        $requete="DELETE FROM utilisateur WHERE `utilisateur`.`num`='$id'";
        $resultat = mysqli_query($connexion, $requete);
; //affiche tout les eleves

//echo "<br> ma req SQL : $requete <br>";
      }  
  
echo "eleve bien supprimer"
    ?>






