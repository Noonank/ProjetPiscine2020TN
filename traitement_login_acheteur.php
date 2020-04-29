<?php
    session_start();
    //identifier le nom de base de données
    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
   $user="Acheteur"; //connectez-vous dans votre BDD
    if(isset($_POST['formulaireacheteurconnect']))
    {        
        //si les champs du formulaire ne sont pas vides, et que le mail n'est pas rentré,  on ajoute à la BDD
        if(!empty($_POST['email']) AND !empty($_POST['MDP']))
        {
            //on récupère les données
            $email = ($_POST['email']);
            $MDP = ($_POST['MDP']);
            

            $connexionacheteur = $database->prepare("SELECT * FROM identificationacheteurs WHERE email = ? AND MDP = ?");
            $connexionacheteur->execute(array($email, $MDP));
            $acheteurconnecte = $connexionacheteur->fetch();

            $acheteurconnecte_count = $connexionacheteur->rowCount();
            $user="Acheteur";
            //si le compte vendeur existe
            if($acheteurconnecte_count == 1)
            {        
                $_SESSION['Utilisateur'] = $user ; 
                $_SESSION['Nom'] = $acheteurconnecte['Nom'];
                $_SESSION['Prenom'] = $acheteurconnecte['Prenom'];
                $_SESSION['email'] = $acheteurconnecte['email'];
                $_SESSION['MDP'] = $acheteurconnecte['MDP'];
                $_SESSION['adress_line1'] = $acheteurconnecte['adress_line1'];
                $_SESSION['adress_line2'] = $acheteurconnecte['adress_line2'];
                $_SESSION['Pays'] = $acheteurconnecte['Pays'];
                $_SESSION['Num_Client'] = $acheteurconnecte['Num_Client'];
                $_SESSION['Num_CB'] = $acheteurconnecte['Num_CB'];
                $_SESSION['Nom_CB'] = $acheteurconnecte['Nom_CB'];
                $_SESSION['Date_Exp'] = $acheteurconnecte['Date_Exp'];
                $_SESSION['ccc'] = $acheteurconnecte['ccc'];
                $_SESSION['Ville'] = $acheteurconnecte['Ville'];
                $_SESSION['Code_Postal'] = $acheteurconnecte['Code_Postal'];

                //echo $_SESSION['Pseudo'];
                header("Location: profil_acheteur.php");
            }
            else    
            {
                echo "La connexion au compte acheteur a échoué. Êtes-vous sûr d'avoir rentré correctement vos informations ou de posséder un compte ?";
            }            
        }
    }

  ?>
