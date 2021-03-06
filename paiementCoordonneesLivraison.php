<?php
session_start();
    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
?>

<html>

  <head>
    <link rel="icon" href="Icon.ico">
    <title>Paiement : coordonnées de livraison et confirmation</title>
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
          

        <div id="titre_page" class="container-fluid text-center"><h2>Paiement etape 2: Coordonnées de livraison.</h2></div>
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
                  <!-- nom/prenom/adresse input-->
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="nom">Nom:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nom" placeholder="Entrer votre nom">
                    </div>
                    <label class="control-label col-sm-2" for="Prenom">Prénom:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="prenom" placeholder value required>
                    </div>
                    <label class="control-label col-sm-2" for="email">e-mail:</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" placeholder="Entrer email">
                    </div>
                  </div>

                  <hr class="style1">
                  <div style=" border:1px solid #666;">
                    <!-- address input-->
                    <h3 class="text-center">Adresse</h3>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="adrl1">Adresse 1:</label>
                        <div class="col-sm-10">
                            <input id="address-line1" name="address-line1" type="text" placeholder="Nom de la rue, etc..."
                            class="form-control">
                        </div>
                        <label class="control-label col-sm-2" for="adrl2">Adresse 2:</label>
                        <div class="col-sm-10">
                            <input id="address-line2" name="address-line2" type="text" placeholder="(optionel)Appartement, etage, etc..."
                            class="form-control">
                        </div>
                        <br>
                        <label class="control-label col-sm-2" for="ville">Ville:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ville" placeholder="Ville">
                        </div>
                        <label class="control-label col-sm-2" for="code_postal">Code Postal:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="code_postal">
                        </div>
                        <label class="control-label col-sm-2" for="pays">Pays:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pays" >
                        </div>
                        <label class="control-label col-sm-3" for="c_num">Numéro de telephone du client:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="c_num" >
                        </div>
                    </div>
                  </div>
                  <!-- DEBUT BOUTON VALIDATION -->
                  <div class="text-right">
                      <br><button type="button" class="btn btn-default" data-toggle="modal" data-target="#e_mail">Je paye</button>
                  </div>
                  
                    <!-- FIN BOUTON VALIDATION -->

                  
                  <!--Modal email validation-->
                  <div id="e_mail" class="modal fade" role="dialog">
                      <div class="modal-dialog">                  
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body text-center">
                                  <h3>Un E-mail de confirmation vous à été envoyé.</h3>
                              </div>
                              <div class="modal-footer">
                               <button type="button" data-dismiss="modal" class="btn btn-default" >Confirmer et valider</button>
           
                              </div>
                          </div>
                      </div>
                  </div> 
                  <div class="text-right">
                      <br>  <a href="accueil.php"> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#e_mail">FINALISER COMMANDE</button> </a>
                  </div>       
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
