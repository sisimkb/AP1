
<?php
if (isset($_POST['email']))
{
     $lemail=$_POST['email'];
    // echo "le formulaire a été envoyé avec comme email la valeur :".$lemail;


    //étape 6
        
    include '_conf.php';

    if($bdd=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {
         

            $requete="Select * from UTILISATEUR WHERE email='$lemail'";
            $resultat = mysqli_query($bdd, $requete);
            $etat=0;
	            while($donnees = mysqli_fetch_assoc($resultat))
	            {
                    $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
              $shfl = str_shuffle($comb);
              $pwd = substr($shfl,0,8);
echo $pwd;    

//UPDATE 'utilisateur' SET 'motdepasse'=               

		            $login =$donnees['login']; //mettre le nom du champ dans la table
		            $mdp =$donnees['mdp'];	
                   
                    $etat=1;
	            }
            
            if ($etat==0)
            {
                echo "ERREUR l'email n'existe pas dans la BDD";

            }

            else
            {

                echo "L'email existe bien nous allons vous envoyer un email avec votre mot de passe";

                $texte="Bonjour, voici votre mot de passe = $mdp";
                $mdp=md5($mdp);
                //echo $texte;
                mail($lemail, 'sioreport : mot de passe oublié', $texte);
                $requete="UPDATE 'UTILISATEUR' SET 'motdepasse'=$mdp WHERE 'UTILISATEUR'.'login'= $login; ";
$resultat = mysqli_query($connexion, $requete);
            }




    }
    else
    {
        echo "erreur Connexion";
    }


}
else
{


}
?>

 <center>
<br><br><br><h1>
mot de passe oublié
</h1>


<br><br><br>
<br><br><br>

    <form method="POST" action="oubli.php">
    email : <input name="email">
    <br><input type="submit" value="Confirmer">
    </form>
</center>











