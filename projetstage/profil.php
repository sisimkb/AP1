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
    <li><a href="eleve.php">liste eleves</a></li>
    </ul> </html> <?php
  }
else
  {
    ?>
    <html>
    <ul class="nav">
    <li><a href="acceuil.php">Accueil</a></li>
    <li><a href="profil.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="ccr.php">Nouveau compte-rendu</a></li>
    </ul> </html> <?php
  }


    $datedeN = $_SESSION['datedeN'];
  $aujourdhui = date("Y-m-d");
  $diff = date_diff(date_create($dateN), date_create($aujourdhui));
            
  echo 'Votre age est '.$diff->format('%y');
 
;


 if($connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
      {
        $num=$_SESSION["num"];     
        $requete="SELECT * FROM utilisateur  WHERE utilisateur.num=$_SESSION[num]";
        //echo "$num---- $requete ---";
         $resultat = mysqli_query($connexion, $requete);
        while($donnees = mysqli_fetch_assoc($resultat)){
          $nom=$donnees['nom'];
          $prenom=$donnees['prenom'];
          $tel=$donnees['tel'];
          $login=$donnees['login'];
          $motdepasse=$donnees['motdepasse'];
          $type=$donnees['type'];
          $email=$donnees['email'];
          $datedeN=$donnees['datedeN'];






          echo "votre nom est: $nom<br>";
          echo "votre prenom est: $prenom<br>";
          echo "votre email est: $email<br>";
          echo "votre numero de telephone est: $tel<br>";
        }

       } 

?>

