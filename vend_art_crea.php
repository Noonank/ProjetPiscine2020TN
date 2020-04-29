<?php
session_start();

    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
?>

<html>
    <head>
        <link rel="icon" href="Icon.ico">
        <title>Nouvel Article</title>
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
        <link rel="stylesheet" href="vend_art.css">
        <link rel="stylesheet" href="profil.css">

        <link href="form-validation.css" rel="stylesheet">
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/javascript">
        
        $(document).ready(function(){
        $('.header').height($(window).height());
        });
        $(document).ready(function() 
        {
            document.getElementById('pro-image').addEventListener('change', readImage, false);
            
            $( ".preview-images-zone" ).sortable();
            
            $(document).on('click', '.image-cancel', function()
            {
                let no = $(this).data('no');
                $(".preview-image.preview-show-"+no).remove();
            });
        });

        var num = 4;
        function readImage() {
            if (window.File && window.FileList && window.FileReader) {
                var files = event.target.files; //FileList object
                var output = $(".preview-images-zone");

                for (let i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (!file.type.match('image')) continue;
                    
                    var picReader = new FileReader();
                    
                    picReader.addEventListener('load', function (event) {
                        var picFile = event.target;
                        var html =  '<div class="preview-image preview-show-' + num + '">' +
                                    '<div class="image-cancel" data-no="' + num + '">x</div>' +
                                    '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                                    '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                                    '</div>';

                        output.append(html);
                        num = num + 1;
                    });

                    picReader.readAsDataURL(file);
                }
                $("#pro-image").val('');
            } else {
                console.log('Browser not support');
            }
        }
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


            </header>

            <main class="page-content">
                <div id="contenu" class="container-fluid"> 
                    <div class="row content" >
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a>                            
                            Création d'un nouvel article.
                          </div>

                        <div class="col-sm ">
                            <div class="cart-wrap">
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
                                        <section class="section content">
                                            <div class="container-fluid">
                                                <div class="middle-col">
                                        
                                                    <!-- Categorie-->
                                                    <form class="form-horizontal needs-validation"  method="POST" action="traitement_vend_article_crea.php" enctype="multipart/form-data">
                                                    <div class="form-group text-center">
                                                        <h3 class="text-center">Nouvel Article</h3>
                                                        
                                                        <table class="table table-dark table-hover text-center">
                                                            <tbody>
                                                            <tr>
                                                                <td><label class="control-label" for="email_vendeur">Veuillez saisir votre email vendeur:</label></td>
                                                                <td><input type="text" class="form-control" id="email_vendeur" name="email_vendeur"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="control-label" for="num_id">Numero d'identification:</label></td>
                                                                <td><input type="text" id="num_id" type="number" class="form-control" name="num_id" ></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="control-label" for="Nom">Nom:</label></td>
                                                                <td><input id="Nom" type="text" class="form-control" name="Nom"></td>                                                       
                                                            </tr>  
                                                            <tr>
                                                                <td><label class="control-label" for="photo">Ajouter une photo</label>
                                                                <input type="file" class="form-control-file" id="photo_fond"  name="Photo">
                                                                <td>
    </tr>
    <tr>
                                                                <td><label class="control-label" for="photo2">Ajouter une deuxieme photo </label>
                                                                <input type="file" class="form-control-file" id="photo_fond"  name="Photo2">
                                                                <td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="control-label" for="Nom">Description:</label></td>
                                                                <td><input id="Description" type="text" class="form-control" name="descript" placeholder="Qualité et Défault"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="control-label" for="Prix">Prix:</label></td>
                                                                <td><input type="number" class="form-control" id="Prix" placeholder="220€" name="Prix"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="control-label" for="cat">Categorie:</label></td>
                                                                <td class="text-center">Tapez 1 pour Ferrailles, tapez 2 pour Bon pour le musée, tapez 3 pour Accessoires VIP 
                                                                <td><input type="number" class="form-control" id="Categorie" placeholder="0" name="Idcategorie"></td>
                                                                </td>
                                                            </tr>
                                                            <tr id="video">
                                                                <td><label class="control-label" for="video">Video:</label></td></td>
                                                                <td>
                                                                  <input type="text" class="form-control" placeholder="veuillez copier coller le lien de votre vidéo" name="Video">
                                                               </td>
                                                            </tr>
                                                            <tr>
  
                                                                <td><label class="control-label" for="cat">Methodes de paiement:</label></td>
                                                                <td class="text-center">Tapez 1 pour Achat Immediat, tapez 2 pour Enchere, tapez 3 pour Meilleur Offre
                                                                <td><input type="number" class="form-control" id="Paiement" placeholder="0" name="Idpaiement"></td>
                                                                </td>
                                                            </tr>
                                                            </tr>
                                                            </body>
                                                        </table>

                                                        
                                                        <div class="fin round-fin-btn-crea">
                                                            <i class="fa fa-check"></i> 
                                                            <input type="submit" value="Valider">
                                                        </div>
                                                    </div>
                                                    </form> 
                                                    <div class="fin round-fin-btn-crea">
                                                            <i class="fa fa-times"></i>
                                                          <a href="profil.php">  <input type="submit" value="Annuler"></a>
                                                        </div>                                                                                         
                                                </div>
                                            </div>
                                        </section>
                                    </div>
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


<?php

?>