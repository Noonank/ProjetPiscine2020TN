<?php
    session_start();
    //identifier le nom de base de données
    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
    $user="Admin";
    //connectez-vous dans votre BDD
    if(isset($_POST['formulaireadminconnect']))
    {        echo $_POST['Pseudo'];
          echo $_POST['MDP'];
        //si les champs du formulaire ne sont pas vides, et que le mail n'est pas rentré,  on ajoute à la BDD
        if(!empty($_POST['Pseudo']) AND !empty($_POST['MDP']))
        {
            //on récupère les données
            $Pseudo = ($_POST['Pseudo']);
            $MDP = ($_POST['MDP']);

            $connexionadmin = $database->prepare("SELECT * FROM identificationadmins WHERE email = ? AND MDP = ?");
            $connexionadmin->execute(array($Pseudo, $MDP));
            $adminconnecte = $connexionadmin->fetch();
            $adminconnecte_count = $connexionadmin->rowCount();
            echo $adminconnecte_count;

            //si le compte vendeur existe
            if($adminconnecte_count == 1)
            {        
                $_SESSION['Utilisateur'] = $user ; 

                $_SESSION['Nom'] = $adminconnecte['Nom'];
                $_SESSION['Pseudo'] = $adminconnecte['Pseudo'];
                $_SESSION['email'] = $adminconnecte['email'];
                $_SESSION['Avatar'] = $adminconnecte['Avatar'];
                $_SESSION['Photo_fond'] = $adminconnecte['Photo_fond'];
                
                header("Location: profil_admin.php");
            }
            else    
            {
                echo "La connexion au compte administrateur a échoué. Êtes-vous sûr d'avoir rentré correctement vos informations ou de posséder un compte ?";
            }            
        }
    }
  ?>
