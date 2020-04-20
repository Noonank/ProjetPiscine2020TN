<?php    
session_start();

    $database = new PDO('mysql:host=localhost; dbname=acheteursinscrits', 'root', '');
    //$database_items = new PDO('mysql:host=localhost; dbname=itemsenregistres', 'root', '');


    if(isset($_GET['Nom']))
    {
        $Nom = ($_GET['Nom']);
        $nom_acheteur = $database->prepare("SELECT * FROM identificaionacheteurs WHERE Nom = ?");
        $nom_acheteur->execute(array($Nom));
        $infoacheteur = $nom_acheteur->fetch();        
/*
        $database_items = new PDO('mysql:host=localhost; dbname=itemsenregistres', 'root', '');
        if(isset($_GET['Photo']))
        {
            $Photo = ($_GET['Photo']);
            $connexionitem = $database_items->prepare('SELECT * FROM identificationitems WHERE Photo = ?');
            $connexionitem->execute(array($Photo));
            $infoitem = $connexionitem->fetch();
    
            echo "recup photo ok";
        }
        else
        {
            echo "erreur recup photo";
        }*/

    }
     
?>



<html>

  <head>
    <link rel="icon" href="Icon.ico">
    <title> Ferraille ou Trésor</title>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="styles.css">
 
    <link href="form-validation.css" rel="stylesheet">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    
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
                  <a class="navbar-brand" href="accueil_acheteur.php?Nom=".$_SESSION['Nom']);>
                  <img src="Logo.png" alt="ebayECE" title="ebayece" height="50">
                  </a>    
              </div>
      
              <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a class="nav-link" href="connexion_admin.php" title="Admin">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="connexion_vendeur.php" title="Vendeur">Vendeur</a></li>
                    <li class="nav-item"><a class="nav-link" href="connexion_acheteur.php" title="Acheteur">Acheteur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" title="Mon Compte">Mon compte</a></li>
                     

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
                          <a class="nav-link" href="panier.php?Nom=".$_SESSION['Nom']);">
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
            <li class="active_onglet">
            <a class="nav-link" href="categorie_FER.php?Nom=".$_SESSION['Nom']); title="FER">Ferraille ou Trésor</a></li>                          
            <li ><a class="nav-link" href="categorie_MUS.php?Nom=".$_SESSION['Nom']); title="MUS">Bon pour le Musée</a></li>
            <li ><a class="nav-link" href="categorie_VIP.php?Nom=".$_SESSION['Nom']); title="VIP" >Accessoires VIP</a></li>
        </ul>
    </div>
</div>
</nav>
<!-- FIN BANNIERE EN HAUT -->
      </header>

      <main class="page-content">
        <div class="col-sm-2" ></div>
            <div class="col-sm-8 text-left">     
              <h1>Voici l'ensemble des articles présents sur le site</h1>

<?php

   $database_items = new PDO('mysql:host=localhost; dbname=itemsenregistres', 'root', '');
    if(isset($_GET['Photo']))
    {
        $Photo = ($_GET['Photo']);
        $connexionitem = $database_items->prepare('SELECT * FROM identificationitems WHERE Photo = ?');
        $connexionitem->execute(array($Photo));
        $infoitem = $connexionitem->fetch();  
    }
?>

            <!-- AFFICHAGE DES IMAGES : 3 IMAGES PAR LIGNE ET INFORMATION SUR LE NOM DU VENDEUR -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="carteborder text-center">
                    <div class="card_cat">
                        <a href="achatImmediat.php">
                     <!--   <img class="card-img-top" src ="<?php echo $infoitem['Photo']; ?>  alt="Image item"> -->
                        </a>
                    <div class="card-body">
                    <h4 class="card-title">                                            
                    <a href="#">Nom de l'article : <?php echo $infoitem['Nom']; ?></a>
                    </h4>
                    <h5>Prix de l'article : <?php echo $infoitem['Prix']; ?>€</h5>
                    <p class="card-text">Description de l'article </p>
                      
                    <button class="btn btn-primary-light" type="submit">Acheter</button>
                    <button class="btn btn-primary-light" type="submit">Panier</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DE L'AFFICHAGE DES IMAGES -->
    
    </div>
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