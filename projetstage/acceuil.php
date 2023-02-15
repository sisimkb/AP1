<?php
session_start(); 
?>
    <html>
    <head> <link href="style.css" media="all" rel="stylesheet" type="text/css"/> </head>
    <body>
   
<?php
include '_conf.php';

if (isset($_POST['send_con'])) //reçois données rentrée lors de la connexion
{
   
       $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $mdp= md5 ($mdp);

    $connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD);
    $requete="Select * from utilisateur WHERE login = '$login' AND motdepasse= '$mdp'"; //recupere données utilisateur 
    //echo "<br> ma req SQL : $requete <br>";
    $resultat = mysqli_query($connexion, $requete);
    $trouve=0;

    while($donnees = mysqli_fetch_assoc($resultat))
      {
   
        $trouve=1;
        $type=$donnees['type'];
        $login=$donnees['login'];
        $num=$donnees['num'];
     // echo "je créé mes sessions !!!";
        $_SESSION["num"]=$num; //relie variable avec session
        $_SESSION["login"]=$login;
        $_SESSION["type"]=$type;
        $_SESSION["datedeN"]=$datedeN;

    
      }

    if($trouve==0)
    {
        echo "erreur de connexion";
    }



}

if (isset($_SESSION["login"]))
 
    {
        if ($_SESSION["type"]==0)
       
        {
          ?>
         <ul class="nav">
        <li><a href="acceuil.php">Accueil</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="cr.php">Compte rendus</a></li>
        <li><a href="ccr.php">Nouveau compte-rendu</a></li>
        </ul>

 
            <?php
            echo "bienvenue sur le compte élève <br> <br>";
            echo "Vous êtes connecté en tant que ".$_SESSION["login"]."<br> <br>";
           echo "<FORM method='post' action='index.php'> <button type=submit name='deco'> DECONNEXION </button> </form>";
        }
        else
        {
?>
              <ul class="nav">
        <li><a href="acceuil.php">Accueil</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="cr.php">Compte rendus</a></li>
        <li><a href="eleve.php">liste eleves</a></li>
        </ul> </html
<?php
            
            echo "<br> <br>";

            echo "bienvenue sur le compte prof <br> <br>Vous êtes connecté en tant que ".$_SESSION["login"]."<br> <br>";

            echo "<FORM method='post' action='index.php'> <button type=submit name='deco'> DECONNEXION </button> </form>";
        }
    }

    





?>
</html>