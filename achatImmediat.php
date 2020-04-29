<?php 
session_start()
?>

<html>
    <head>
        <link rel="icon" href="Icon.ico">
    <title>Article Achat Immediat</title>
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

        <link rel="stylesheet" href="achatE.css">
        <link rel="stylesheet" type="text/css" href="styles.css">

        <link rel="stylesheet" href="https://unpkg.com/flickity@2.0/dist/flickity.min.css">
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
            </header>

            <main class="page-content">
                <div id="contenu" class="container-fluid"> 
                    <div class=" row  content " >
                        <div class="alert alert-info">
                            Catégorie : Achat Immédiat
                        </div>
<?php 
        try
        {
          

$id_article= $_GET['id'];// Si l'id est précisé dans l'URL…

       
           
        $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "SELECT * From articles WHERE ID=$id_article";
     
           $reponse = $database->query($sql);
           
           
           while ($data = $reponse->fetch())
           { ?>               
                        <div class="col-sm ">
                            <div class="container">

                                <div class="row ">
                                    <div class="body-contenu">
                                        <section class="section content">
                                            <div class="container-fluid">
                                                <div class="left-col">
                                                    <div class="card">
                                                            
                                                        <div class="carousel-wrapper">
                                                            <div class="carousel" data-flickity>
                                                                <div class="carousel-cell">
                                                                    <h3>Produit 1</h3>
                                                                   
                                                                    <img src="<?php echo $data['Photo'] ?>"/>
                                                                </div>
                                                                <div class="carousel-cell">
                                                                    <h3>Produit 2</h3>
                                                                    <a class="more" href="">Explore more</a>
                                                                    <img src="<?php echo $data['Photo2'] ?>"/>
                                                                </div>
                                                                
                                                                <div class="carousel-cell ">
                                                                    <h3>Video presentation</h3>
                                                                    <a class="more" href="">Explore more</a>

                                                                    <video class="video-fluid" autoplay loop muted>
                                                                        <source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
                                                                    </video>         
                                                                        </div>
                                                            </div>                                                          

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="middle-col">                                                                                     
            
                                                        
                                                    <div class="cart-totals-1">
                                                        <form action="#" method="get" accept-charset="utf-8">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><h5>Nom de l'article </h5></td>
                                                                        <td align='right' ><?php echo $data['Nom'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label class="control-label" for="numid"><h6>Numero d'identification</h6> </label></td>
                                                                        <td align='right'> <?php echo $data['num_id'] ?>
                                                                                </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label class="control-label" for="description"><h6>Description</h6> </label></td>
                                                                        <td align='right'><?php echo $data['descript'] ?></textarea></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label class="control-label" for="categorie"><h6>Catégorie</h6></label></td>
                                                                        <td align='right'><?php echo $data['IDcategorie'] ?>
                                                                            </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label class="control-label" for="methode_achat"><h6>Méthode d'achat</h6></label></td>
                                                                        <td align='right'><?php echo $data['IDpaiement'] ?>
                                                                            </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label class="control-label" for="categorie"><h6>Prix</h6></label></td>
                                                                        <td align='right'><?php echo $data['Prix'] ?>
                                                                            </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                        <!-- /form -->
                                                    </div>
                                                  <?php
           }
        }
        catch  (PDOException $e)
        {
             echo $sql . "<br>" . $e.getMessage();
        }
      
        $database = null ; 
          
      
        ?>      
                                                    
                                                    
                                                </div>
                                                <div class="right-col">
                                                    <div class="cart-totals-1">
                                                        <br><br>
                                                        <h3>Achat</h3>
                                                      
                                                        
                                                        <a href="paiement.php" class="fin round-fin-btn-achat-imm" title="">
                                                            <i class="fa fa-check"></i> Acheter
                                                        </a>
    
                                                        <a href="#" class="fin round-fin-btn-achat-imm title="">
                                                            <i class="fa fa-shopping-basket"></i> Ajouter au panier
                                                        </a>
                                                    

                                                    </div>
                                                    <!-- /form -->
                                                
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
