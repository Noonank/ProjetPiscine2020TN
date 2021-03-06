<?php
session_start();
    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
?>

<html>

  <head>
    <link rel="icon" href="Icon.ico">
    <title>Paiement</title>
    <meta charset="utf-8">
    
    <!-- >"width=device-width" définit la largeur de la fenêtre lors de l'ouverture à notre appareil (téléophone ou ordi). 
    "initial-scale=1" définit le niveau de zoom initial lors du premier chargement de la page par le navigateur.
    SOURCES : TP7 ECE Paris <-->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link href="form-validation.css" rel="stylesheet">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript">
    
    $(document).ready(function(){
    $('.header').height($(window).height());
    });
    </script>

  </head>

  <!-- DEBUT DU BODY -->
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
                  <a class="navbar-brand" href="accueil.php">
                  <img src="Logo.png" alt="ebayECE" title="ebayece" height="50">
                  </a>    
              </div>
      
              <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav navbar-right">
                  <li class="nav-item"><a class="nav-link" href="admin_login.php"title="Admin">Admin</a></li>
                      <li class="nav-item"><a class="nav-link" href="connexion_vendeur.php" title="Vendeur">Vendeur</a></li>
                      <li class="nav-item"><a class="nav-link" href="connexion_acheteur.php" title="Acheteur">Acheteur</a></li>
                      <li class="nav-item"><a class="nav-link" href="profil_acheteur.php" title="Mon Compte">Mon compte</a></li>
                     

                      <li class="nav-item  hidden-xs" >
                          <a class="nav-link" href="#" type="button" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                              <span class="fa fa-bell" aria-hidden="true" title="Notification"></span>               
                          </a>
                          <div class="dropdown-menu" id="pop-up-notif" aria-labelledby="dropdownMenuLink">
                              <p>Vous n'avez aucune notification</p>
                          </div>    

                      </li>           
                      <li class="nav-item hidden-xs">
                          <a class="nav-link" href="panier.php">
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
                          <a class="nav-link" href="panier.php">
                              <span class="fa fa-shopping-basket" aria-hidden="true" title="Panier"></span>       
                              <span class="fas fa-text">Panier</span>
                          </a>
                      </li>       
                  </ul>
              </div>
          </div>
        </nav>
          
<div id="titre_page" class="container-fluid text-center"><h2>Paiement etape 1: Coordonnées de paiement.</h2></div>
        <!-- FIN BANNIERE EN HAUT -->
      </header>
      
      <main class="page-content">
        <!-- DEBUT CADRE COORDONNEES -->
        
        <div id="contenu" class="container-fluid text-center">    
          <div class="row content">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8 text-left"> 
              <br>   
              <div class="container-fluid text-center">                   
                <form class="form-horizontal needs-validation" novalidate action="/action_page.php">
                  <br>
                  <div style=" border:1px solid #666;">
                  <!-- paiement-->
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
                    <label class="control-label col-sm-2" for="numc">Numero:</label>
                    <div class="col-sm-10">
                        <input id="numc" name="numc" type="number" placeholder="XXXX-XXXX-XXXX-XXXX"
                        class="form-control">
                    </div>
                    <label class="control-label col-sm-2" for="nomc">Nom:</label>
                    <div class="col-sm-10">
                        <input id="nomc" name="nomc" type="text" placeholder="Nom inscrit sur la carte"
                        class="form-control">
                    </div>
                    <label class="control-label col-sm-3" for="date_exp">date d'expiration:</label>
                    <div class="col-sm-9">
                        <input id="date_exp" name="date_exp" type="text" placeholder="jj/mm"
                        class="form-control">
                    </div>
                    <label class="control-label col-sm-2" for="ccc">Code:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="ccc" placeholder="CCC">
                    </div>
                  </div>  
                  </div>
                  <!-- DEBUT BOUTON VALIDATION -->
                  <div class="text-right">
                      <br><a type="button" class="btn btn-default" href="paiementCoordonneesLivraison.php">Je valide et je passe à l'étape 2</a>
                  </div>
                  <br>
                    <!-- FIN BOUTON VALIDATION -->                  
                </form>
              </div>
            </div>
          </div>
        </div>     
        <!-- FIN CADRE COORDONNEES -->
      </main>

      <!-- FOOTER DEBUT -->  
      <footer class="page-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
              <h6 class="text-uppercase font-weight-bold">Informations additionnelles</h6>
            </div>
        
            <div class="col-lg-4 col-md-4 col-sm-12">
              <h6 class="text-uppercase font-weight-bold">Contact</h6>
            </div>
          </div>
        </div>
          
        <div class="footer-copyright text-center">&copy; 2020 Copyright | Droit d'auteur: Noor&Tiffanie + nos précieuses sources</div>
      </footer>
      <!-- FOOTER FIN --> 
    </div>
  </body>

</html>
