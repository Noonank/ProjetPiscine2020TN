<?php
session_start();

    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
?>

<html>
    <head>
 

        <link rel="icon" href="Icon.ico">
        <title>Accueil</title>
        <meta charset="utf-8">
        
        <!-- >"width=device-width" définit la largeur de la fenêtre lors de l'ouverture à notre appareil (téléophone ou ordi). 
        "initial-scale=1" définit le niveau de zoom initial lors du premier chargement de la page par le navigateur.
        SOURCES : TP7 ECE Paris <-->

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        

        <link href="form-validation.css" rel="stylesheet">
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/javascript">
        
        $(document).ready(function(){
        $('.header').height($(window).height());
        });

        $(".navbar-header-2").hover(
        function() {
            $('.navbar-collapse-2').collapse('show');
        },
        function() {
            $('.navbar-collapse-2').collapse('hide');
        }
        );
        </script>
    </head>
    
    <body>
        <div class="page">
            <header class="page-header">
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
                                <li class="nav-item"><a class="nav-link" href="connexion_acheteur.php" title="Mon Compte">Mon compte</a></li>
                               
          
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
                      <li >
                          <a class="nav-link" href="categorie_VIP.php" title="VIP" >Accessoires VIP</a></li>
                  </ul>
              </div>
          </div>
                </nav>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner align-items-center" role="listbox">
                    <div class="item active">
                        <img src="musee.jpg" alt="Image">
                        <div class="carousel-caption">
                        <h3>Bon pour le musée !</h3>
                        <p>Trouvez l'oeuvre d'art à la hauteur de vos envies.</p>
                        </div>      
                    </div>

                    <div class="item">
                        <img src="acces_vip.jpg" alt="Image">
                        <div class="carousel-caption">
                        <h3>Accessoir VIP</h3>
                        <p>Un tapis rouge vous attend? trouvez des pieces de choix! </p>
                        </div>      
                    </div>

                    <div class="item">
                        <img src="tresor.jpg" alt="Image">
                        <div class="carousel-caption">
                        <h3>Ferraille ou Trésor</h3>
                        <p>Découvrez ou redécouvrez ces antiquités! </p>
                        </div>      
                    </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </header>



            <footer class="page-footer">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <h6 class="text-uppercase font-weight-bold">Informations additionnelles</h6>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <p>
                        37, quai de Grenelle, 75015 Paris, France (ou à domicile actuellement à cause du COVID-19<br />
                        noor.kardache@edu.ece.fr || tiffanie.jego-ragas@edu.ece.fr<br />
                        +33 06 93 03 04 05 <br/>
                        +33 06 92 02 05 04
                    </p>
                    </div>
                </div>

                <div class="footer-copyright text-center">
                    &copy; 2020 Copyright | Droit d'auteur: Noor&Tiffanie + nos précieuses sources
                </div>
            </footer>
        </div>
    </body>
</html>
