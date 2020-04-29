<?php
session_start();
    //identifier le nom de base de données
    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
    $user="Vendeur";
    //connectez-vous dans votre BDD
    if(isset($_POST['formulairevendeurconnect']))
        {        
        //si les champs du formulaire ne sont pas vides, et que le mail n'est pas rentré,  on ajoute à la BDD
        if(!empty($_POST['email']) AND !empty($_POST['MDP']))
        {
            //on récupère les données venant de notre fichier html
            $email = ($_POST['email']);
            $MDP = ($_POST['MDP']);
            $email = ($_POST['email']);
            $Avatar = ($_POST['Avatar']);
            $Photo_fond = ($_POST['Photo_fond']);

            $connexionvendeur = $database->prepare("SELECT * FROM identificationvendeurs WHERE email = ? AND MDP = ?");
            $connexionvendeur->execute(array($email, $MDP));
            $vendeurconnecte = $connexionvendeur->fetch();
            
            $vendeurconnecte_count = $connexionvendeur->rowCount();

            //si le compte vendeur existe
            if($vendeurconnecte_count == 1)
            {
                $_SESSION['Utilisateur'] = "Vendeur" ; 

                $_SESSION['Nom'] = $vendeurconnecte['Nom'];
                $_SESSION['Pseudo'] = $vendeurconnecte['Pseudo'];
                $_SESSION['email'] = $vendeurconnecte['email'];
                $_SESSION['Avatar'] = $vendeurconnecte['Avatar'];
                $_SESSION['Photo_fond'] = $vendeurconnecte['Photo_fond'];
                
                header("Location: profil.php");
            }
            else
            {
                echo "La connexion au compte vendeur a échoué. Êtes-vous sûr d'avoir rentré correctement vos informations ou de posséder un compte ?";
            }            
        }
    }
?>
