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
        $(document).ready(function() {
    document.getElementById('pro-image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
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
                            <a class="navbar-brand" href="accueil.php">
                            <img src="Logo.png" alt="ebayECE" title="ebayece" height="50">
                            </a>    
                        </div>
                
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a class="nav-link" href="profil_admin.php"title="Admin">Admin</a></li>
                                <li class="nav-item"><a class="nav-link" href="profil.php" title="Vendeur">Vendeur</a></li>
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
                                    <a class="nav-link" href="panier.html">
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
                                    <a class="nav-link" href="panier.html">
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
                              <a class="nav-link" href="categorie_FER.html"title="FER">Ferraille ou Trésor</a></li>
                          <li ><a class="nav-link" href="categorie_MUS.html" title="MUS">Bon pour le Musée</a></li>
                          <li>
                            <a class="nav-link" href="categorie_VIP.html" title="VIP" >Accessoires VIP</a></li>
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
                                                    <a class=" text-center nav-link" href="profil-edition.html" >
                                                    <i class="fa fa-key"></i> Editer Profile
                                                    </a>
                                                </li>
                                            </ul><!--nav-tabs close-->
                                            <h1>Tiffanie Jégo-Ragas</h1>
                                            <h2>pseudo: @tifflesangre</h2>
                                            <h2>email:tiffanie.jego-ragas@edu.ece.fr</h2>
                                        </section>
                                        <section class="section content">
                                            <div class="container-fluid">
                                                <div class="middle-col">
                                        
                                                         <!-- Categorie-->
                                                    <div class="form-group text-center">
                                                        <h3 class="text-center">Nouvel Article</h3>

                                                        <table class="table table-dark table-hover text-center">
                                    
                                                            <tbody>
                                                              <tr>
                                                                <td><label class="control-label" for="numid">Numero d'identification:</label></td>
                                                                <td><input id="numid" name="numid" type="number" 
                                                                        class="form-control"></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label class="control-label" for="nom_art">Nom:</label></td>
                                                                <td><input id="nom_art" name="nom_art" type="text"
                                                                    class="form-control"></td>                                                            
                                                              </tr>
                                                              <tr>
                                                                <td><a href="javascript:void(0)" onclick="$('#pro-image').click()">
                                                                <br><span class="fas fa-text">Ajouter Photos:</span> </a>
                                                            <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" multiple></td>
                                                                <td>
                                                                    <div class="preview-images-zone">
                                                                        <div class="preview-image preview-show-1">
                                                                            <div class="image-cancel" data-no="1">x</div>
                                                                            <div class="image-zone"><img id="pro-img-1" src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw=="></div>
                                                                            <div class="tools-edit-image"><a href="javascript:void(0)" data-no="1" class="btn btn-light btn-edit-image">edit</a></div>
                                                                        </div>
                                                                        <div class="preview-image preview-show-2">
                                                                            <div class="image-cancel" data-no="2">x</div>
                                                                            <div class="image-zone"><img id="pro-img-2" src="https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg"></div>
                                                                            <div class="tools-edit-image"><a href="javascript:void(0)" data-no="2" class="btn btn-light btn-edit-image">edit</a></div>
                                                                        </div>
                                                                        <div class="preview-image preview-show-3">
                                                                            <div class="image-cancel" data-no="3">x</div>
                                                                            <div class="image-zone"><img id="pro-img-3" src="http://i.stack.imgur.com/WCveg.jpg"></div>
                                                                            <div class="tools-edit-image"><a href="javascript:void(0)" data-no="3" class="btn btn-light btn-edit-image">edit</a></div>
                                                                        </div>
                                                                    </div>
                                                                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            
                                                                </td>                                                                
                                                              </tr>
                                                              <tr>
                                                                <td><label class="control-label" for="description">Description:</label></td>
                                                                <td><textarea class="form-control" id="description" rows="3" placeholder="Qualité et Défault"></textarea></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label class="control-label" for="prix">Prix:</label></td>
                                                                <td><input type="number" class="form-control" id="prix" placeholder="220€"></td>
                                                              </tr>
                                                              <tr>
                                                                <td><label class="control-label" >Categorie:</label></td>
                                                                <td class="text-center">
                                                                    <input id="ferraille"  type="radio" class="custom-control-input" >
                                                                    <label class="custom-control-label " for="ferraille">Ferraille ou Trésor</label>
                                                                    <input id="musee"  type="radio" class="custom-control-input" >
                                                                    <label class="custom-control-label " for="musee">Bon pour le Musée</label>
                                                                    <input id="vip" type="radio" class="custom-control-input" >
                                                                    <label class="custom-control-label" for="vip">Accessoire VIP</label>
                                                                </td>
                                                              </tr>
                                                            <tr id="video">
                                                                <td><label class="control-label" for="video">Video:</label></td></td>
                                                                <td>
                                                                  <span class="btn btn-default btn-file">
                                                                      Ajouter une video en mp4 <input type="file">
                                                                  </span>                                                                        
                                                                  <input type="text" class="form-control" placeholder="veuillez copier colller le lien de votre vidéo">
                                                               </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                            
                                                    </div>  
                                                   

                                                                                          
                                                    <a href="#" class="fin round-fin-btn-crea" title="">
                                                        <i class="fa fa-times"></i> Annuler
                                                    </a>
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
