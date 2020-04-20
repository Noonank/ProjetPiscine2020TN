<?php
//session_start();


$database = new PDO('mysql:host=localhost; dbname=vendeursinscrits', 'root', '');
$database_items = new PDO('mysql:host=localhost; dbname=itemsenregistres', 'root', '');



//déclaratio des variables pour récupérer la valeur des 2 pseudos
$recherchepseudo = $database->prepare("SELECT * FROM identificationvendeurs WHERE Pseudo = ? ");
$recherchepseudo->execute(array($Pseudo));
$pseudotrouve = $recherchepseudo->rowCount();

$recherchepseudo_vendeur = $database_items->prepare("SELECT * FROM identificationitems WHERE Pseudo_vendeur = ? ");
$recherchepseudo_vendeur->execute(array($Pseudo_vendeur));
$pseudo_vendeurtrouve = $recherchepseudo_vendeur->rowCount();                   

//si les pseudos comparés sont les mêmes 
if($pseudotrouve == $pseudo_vendeurtrouve)
{


if(isset($_GET['Pseudo']))
{
    $Pseudo = htmlspecialchars($_GET['Pseudo']);
    $connexionvendeur = $database->prepare('SELECT * FROM identificationvendeurs WHERE Pseudo = ?');
    $connexionvendeur->execute(array($Pseudo));

    $infovendeur = $connexionvendeur->fetch();

    $Photo = $_GET['Photo'];    
    $connexionitem = $database_items->prepare('SELECT * FROM identificationitems WHERE Photo = ?');
    $connexionitem->execute(array($Photo));
    $infoitem = $connexionitem->fetch();

    if(isset($_GET['Photo']))
    {

        echo "recuo photo ok";
    }
    else
    {
        echo "erreur recup photo";
    }
}
else
{
    echo "erreur recup pseudo";
}

?>






<html>
    <head>
        <link rel="icon" href="Icon.ico">
        <title>Info Article</title>
        <meta charset="utf-8">
        
        <!-- >"width=device-width" définit la largeur de la fenêtre lors de l'ouverture à notre appareil (téléophone ou ordi). 
        "initial-scale=1" définit le niveau de zoom initial lors du premier chargement de la page par le navigateur.
        SOURCES : TP7 ECE Paris <-->

        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
            <link href="form-validation.css" rel="stylesheet">
            <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="profil.css">

        <link rel="stylesheet" href="https://unpkg.com/flickity@2.0/dist/flickity.min.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>


        <script type="text/javascript">
        
        $(document).ready(function(){
        $('.header').height($(window).height());
        });
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
                            <a class="navbar-brand" href="profil.html">
                            <img src="Logo.png" alt="ebayECE" title="ebayece" height="50">
                            </a>    
                        </div>
                
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a class="nav-link" href="#"title="Admin">Admin</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" title="Vendeur">Vendeur</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" title="Acheteur">Acheteur</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" title="Mon Compte">Mon compte</a></li>
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


            </header>

            <main class="page-content">
                <div id="contenu" class="container-fluid"> 
                    <div class="col-sm ">
                        <div class="container">

                            <div class="row">
                                <div class="cover-back">
                                    <div class="cover-photo"></div>
                                </div>
                                <div class="body-contenu">
                                    <section class="text-center left-col user-info">
                                        <div class="profile-avatar">
                                        <div class="inner"></div>
                                        </div>
                                        
                                        <!-- Nav tabs -->
                                        <ul class="nav navbar-nav " role="tablist">
                                            <li class="nav-item">
                                                <a class=" text-center nav-link" href="file:///C:/Users/noork/Desktop/ProjetPiscine2020TN/profil-edition.html" >
                                                <i class="fa fa-key"></i> Editer Profil
                                                </a>
                                            </li>
                                        </ul><!--nav-tabs close-->
                                        <h1>Nom : <?php echo $infovendeur['Nom']; ?></h1>
                                        <h2>Pseudo : <?php echo $infovendeur['Pseudo']; ?></h2>                                       
                                    </section>
                                    <section class="section content">
                                        <div class="container-fluid">
                                            <div class="middle-col">                                                                                     
        
                                                <div class="coupon-box-1">
                                                    <div class="card">
                                                        
                                                        <div class="carousel-wrapper">
                                                            <div class="carousel" data-flickity>
                                                            <div class="carousel-cell">
                                                                <h3>Product 1</h3>
                                                                <a class="more" href="">Explore more</a>                                                                
                                                                <img src ="<?php echo $infoitem['Photo']; ?>">
                                                            </div>
                                                            <div class="carousel-cell">
                                                                <h3>Product 2</h3>
                                                                <a class="more" href="">Explore more</a>
                                                                <img src="https://images.unsplash.com/photo-1464305795204-6f5bbfc7fb81?dpr=2&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=" />
                                                            </div>
                                                            <div class="carousel-cell">
                                                                <h3>Product 3</h3>
                                                                <a class="more" href="">Explore more</a>
                                                                <img src="https://images.unsplash.com/photo-1464305795204-6f5bbfc7fb81?dpr=2&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=" />
                                                            </div>
                                                            </div>                                                          

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="right-col">
                                                        <div class="cart-totals">
                                                            <form action="#" method="get" accept-charset="utf-8">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><h3>Nom de l'article </h3></td>
                                                                            <td><input id="nom_art" name="nom_art" type="text"
                                                                                class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label class="control-label" for="numid">Numero d'identification:</label></td>
                                                                            <td><input id="numid" name="numid" type="number" 
                                                                                    class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label class="control-label" for="description">Description:</label></td>
                                                                            <td><textarea class="form-control" id="description" rows="3" placeholder="Qualité et Défault"></textarea></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label class="control-label" for="categorie">Catégorie:</label></td>
                                                                            <td><input id="categorie" name="categorie" type="text"
                                                                                class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label class="control-label" for="methode_achat">Méthode d'achat:</label></td>
                                                                            <td><input id="methode_achat" name="methode_achat" type="text"
                                                                                class="form-control"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><label class="control-label" for="prix">Prix:</label></td>
                                                                            <td><input type="number" class="form-control" id="prix" placeholder="220€"></td>
                                                                        </tr>               
                                                                    </tbody>
                                                                </table>
                                                            </form>
                                                            <!-- /form -->
                                                        </div>
                                                    
                                                    </div>
                                                
                                                </div>
                                                
                                                <!-- DEBUT BOUTON VALIDATION -->
                                                <div class="text-right">
                                                    <button type="button" class=" fin round-fin-btn-crea" data-toggle="modal" data-target="#sup"><i class="fa fa-times"></i> Supprimer</button>
                                                </div>
                                                <!-- FIN BOUTON VALIDATION -->
                                                
                                                <!--Modal suppression validation-->
                                                <div id="sup" class="modal fade" role="dialog" data-backdrop="false">
                                                    <div class="modal-dialog">                  
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" >×</button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <h3>Etes vous sure de vouloir supprimer cet article?</h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn btn-danger">Supprimer</button>
                                                                <button type="button" data-dismiss="modal" class="btn btn-default" data-dismiss="modal" >Annuler</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="#" class="fin round-fin-btn-crea" title="">
                                                    <i class="fa fa-check"></i> Valider
                                                </a>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


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

                <div class="footer-copyright text-center">
                    &copy; 2020 Copyright | Droit d'auteur: Noor&Tiffanie + nos précieuses sources
                </div>
            </footer>
        </div>
    </body>
</html>