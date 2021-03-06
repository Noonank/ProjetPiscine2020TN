
<!DOCTYPE html>
<html>

  <head>
    <?php session_start(); ?>
    <link rel="icon" href="Icon.ico">
    <title>Identification Administrateur</title>
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
                      <li class="nav-item"><a class="nav-link" href="profil_admin.php"title="Admin">Admin</a></li>
                      <li class="nav-item"><a class="nav-link" href="connexion_vendeur.php" title="Vendeur">Vendeur</a></li>
                      <li class="nav-item"><a class="nav-link" href="connexion_acheteur.php" title="Acheteur">Acheteur</a></li>
                      <li class="nav-item"><a class="nav-link" href="profil_admin.php" title="Mon Compte">Mon compte</a></li>
                     

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


        <div id="titre_page" class="container-fluid text-center"><h2>Vous vous apprêtez à vous identifier en tant qu'administrateur de ebayEce.</h2></div>
        <!-- FIN BANNIERE EN HAUT -->
      </header>

      <main class="page-content">
        <!-- DEBUT CADRE ADMIN -->
        <div class="container-fluid text-center">    
          <div class="row content">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8 text-left"> 
                <br>   
                <h1 class="text-center">Bonjour Administrateur ! <br/></h1>
                <h2>Veuillez vous identifier s'il vous plaît : <br/></h2>
      
                <form action="traitement_login_admin.php" method="POST">
                    <div class="form-group">
                      <label for="pseudo">Pseudo:</label>
                      <input type="pseudo" name="Pseudo" class="form-control" id="pseudo" placeholder="Votre pseudo">
                    </div>
                    <div class="form-group">
                      <label for="mdp_admin">mot de passe:</label>
                      <input type="password"name="MDP" class="form-control" id="mdp_admin" >
                    </div>
                    <div class="text-right">
                    <input type="submit" name="formulaireadminconnect"  value="Valider">
                    </div>
                </form>
                <br>                    
            </div>
            <div class="col-sm-2">
            </div>
          </div>
        </div>
        <!-- FIN CADRE ADMIN -->
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
