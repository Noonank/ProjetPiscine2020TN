<?php 
session_start();


    $database = new PDO('mysql:host=localhost; dbname=vendeursinscrits', 'root', '');

    if(isset($_POST['formulairevendeurconnect']))
    {        
        //si les champs du formulaire ne sont pas vides, et que le mail n'est pas rentré,  on ajoute à la BDD
        if(!empty($_POST['email']) AND !empty($_POST['MDP']))
        {
            //on récupère les données venant de notre fichier html
            $email = ($_POST['email']);
            $MDP = htmlspecialchars($_POST['MDP']);

            $connexionvendeur = $database->prepare("SELECT * FROM identificationvendeurs WHERE email = ? AND MDP = ?");
            $connexionvendeur->execute(array($email, $MDP));
            $vendeurconnecte = $connexionvendeur->rowCount();

            //si le compte vendeur existe
            if($vendeurconnecte == 1)
            {
                $infovendeur = $connexionvendeur->fetch();
                $_SESSION['Nom'] = $infovendeur['Nom'];
                $_SESSION['Pseudo'] = $infovendeur['Pseudo'];
                header("Location: profil.php?Nom=".$_SESSION['Nom']);
            }
            else
            {
                echo "La connexion au compte acheteur a échoué. Êtes-vous sûr d'avoir rentré correctement vos informations ou de posséder un compte ?";
            }            
        }
    }
?>



<html>
<head>
    <link rel="icon" href="Icon.ico">
    <title>Identification Vendeur</title>
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
            <nav id="nav_bar" class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button id="myNavbarbutton" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="file:///C:/Users/tiffa/Desktop/ProjetPiscine2020TN/CreaCompteVend.html#">
                        <img src="Logo.png" alt="ebayECE" title="ebayece" height="50">
                        </a>    
                    </div>
            
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a class="nav-link" href="#"title="Vendre">Vendre</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" title="Votre compte">Votre compte</a></li>
                            <li class="nav-item hidden-xs" >
                                <a class="nav-link" href="#">
                                    <span class="fa fa-bell" aria-hidden="true" title="Notification"></span>               
                                </a>
                            </li>           
                            <li class="nav-item hidden-xs">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-shopping-basket" aria-hidden="true" title="Panier"></i>       
                                </a>
                            </li> 
                            <li class="nav-item visible-xs" >
                                <a class="nav-link" href="#">
                                    <span class="fa fa-bell" aria-hidden="true" title="Notification"></span>               
                                    <span class="fas fa-text">Notification</span>
                                </a>
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
                
            <div id="titre_page" class="container-fluid"><h2>Vous vous apprêtez à vous identifier ou créer un compte en tant que vendeur de ebayEce.</h2></div>
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
                                <br><br>
                                <a href="C:\Users\tiffa\Desktop\ProjetPiscine2020TN\CreaCompteVend.html" class="custom_link">
                                    <h2>Créer compte vendeur ebayECE</h2>
                                </a>
                                                    
                            </div>

                            <div class="col-sm-6 v-divider"> 
                                <br>   
                                <form class="form-horizontal needs-validation" method="POST" action="">

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
                                        <input type="submit" name="formulairevendeurconnect" onclick="window.location.href = 'profil.php';" value="Valider">
                                    </div>
                                        <br>
                                    </div>
                                </form>                                      
                        </div>
                        <div class="row_2">
                            <a href="C:\Users\tiffa\Desktop\ProjetPiscine2020TN\ident_ach.html" class="custom_link_2">
                                <h4>Acheteur? veuillez cliquez-ici</h4>
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
                                    <button type="button" class="btn btn-default" >Admin</button>
                                </div>
                        
            
            <div class="footer-copyright text-center">
                &copy; 2020 Copyright | Droit d'auteur: Noor&Tiffanie + nos précieuses sources
            </div>
        </footer>
    </div>
    
</body>
</html>