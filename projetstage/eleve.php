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
    </html> <?php
  }


   if($connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
      {    
         $num=$_SESSION["num"];     
        $requete="SELECT utilisateur.*, tuteur.nom as 'nomtuteur' , tuteur.tel as 'teltuteur' FROM utilisateur,tuteur  
        WHERE 'type'=0"; //affiche tout les eleves
        
        $resultat = mysqli_query($connexion, $requete);
        while($donnees = mysqli_fetch_assoc($resultat))
          {
            $num=$donnees ['num'];
            $nom=$donnees ['nom'];
            $prenom=$donnees ['prenom'];
            $nomt=$donnees ['nomtuteur'];
             $telt=$donnees ['teltuteur'];
            
            echo "<table border=2><thead> <tr> <th colspan=2> <u>n°$num</u> </th> </tr> </thead>
            <tbody> <tr> <td>  $nom</td>  </tr> 
            <tbody> <tr> <td>$prenom</td> </tr>
            <tbody> <tr><td> nom tuteur: $nomt </tr> 
            <tbody> <tr> <td> tel tuteur: $telt  </tr> 
          
             <tr> <td> <a href='supprimer.php?id=$num'>suprimer</a> </td> </tr> </tbody> </table> <br>";  //affiche tous les compte rendus du plus recent au plus ancien + lien pour modifier
          }
    }
  ?>