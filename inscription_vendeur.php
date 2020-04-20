<?php
session_start();
    $database = new PDO('mysql:host=localhost; dbname=vendeursinscrits', 'root', '');

    if(isset($_POST['formulairevendeurconnect']))
    {        
        //si les champs du formulaire ne sont pas vides, et que le mail n'est pas utilisé,  on ajoute les infos à la BDD
        if(!empty($_POST['email']) AND !empty($_POST['MDP']))
        {
            //on récupère les données venant de notre fichier html
            $email = $_POST['email'];
            $MDP = $_POST['MDP'];

            $comparaisonmail = $database->prepare("SELECT * FROM identificationvendeurs WHERE email = ? AND Pseudo = ?");
            $comparaisonmail->execute(array($email, $Pseudo));
            $mailcompare = $comparaisonmail->rowCount();
            if($mailcompare == 0)
            {
                $nouveauvendeur = $database->prepare("INSERT INTO identificationvendeurs(email, MDP) VALUES (?, ?)");
                $nouveauvendeur->execute(array($email, $MDP));
                echo "OK AJOUT";
            }  
            else
            {
                echo "Adresse mail déjà utilisé, êtes-vous sûr ne pas déjà avoir un compte vendeur?";            
            }
        }
    }
?>

<html>
<head>
    <link rel="icon" href="Icon.ico">
    <title>Creation compte vendeur</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript">

    $(document).ready(function(){
    $('.header').height($(window).height());
    });
    </script>
</head>

<body>
    <div class="page">
        <header class="page-header">
                    <!-- DEBUT BANNIERE EN HAUT -->
            <nav id="nav_bar" class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button id="myNavbarbutton" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="connexion_vendeur.php">
                        <img src="Logo.png" alt="ebayECE" title="ebayece" height="50">
                        </a>    
                    </div>
            
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a class="nav-link" href="#"title="Admin">Admin</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" title="Vendeur">Vendeur</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" title="Acheteur">Acheteur</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" title="Mon Compte">Mon compte</a></li>
                            <li class="nav-item  hidden-xs" >
                                <a class="nav-link" href="#" type="button" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                                    <span class="fa fa-bell" aria-hidden="true" title="Notification"></span>               
                                </a>
                                <div class="dropdown-menu" id="pop-up-notif" aria-labelledby="dropdownMenuLink">
                                    <p>Vous n'avez aucune notification</p>
                                </div>    
                            </li>           
                            <li class="nav-item hidden-xs disabled">
                                <a class="nav-link">
                                    <i class="fa fa-shopping-basket" aria-hidden="true" title="Panier" ></i>    
                                </a>
                            </li> 
                            <li class="nav-item visible-xs" >
                            <a class="nav-link dropdown-toggle" href="#" type="button" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fa fa-bell" aria-hidden="true" title="Notification"></span>               
                                    <span class="fas fa-text">Notification</span>
                                </a>
                                <div class="dropdown-menu-notif" aria-labelledby="dropdownMenuLink">
                                    <p>Vous n'avez aucune notification</p>
                                </div>    
                            </li>           
                            <li class="nav-item visible-xs">
                                <a class="nav-link" href="#">
                                    <span class="fa fa-shopping-basket" aria-hidden="true" title="Panier"></span>       
                                    <span class="fas fa-text">Panier</span>
                                </a>
                            </li>       
                        </ul>
                    </div>
                </div>
            </nav>
                
            <div id="titre_page" class="container-fluid text-center"><h2>Création d'un compte vendeur.</h2></div>
        <!-- FIN BANNIERE EN HAUT -->
        </header>

        <main class="page-content">
        <div class="container-fluid text-center">    
                <div class="row content">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8 text-left"> 
                                <br>   
                                <form class="form-horizontal needs-validation" novalidate action="/action_page.php">
                                    <br>
                                                            <!-- nom/prenom/adresse input-->
                                    <div class="form-group">
                                    <label class="control-label col-sm-2" for="Prenom">Prénom:</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prenom" placeholder value required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                    <label class="control-label col-sm-2" for="nom">Nom:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nom" placeholder="Entrer votre nom">
                                    </div>
                                </div>
                            <br>
                            <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Entrer email">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="photo">Ajouter une photo de profil:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="photo_profil">
                            </div>
                        </div>
                        <div class="text-right">
                        <a id="btn_valider" type="submit" class="btn btn-default btn-right" href="C:\Users\noork\Documents\noor\noor ing3\Projet">Valider</a>
                        </div>
                        </form>
                    <br>                    
                    </div>                
                    <div class="col-sm-2">
                    </div>
                </div>
                
            </div>
        </main>

        <footer class="page-footer">
            <div class="footer-copyright text-center">
                &copy; 2020 Copyright | Droit d'auteur: Noor&Tiffanie + nos précieuses sources
            </div>
        </footer>
    </div>
    
</body>
</html>