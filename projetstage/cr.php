<?php
session_start();
?>        
<html>
<head> <link href="style.css" media="all" rel="stylesheet" type="text/css"/> </head>
<body>

<?php
include '_conf.php';
if (isset($_POST['update'])) //recupere données de ccr.php
      {
        $date=$_POST['date'];
        $contenu= addslashes($_POST['contenu']);
        $num=$_SESSION["num"];
        $note=$_POST['note'];
$connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD);
        $requete="INSERT INTO CR (date,datetime,description,note,num_utilisateur) VALUES ('$date',NOW(),'$contenu','$note','$num');"; //crée nouveau compte rendu avec infos recuperees
//echo "<br>$requete<hr>";
        if(!mysqli_query($connexion,$requete)) 
            {
            echo "erreur";
            }
        else //si possibilité de faire la requete :
            {
           echo "nouveau compte-rendu crée";
            }
        }

if ($_SESSION["type"] ==1) //si connexion en prof
  {
 ?>
  
    <ul class="nav">
    <li><a href="acceuil.php">Accueil</a></li>
    <li><a href="profil.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="eleve.php">liste eleves</a></li>
    </ul> <?php

  

       if($connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
      {
        $num=$_SESSION["num"];     
        $requete="SELECT * FROM CR 
        ORDER BY date DESC"; //recupere tous les comptes rendus par date decroissante
        
        $resultat = mysqli_query($connexion, $requete);
        while($donnees = mysqli_fetch_assoc($resultat))
          {
            $num=$donnees['num'];
            $contenu=$donnees['description'];
            $note=$donnees['note'];
            
            echo "<table border=2><thead> <tr> <th colspan=2> <u>n°$num</u> </th> </tr> </thead>
            <tbody> <tr> <td>  $contenu</td> </th> </tr> </thead>
            <tbody> <tr> <td>note journée: $note</td> </tr> </tbody> </table> <br>";  //affiche tous les compte rendus du plus recent au plus ancien + lien pour modifier
          }
    }


}
else //si connexion en eleve
  { 
    ?>
    
    <ul class="nav">
    <li><a href="acceuil.php">Accueil</a></li> 
    <li><a href="profil.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="ccr.php">Nouveau compte-rendu</a></li>
    </ul>  <?php

       if($connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
         {
        $num=$_SESSION["num"];     
        $requete="SELECT CR.* FROM CR,UTILISATEUR WHERE UTILISATEUR.num = CR.num_utilisateur AND UTILISATEUR.num=$_SESSION[num] ORDER BY date DESC"; //recupere tous les comptes rendus par date decroissante 
        
        $resultat = mysqli_query($connexion, $requete);
        while($donnees = mysqli_fetch_assoc($resultat))
          {
            $num=$donnees['num'];
            $contenu=$donnees['description'];
             $note=$donnees['note'];
            
             echo "<table border=2><thead> <tr> <th colspan=2> <u>n°$num</u> </th> </tr> </thead>
            <tbody> <tr> <td>  $contenu</td> </th> </tr> </thead>
            <tbody> <tr> <td>note journée: $note</td> </tr> <tr> <td> <a href='modif.php?id=$num'>Modifier</a> </td> </tr> </tbody> </table> <br>"; //affiche tous les compte rendus du plus recent au plus ancien + lien pour modifier
          }
    }

 
    }  
?>
