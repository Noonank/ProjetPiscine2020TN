<?php
session_start();

    $database = new PDO('mysql:host=localhost; dbname=acheteursinscrits', 'root', '');

    if(isset($_GET['Nom']))
    {
        $Nom = ($_GET['Nom']);
        $nom_acheteur = $database->prepare("SELECT * FROM identificaionacheteurs WHERE Nom = ?");
        $nom_acheteur->execute(array($Nom));
        $infoacheteur = $nom_acheteur->fetch();
?>


<html>
    <head>
        <link rel="icon" href="Icon.ico">
        <title>Accueil</title>
        <meta charset="utf-8">
        
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

                <nav id="nav_bar_2"class="navbar navbar-expand-md">
                    <div class="container-fluid">
                        <div class="navbar-header-2">
                            <ul class="nav navbar-nav">
                                <li class="nav-item dropdown position-static">
                                    <a class="nav-link dropdown-toggle" href="#"title="Achat"type="button" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Achat</a>
                                    <div class="dropdown-menu mt-0 w-100 shadow border-outline-success" aria-labelledby="dropdownMenuLink">
                                        <a class="nav-link dropdown-item" href="#"title="Vendre">Vendre</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link dropdown-item" href="#" title="Votre compte">Votre compte</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown position-static">
                                    <a class="nav-link dropdown-toggle" href="#"title="Categorie"type="button" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</a>
                                    <div class="dropdown-menu  mt-0 w-100 shadow border-outline-success" aria-labelledby="dropdownMenuLink">
                                        <a class="nav-link dropdown-item" href="#"title="FoT">Ferraille ou Trésor</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link dropdown-item" href="#" title="Bplm">Bon pour le musée</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link dropdown-item" href="#" title="aVIP">Accessoir VIP</a>
                                    </div>    
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>


                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                    <div class="item">
                        <img src="accueil_fete_des_meres.jpg" alt="Photo promotionnelle acceuil (fête des mères)">
                        <div class="carousel-caption">
                        <h4>C'est bientôt la fête des Mères ! <br /> Un bijou fait toujours plaisir... La catégorie "Ferraille ou Trésor" devrait la ravir</h4>
                        <p>Avec le code RENDLER2020 obtenez -20% sur tout le site (non cumulable aux offres en cours)</p>
                    </div>      
                    </div>

                    <div class="item active">                        
                    <img src="accueil_journee_terre.png" alt="Photo promotionnelle acceuil (journee de la Terre)">
                        <div class="carousel-caption">
                            <h4>Le saviez-vous : le 22 Avril est la journée mondiale de la Terre
                            <br />C'est le moment de faire un geste pour notre planète et d'acheter de façon équitable et durable!
                            <br/ >Rendez-vous dans la section "Accessoires VIP" pour les plus beaux objets de seconde main ! </h4>
                            <p>Avec le code HINA2020 obtenez -40% sur tout le site (non cumulable aux offres en cours)</p>
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
            
            <main class="page-content">
                <div class="container text-center">    
                <h3>Découvrez les trois catégories d'items :</h3><br>
                <div class="row">
                    <div class="col-sm-4">
                        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                        <p>Ferraille ou Trésor</p>
                    </div>
                    <div class="col-sm-4"> 
                        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                        <p>Bon pour le Musée</p>
                    </div>
                    <div class="col-sm-4"> 
                        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                        <p>Accessoire VIP</p>
                    </div>
                </div>
                </div><br>
            </main>


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

<?php
    }

?>