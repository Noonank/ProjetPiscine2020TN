<?php
session_start();
    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
?>

<html>
<head>
    <link rel="icon" href="Icon.ico">
    <title>Créer Compte Client</title>
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
                            <li class="nav-item"><a class="nav-link" href="admin_login.php"title="Admin">Admin</a></li>
                            <li class="nav-item"><a class="nav-link" href="connexion_vendeur.php" title="Vendeur">Vendeur</a></li>
                            <li class="nav-item"><a class="nav-link" href="connexion_acheteur.php" title="Acheteur">Acheteur</a></li>
                            <li class="nav-item"><a class="nav-link" href="connexion_vendeur.php" title="Mon Compte">Mon compte</a></li>
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
  
            <div id="titre_page" class="container-fluid text-center"><h2>Création d'un compte acheteur.</h2></div>
            <!-- FIN BANNIERE EN HAUT -->
        </header>

        <main class="page-content">
            <div id="contenu" class="container-fluid text-center">    
                <div class="row content">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8 text-left"> 
                    <br>   
                    <form class="form-horizontal needs-validation"  method="post" action="traitement_crea_ach.php">
                        <!-- nom/prenom/adresse input-->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Prenom">Prénom:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="Prenom" placeholder value required name="Prenom">
                            </div>
                            <label class="control-label col-sm-2" for="nom">Nom:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="Nom" placeholder="Entrer votre nom" name="Nom">
                            </div>                    
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Entrer email" name="email">
                            </div>
                            <label class="control-label col-sm-2" for="motdepasse">Mot de passe:</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" id="mdp" placeholder="Entrer mot de passe" name="MDP">
                            </div>
                        </div>

                        <hr class="style1">

                        <!-- address input-->
                        <h3 class="text-center">Adresse</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="adrl1">Adresse 1:</label>
                            <div class="col-sm-10">
                                <input id="address_line1" type="text" placeholder="Nom de la rue, etc..." class="form-control" name="adress_line1">
                            </div>
                            <label class="control-label col-sm-2" for="adrl2">Adresse 2:</label>
                            <div class="col-sm-10">
                                <input id="address_line2" type="text" placeholder="(optionel)Appartement, etage, etc..." class="form-control" name="adress_line2">
                            </div>
                            <br>
                            <label class="control-label col-sm-2" for="ville">Ville:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ville" placeholder="Ville" name="Ville">
                            </div>
                            <label class="control-label col-sm-3" for="code_postal">Code Postal:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="Code_Postal" name="Code_Postal">
                            </div>
                            <label class="control-label col-sm-2" for="pays">Pays:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Pays" name="Pays" >
                            </div>
                            <label class="control-label col-sm-3" for="Num_Client">Numéro de telephone du client:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="Num_Client" name="Num_Client">
                            </div>
                        </div>

                        <hr class="style1">
                            
                        <!-- paiement-->
                        <h3 class="text-center">Paiement</h3>
                        <div class="form-group">
                            <div class="d-block my-3 text-center">
                                <div class="custom-control custom-radio">
                                    <label class="control-label" for="mdpa">Moyen de Paiement:</label>
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <label class="control-label col-sm-2" for="Num_CB">Numero:</label>
                            <div class="col-sm-10">
                                <input id="Num_CB" type="number" placeholder="XXXX-XXXX-XXXX-XXXX" class="form-control" name="Num_CB">
                            </div>
                            <label class="control-label col-sm-2" for="Nom_CB">Nom:</label>
                            <div class="col-sm-10">
                                <input id="Nom_CB" type="text" placeholder="Nom inscrit sur la carte" class="form-control" name="Nom_CB">
                            </div>
                            <label class="control-label col-sm-3" for="Date_Exp">date d'expiration:</label>
                            <div class="col-sm-9">
                                <input id="Date_Exp" type="text" placeholder="jj/mm" class="form-control" name="Date_Exp">
                            </div>
                            <label class="control-label col-sm-2" for="ccc">Code:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="ccc" placeholder="CCC" name="ccc">
                            </div>
                        </div>  
                        <div class="text-right">
                            <input type="submit"  value="Valider">
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