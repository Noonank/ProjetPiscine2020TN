<?php 
session_start();

    $database = new PDO('mysql:host=localhost; dbname=vendeursinscrits', 'root', '');
    
   //header("Location: profil_edition.php?Nom=".$_SESSION['Nom']);
        
    if(isset($_GET['Pseudo']))
    {
        $Pseudo = htmlspecialchars($_GET['Pseudo']);
        $connexionvendeur = $database->prepare('SELECT * FROM identificationvendeurs WHERE Pseudo = ?');
        $connexionvendeur->execute(array($Pseudo));

        $infovendeur = $connexionvendeur->fetch();


        //var_dump($_FILES);

        if(!empty($_FILES))
        {
            $file_name = $_FILES['Avatar']['name'];
            $file_extension = strrchr($file_name, ".");
            $file_tmp_name = $_FILES['Avatar']['tmp_name'];
            $file_dest = 'Membres/'.$file_name;

            $extensions_autorisees = array('.png', '.PNG', '.jpg', '.JPG');

            if(in_array($file_extension, $extensions_autorisees))
            {
                if(move_uploaded_file($file_tmp_name, $file_dest ))
                {
                    $avatar_upd = $database->prepare('INSERT INTO identificationvendeurs(Avatar) VALUES(?)');
                    $avatar_upd->execute(array($file_name, $file_dest));   
                }
            }
            else
            {
                echo "Le format de l'avatar n'est pas le bon. Veuillez réessayer s'il vous plaît.";
            }
            
        }

    
    }
    else 
    {
        echo "ECHEC / N'ARRIVE PAS A PASSER DE PROFIL.PHP A PROFIL_EDITION.PHP EN GARDANT LES DONNEES";
    }
  

?>



<html>
    <head>
        <link rel="icon" href="Icon.ico">
        <title>Edit Profil Vendeur</title>
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
        <link rel="stylesheet" href="profil_edit.css">
        <link rel="stylesheet" href="profil.css">

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
                            <i class="fa fa-key"></i>
                            Editer votre profil.
                          </div>
                        <div class="col-sm ">
                            <div class="cart-wrap">
                                <div class="container">

                                    <div class="row">
                                        <div class="cover-back">
                                            <div class="cover-photo"></div>
                                        </div>
                                        <div class="body-contenu">
                                        <form method="POST" action="" enctype="multipart/form-data">
                                        <section class="text-center left-col user-info">
                                            <div class="profile-avatar">
                                            <div class="inner">
                                                <span class="file btn btn-lg btn-primary">
                                                    Changer Photo
                                                    <input type="file" name="Avatar">
                                                    </span>
                                                </div>
                                            </div>
                                            <!--
                                            <span class="btn btn-default btn-file">
                                                        Modifier fond <input type="file">
                                            </span> -->
                                            <h1>Nom : <?php echo $infovendeur['Nom']; ?> </h1>
                                            <h2>Pseudo : <?php echo $infovendeur['Pseudo']; ?></h2>
                                            <h2>email : <?php echo $infovendeur['email']; ?></h2><br>
                                            <!-- Nav tabs -->
                                            <ul class="nav navbar-nav " role="tablist">
                                                <li class=" text-center nav-item">
                                                    <a class="nav-link" ref="#change" role="tab" data-toggle="tab">
                                                    <input type="submit" value="Valider le profil">
                                                    <!-- <i class="fa fa-check"></i> Valider le Profil -->
                                                    </a>
                                                    <a class="nav-link" ref="#change" role="tab" data-toggle="tab">
                                                        <i class="fa fa-times"></i> Annuler
                                                    </a>
                                                    
                                                </li>
                                            </ul><!--nav-tabs close-->
                                        </section>
                                        </form>

                                        <section class="section content">
                                            <div class="container-fluid">
                                                <div class="middle-col">
                                                    <div * class="image-grid">
                                                        <div class="text-center"id="text">Contenu de votre page</div>
                                                        <div class="card">
                                                            <div class="position-relative">
                                                                <img class = "img-responsive"src="https://images.asos-media.com/products/nike-air-max-90-baskets-en-cuir-bleu-302519-400/9536548-1-blue?$n_640w$&wid=634&fit=constrain" class="card-img-top" alt="Nike - Air Max 90">
                                                                <div >
                                                                    <button type="button" class="btn rounded-circle" disabled = "disabled"data-toggle="button" aria-pressed="false" autocomplete="off">
                                                                        <i >Acceder à la page de l'article</i>
                                                                    </button>
                                                                    </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <h5 class="card-title"><small>Nike - Air Max 90 - Baskets en cuir - Bleu 302519-400</small></h5>
                                                                <p class="card-text"><strong class="text-danger">111,49 €</strong> <del>139,99 €</del></p>
                                                            </div>
                                                        </div>
                                        
                                                        <div class="card">
                                                            <div class="position-relative">
                                                                <img class = "img-responsive"src="https://images.asos-media.com/products/asos-white-baskets-en-daim-a-semelle-epaisse/10377589-1-multi?$n_640w$&wid=634&fit=constrain" class="card-img-top" alt="Baskets en daim à semelle épaisse">
                                                                <div class="card-img-overlay d-flex justify-content-end align-items-end">
                                                                    <button type="button" class="btn rounded-circle" disabled = "disabled" data-toggle="button" aria-pressed="false" autocomplete="off">
                                                                        <i >Acceder à la page de l'article</i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                            <h5 class="card-title">
                                                                <small>ASOS WHITE - Baskets en daim à semelle épaisse</small>
                                                            </h5>
                                                            <p class="card-text"><strong class="text-danger">53,49 €</strong>  <del>89,99 €</del></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class=" btn disabled fin round-fin-btn" title="">
                                                            <span class="fa fa-plus"></span>
                                                            <span class="fas fa-text">Finaliser achat</span>
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


<?php 

?>