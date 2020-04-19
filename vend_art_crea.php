<?php
session_start();


    $database = new PDO('mysql:host=localhost; dbname=vendeursinscrits', 'root', '');
    $database_items = new PDO('mysql:host=localhost; dbname=itemsenregistres', 'root', '');

    
   // header("Location: vend_art_crea.php?Nom=".$_SESSION['Nom']);
    
        
    if(isset($_GET['Pseudo']))
    {
        $Pseudo = htmlspecialchars($_GET['Pseudo']);
        $connexionvendeur = $database->prepare('SELECT * FROM identificationvendeurs WHERE Pseudo = ?');
        $connexionvendeur->execute(array($Pseudo));

        $infovendeur = $connexionvendeur->fetch();


        if(isset($_POST['formulaireajoutitem']))
        {
            $Pseudo_vendeur = $_POST['Pseudo_vendeur'];
            $num_id = $_POST['num_id'];
            $Nom = $_POST['Nom'];
            $Photo = $_POST['Photo'];
            $Video = $_POST['Video'];
            $Description = $_POST['Description'];
            $Prix = $_POST['Prix'];
            $Categorie = $_POST['Categorie'];

            //si les champs du formulaire ne sont pas vides
            //pour l'instant photo et video peuvent être vides
            if(!empty($Pseudo_vendeur) AND !empty($num_id) AND !empty($Nom) AND  !empty($Description) AND !empty($Prix) AND !empty($Categorie))
            {
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
                    //image
                    if(!empty($_FILES))
                    {
                        $file_name = $_FILES['Photo']['name'];
                        $file_extension = strrchr($file_name, ".");
                        $file_tmp_name = $_FILES['Photo']['tmp_name'];
                        $file_dest = 'Items/'.$file_name;

                        $extensions_autorisees = array('.png', '.PNG', '.jpg', '.JPG');

                        if(in_array($file_extension, $extensions_autorisees))
                        {
                            if(move_uploaded_file($file_tmp_name, $file_dest ))
                            {
                                $nouvelitem = $database_items->prepare("INSERT INTO identificationitems(Pseudo_vendeur, num_id, Nom, Photo, Video, Description, Prix, Categorie)
                                                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                                $nouvelitem->execute(array($Pseudo_vendeur, $num_id, $Nom, $Photo, $Video, $Description, $Prix, $Categorie));
                                echo "OK AJOUT";
                            }
                        }
                    }                    
                }
                else
                {
                    echo "Pseudo vendeur non trouvé, êtes-vous sûr de l'avoir saisi correctement ?";            
                }
            }
            else
            {
                echo "Veuillez remplir tous les champs ci dessus s'il vous plaît!";
            }
        }        
    }
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
                                                    <a class=" text-center nav-link" href="file:///C:/Users/noork/Desktop/ProjetPiscine2020TN/profil-edition.html" >
                                                        <i class="fa fa-key"></i> Editer Profil
                                                    </a>
                                                </li>
                                            </ul><!--nav-tabs close-->
                                            <h1>Nom : <?php echo $infovendeur['Nom']; ?> </h1>
                                            <h2>Pseudo : <?php echo $infovendeur['Pseudo']; ?></h2>
                                            <h2>email : <?php echo $infovendeur['email']; ?></h2><br>
                                        </section>

                                        <section class="section content">
                                            <div class="container-fluid">
                                                <div class="middle-col">
                                        
                                                    <!-- Categorie-->
                                                    <form class="form-horizontal needs-validation"  method="POST" action="" enctype="multipart/form-data">
                                                    <div class="form-group text-center">
                                                        <h3 class="text-center">Nouvel Article</h3>
                                                        

                                                        <table class="table table-dark table-hover text-center">
                                                            <tbody>
                                                            <tr>
                                                                <td><label class="control-label" for="Pseudo_vendeur">Veuillez saisir votre pseudo vendeur:</label></td>
                                                                <td><input id="Pseudo_vendeur" type="text" class="form-control" name="Pseudo_vendeur" ></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="control-label" for="num_id">Numero d'identification:</label></td>
                                                                <td><input id="num_id" type="number" class="form-control" name="num_id" ></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="control-label" for="Nom">Nom:</label></td>
                                                                <td><input id="Nom" type="text" class="form-control" name="Nom"></td>                                                       
                                                            </tr>

                                                            
                                                            <tr>
                                                                <td><a href="javascript:void(0)" onclick="$('#Photo').click()">
                                                                <br><span class="file btn btn-lg btn-primary">Ajouter Photos:</span> </a>
                                                                    <input type="file" id="Photo" style="display: none;" class="form-control" name="Photo"></td>
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
                                                                <td><label class="control-label" for="Nom">Description:</label></td>
                                                                <td><input id="Description" type="text" class="form-control" name="Description" placeholder="Qualité et Défault"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="control-label" for="Prix">Prix:</label></td>
                                                                <td><input type="number" class="form-control" id="Prix" placeholder="220€" name="Prix"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="control-label" for="mdpa">Categorie:</label></td>
                                                                <td class="text-center"><input id="Categorie" name="Categorie" type="radio" class="custom-control-input" checked="" required="">
                                                                    <label class="custom-control-label " for="credit">Ferraille ou Trésor</label>
                                                                    <input id="credit" name="Categorie" type="radio" class="custom-control-input" checked="" required="">
                                                                    <label class="custom-control-label " for="credit">Bon pour le Musée</label>
                                                                    <input id="debit" name="Categorie" type="radio" class="custom-control-input" required="">
                                                                    <label class="custom-control-label" for="debit">Accessoire VIP</label></td>
                                                            </tr>
                                                            <tr id="video">
                                                                <td><label class="control-label" for="video">Video:</label></td></td>
                                                                <td>
                                                                  <span class="btn btn-default btn-file">
                                                                      Ajouter une video en mp4 <input type="file">
                                                                  </span>                                                                        
                                                                  <input type="text" class="form-control" placeholder="veuillez copier colller le lien de votre vidéo" name="Video">
                                                               </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                        <a href="#" class="fin round-fin-btn-crea" title="">
                                                            <i class="fa fa-times"></i> Annuler
                                                        </a>

                                                        <div class="modal-footer">
                                                            <input type="submit" name="formulaireajoutitem" value="Valider">
                                                        </div>
                                                    </div>
                                                    </form>                                                                                          
                                                   
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