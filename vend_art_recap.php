
<?php
session_start();


$database = new PDO('mysql:host=localhost; dbname=vendeursinscrits', 'root', '');
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
                            <a class="navbar-brand" href="profil.php">
                            <img src="Logo.png" alt="ebayECE" title="ebayece" height="50">
                            </a>    
                        </div>
                
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a class="nav-link" href="admin_login.php"title="Admin">Admin</a></li>
                            <li class="nav-item"><a class="nav-link" href="profil.php" title="Vendeur">Vendeur</a></li>
                            <li class="nav-item"><a class="nav-link" href="connexion_acheteur.php" title="Acheteur">Acheteur</a></li>
                            <li class="nav-item"><a class="nav-link" href="profil.php" title="Mon Compte">Mon compte</a></li>
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


            </header>

            <main class="page-content">
                <div id="contenu" class="container-fluid"> 
                    <div class="col-sm ">
                        <div class="container">

                        <div class="row">
                                        <div class="cover-back">
                                            <div class="cover-photo">
                                                <img src ="<?php echo $_SESSION['Photo_fond']; ?>"  
                                                            width= '100%' height= '250px' margin= '0 auto' background-color='#f5f5f5' position='relative' z-index='1'
                                                            background-size='cover' alt="Image de fond">
                                            </div>
                                        </div>
                                        <div class="body-contenu">
                                        <section class="text-center left-col user-info">
                                            <div class="profile-avatar">
                                                <div class="inner">
                                                    <img src ="<?php echo $_SESSION['Avatar']; ?>" 
                                                                width='200' height='200' margin='4' alt="Avatar">                                                    
                                                </div>
                                            </div>    
                                        
                                        <!-- Nav tabs -->
                                        <ul class="nav navbar-nav " role="tablist">
                                            <li class="nav-item">
                                                <a class=" text-center nav-link" href="profil_edition.php" >
                                                <i class="fa fa-key"></i> Editer Profil
                                                </a>
                                            </li>
                                        </ul><!--nav-tabs close-->
                                        <h1>Nom : <?php echo $_SESSION['Nom']; ?> </h1>
                                            <h2>Pseudo : <?php echo $_SESSION['Pseudo']; ?>  </h2>
                                            <h2>email : <?php echo $_SESSION['email']; ?></h2>                                     
                                    </section>

                                    <?php

try
{
  

   $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
   
   $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   $sql = "SELECT * From articles WHERE IDcategorie=$categorie";
$reponse = $database->query($sql);
   
   
   while ($data = $reponse->fetch())
   { ?>
                                    <section class="section content">
                                        <div class="container-fluid">
                                            <div class="middle-col">                                                                                     
        
                                                <div class="coupon-box-1">
                                                    <div class="card">
                                                        
                                                        <div class="carousel-wrapper">
                                                            <div class="carousel" data-flickity>
                                                            <div class="carousel-cell">
                                                                <h3>Image 1</h3>
                                                                <img src ="<?php echo $data['Photo']; ?>">
                                                            </div>
                                                            <div class="carousel-cell">
                                                                <h3>Image 2</h3>
                                                                <img src ="<?php echo $data['Photo2']; ?>">
                                                            </div>
                                                            <div class="carousel-cell">
                                                                <h3>Video</h3>
                                                                <img src ="<?php echo $data['Video']; ?>">
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
                                                                        <td><label for="email_vendeur">votre email vendeur:</label></td>
                                                                        <td><h4 id="email_vendeur"> </h4><?php echo $data['email_vendeur']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label for="num_id">Numero d'identification:</label></td>
                                                                        <td><h4 id="num_id"> </h4><?php echo $data['num_id']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label for="Nom">Nom de l'article:</label></td>
                                                                        <td><h4 id="Nom"> </h4><?php echo $data['Nom']; ?></td>
                                                                    </tr>  
                                                                    <tr>
                                                                    <td><label for="Description">Description:</label></td>
                                                                        <td><h4 id="Description"> </h4><?php echo $data['descript']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><label for="Prix">Prix:</label></td>
                                                                        <td><h4 id="Prix"><?php echo $data['Prix']; ?>€ </h4></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label class="control-label" for="cat">Categorie:</label></td>
                                                                        <td class="text-center">
                                                                            <label class="custom-control-label" for="access" name="IdCategorie" value=3>Accessoire VIP</label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label class="control-label" for="cat">Methode d'achat:</label></td>
                                                                        <td class="text-center">
                                                                        </td>

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

                                                <a href="profil.php" class="fin round-fin-btn-crea" title="">
                                                    <i class="fa fa-check"></i> Valider
                                                </a>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
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