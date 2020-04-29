<!DOCTYPE html>
<?php 
session_start();

    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
    
?>

<html>
<head>
    <link rel="icon" href="Icon.ico">
    <title>Profil Client</title>
    <meta charset="utf-8">

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
                            <li class="nav-item"><a class="nav-link" href="profil_acheteur.php" title="Acheteur">Acheteur</a></li>
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
                                <a class="nav-link dropdown-toggle"type="button" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                  <nav id="nav_bar_2"class="navbar navbar-expand-md" >
                <div class="container-fluid">
                  
                <div class="collapse navbar-collapse" id="navbar2">
                  <ul class="nav navbar-nav ">
                      <li>
                          <h class="navbar-brand">Catégorie</h>
                      </li>
                      <li >
                          <a class="nav-link" href="categorie_FER.php"title="FER">Ferraille ou Trésor</a></li>
                      <li ><a class="nav-link" href="categorie_MUS.php" title="MUS">Bon pour le Musée</a></li>
                      <li>
                        <a class="nav-link" href="categorie_VIP.php" title="VIP" >Accessoires VIP</a></li>
                  </ul>
                </div>
                </div>
              </nav>
            <!-- FIN BANNIERE EN HAUT -->
        </header>

        <main class="page-content">
            <div id="contenu" class="container-fluid text-center">    
                <div class="row content">
                    <div class="alert alert-info ">
                        <p>Votre profil.</p> </div>

                <div class="col-sm-2">
                </div>
                <div class="col-sm-8 text-left"> 
                    <br>   

                    <form class="form-horizontal " >
                        <!-- nom/prenom/adresse input-->
                        <div class="form-group">
                            <label class="col-lg-12">
                             Prénom: 
                            <?php echo $_SESSION['Prenom']; ?></label>
                            <label class="col-lg-12 ">
                             Nom: 
                            <?php echo $_SESSION['Nom']; ?></label>
                            <label class="col-lg-12">
                             E-mail: 
                            <?php echo $_SESSION['email']; ?></label>
                        </div>

                        <hr class="style1">

                        <!-- address input-->
                        <h3 class="text-center">Adresse</h3>
                        <div class="form-group">
                            <label class="col-lg-12">
                                Adresse 1: 
                                <?php echo $_SESSION['adress_line1']; ?></label>
                                <label class="col-lg-12 ">
                                Adresse 2: 
                                <?php echo $_SESSION['adress_line2']; ?></label>
                                <label class="col-lg-12">
                                Ville: 
                                <?php echo $_SESSION['Ville']; ?></label>
                                <label class="col-lg-12">
                                Code Postal: 
                                <?php echo $_SESSION['Code_Postal']; ?></label>
                                <label class="col-lg-12">
                                Pays: 
                                <?php echo $_SESSION['Pays']; ?></label>
                                <label class="col-lg-12">
                                Numéro de telephone du client: 
                                <?php echo $_SESSION['Num_Client']; ?></label>
                        </div>

                        <hr class="style1">
                            
                        <!-- paiement-->
                        <h3 class="text-center">Paiement</h3>
                        <div class="form-group">
                                <label class="col-lg-12">
                                Numero: 
                                <?php echo $_SESSION['Num_CB']; ?></label>
                                <label class="col-lg-12">
                                Nom: 
                                <?php echo $_SESSION['Nom_CB']; ?></label>
                                <label class="col-lg-12">
                        </div>  
                      
                    </form>
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
