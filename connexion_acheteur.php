<?php
session_start();


    $database = new PDO('mysql:host=localhost; dbname=acheteursinscrits', 'root', '');

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
            $acheteurconnecte = $connexionacheteur->rowCount();

            //si le compte vendeur existe
            if($acheteurconnecte == 1)
            {
                $infoacheteur = $connexionacheteur->fetch();
                $_SESSION['Nom'] = $infoacheteur['Nom'];
                $_SESSION['Prenom'] = $infoacheteur['Prenom'];
                $_SESSION['email'] = $infoacheteur['email'];
                header("Location: accueil_acheteur.php?Nom=".$_SESSION['Nom']);
            }
            else
            {
                echo "La connexion au compte vendeur a échoué. Êtes-vous sûr d'avoir rentré correctement vos informations ou de posséder un compte ?";
            }            
        }
    }
?>




<html>
<head>
    <link rel="icon" href="Icon.ico">
    <title>Identification Acheteur</title>
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
        <!-- DEBUT BANNIERE EN HAUT -->
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
                        <a class="navbar-brand" href="file:///C:/Users/noork/Desktop/ProjetPiscine2020TN/CreaCompteVend.html#">
                        <img src="Logo.png" alt="ebayECE" title="ebayece" height="50">
                        </a>    
                    </div>
            
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a class="nav-link" href="#"title="Vendre">Vendre</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" title="Votre compte">Votre compte</a></li>
                            <li class="nav-item  hidden-xs" >
                                <a class="nav-link" href="#" type="button" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                                    <span class="fa fa-bell" aria-hidden="true" title="Notification"></span>               
                                </a>
                                <div class="dropdown-menu" id="pop-up-notif" aria-labelledby="dropdownMenuLink">
                                    <p>Vous n'avez aucune notification</p>
                                </div>    
    
                            </li>           
                            <li class="nav-item hidden-xs">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-shopping-basket" aria-hidden="true" title="Panier"></i>       
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
                
            <div id="titre_page" class="container-fluid text-center"><h2>Vous vous apprêtez à vous identifier ou créer un compte en tant qu'acheteur de ebayEce.</h2></div>
            <!-- FIN BANNIERE EN HAUT -->
        </header>
        <!-- FIN BANNIERE EN HAUT -->

        <main class="page-content">
            <div id="contenu" class="container-fluid">    
                <div class="row content">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6 text-center"> 
                                <br><br><br><br>
                                <a href="C:\Users\tiffa\Desktop\ProjetPiscine2020TN\CreaCompteAcheteur.html" class="custom_link">
                                    <h2>Créer compte client ebayECE</h2>
                                </a>
                                                    
                            </div>

                            <div class="col-sm-6 v-divider"> 
                                <br>   
                                <form class="form-horizontal needs-validation" method="POST" action="">
                                    <br><br>
                                    <h2 class="text-center">Vous avez déjà un compte?</h2>
                                    <br>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="email">Email:</label>
                                        <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Entrer email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-4 " for="MDP">Mot de passe:</label>
                                        <div class="col-sm-7">
                                        <input type="password" class="form-control" id="MDP" placeholder value required name="MDP">
                                        </div>
                                        <br>
                                    </div>
                                    
                                    <div class="text-right">
                                        <input type="submit" name="formulaireacheteurconnect" onclick="window.location.href = 'C:/Users/tiffa/Desktop/ProjetPiscine2020TN/accueil.html';" value="Valider">
                                    </div>
                                        <br>
                                        <br><br>
                                    </div>                                    
                                </form>                                      
                            </div>
                        <div class="row_2">
                            <a href="C:\Users\noork\Desktop\ProjetPiscine2020TN\ident_vend.html" class="custom_link_2">
                                <h4>Vendeur? veuillez cliquez-ici</h4>
                            </a>
                        </div>
                    </div>
                    
                
                    <div class="col-sm-2">
                    </div>
                </div>
                
            </div>
        </main>

        <footer class="page-footer">
            <div class="text-right text">
                <a type="button" class="btn btn-default"href="file:///C:/Users/noork/Desktop/ProjetPiscine2020TN/admin.html" >Admin</a>
            </div>
                        
            
            <div class="footer-copyright text-center">
                &copy; 2020 Copyright | Droit d'auteur: Noor&Tiffanie + nos précieuses sources
            </div>
        </footer>
    </div>
    
</body>
</html>
    