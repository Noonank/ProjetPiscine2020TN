<?php
    $database = new PDO('mysql:host=localhost; dbname=acheteursinscrits', 'root', '');

    if(isset($_POST['formulaireacheteurconnect']))
    {
        //on récupère les données venant de notre fichier html
        $Prenom = $_POST['Prenom'];
        $Nom = $_POST['Nom'];
        $email = $_POST['email'];
        $MDP = $_POST['MDP'];
        $address_line1 = $_POST['address_line1'];
        $address_line2 = $_POST['address_line2'];
        $Ville = $_POST['Ville'];
        $Code_Postal = $_POST['Code_Postal'];
        $Pays = $_POST['Pays'];
        $Num_Client = $_POST['Num_Client'];
        $Num_CB = $_POST['Num_CB'];
        $Nom_CB = $_POST['Nom_CB'];
        $Date_Exp = $_POST['Date_Exp'];
        $ccc = $_POST['ccc'];

        //si les champs du formulaire ne sont pas vides, et que le mail n'est pas utilisé,  on ajoute les infos à la BDD
        if(!empty($Prenom) AND !empty($Nom) AND !empty($email) AND !empty($MDP) AND !empty($address_line1) AND
            !empty($Ville) AND !empty($Code_Postal) AND !empty($Pays) AND !empty($Num_Client) AND
            !empty($Num_CB) AND !empty($Nom_CB) AND !empty($Date_Exp) AND !empty($ccc))
        {
            $comparaisonmail = $database->prepare("SELECT * FROM identificationacheteurs WHERE email = ? ");
            $comparaisonmail->execute(array($email));
            $mailcompare = $comparaisonmail->rowCount();
            if($mailcompare == 0)
            {
                $nouvelacheteur = $database->prepare("INSERT INTO identificationacheteurs(Prenom, Nom, email, MDP, address_line1, address_line2, Ville,
                Code_Postal, Pays, Num_Client, Num_CB, Nom_CB, Date_Exp, ccc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $nouvelacheteur->execute(array($Prenom, $Nom, $email, $MDP, $address_line1, $address_line2, $Ville,
                $Code_Postal, $Pays, $Num_Client, $Num_CB, $Nom_CB, $Date_Exp, $ccc));
                echo "OK AJOUT";
            }  
            else
            {
                echo "Adresse mail déjà utilisé, êtes-vous sûr ne pas déjà avoir un compte acheteur ?";            
            }
        }
        else
        {
            echo "Veuillez remplir tous les champs ci dessus s'il vous plaît!";
        }
    }
?>

<html>
<head>
    <link rel="icon" href="Icon.ico">
    <title>Créer Compte Client</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
        <!-- DEBUT BANNIERE EN HAUT -->
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
  
            <div id="titre_page" class="container-fluid text-center"><h2>Création d'un compte acheteur.</h2></div>
            <!-- FIN BANNIERE EN HAUT -->
        </header>
        <!-- FIN BANNIERE EN HAUT -->

        <main class="page-content">
            <div id="contenu" class="container-fluid text-center">    
                <div class="row content">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-8 text-left"> 
                    <br>   

                    <form class="form-horizontal needs-validation"  method="POST" action="">
                        <!-- nom/prenom/adresse input-->
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Prenom">Prénom:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="Prenom" placeholder value required name="Prenom">
                            </div>
                            <label class="control-label col-sm-2" for="nom">Nom:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="Nom" placeholder="Entrer votre nom" name="Nom">
                            </div>                    
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Entrer email" name="email">
                            </div>
                            <label class="control-label col-sm-2" for="MDP">MDP:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="MDP" placeholder="Entrer votre mot de passe" name="MDP">
                            </div>
                        </div>

                        <hr class="style1">

                        <!-- address input-->
                        <h3 class="text-center">Adresse</h3>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="adrl1">Adresse 1:</label>
                            <div class="col-sm-10">
                                <input id="address_line1" type="text" placeholder="Nom de la rue, etc..." class="form-control" name="address_line1">
                            </div>
                            <label class="control-label col-sm-2" for="adrl2">Adresse 2:</label>
                            <div class="col-sm-10">
                                <input id="address_line2" type="text" placeholder="(optionel)Appartement, etage, etc..." class="form-control" name="address_line2">
                            </div>
                            <br>
                            <label class="control-label col-sm-2" for="ville">Ville:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ville" placeholder="Ville" name="Ville">
                            </div>
                            <label class="control-label col-sm-3" for="code_postal">Code Postal:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="Code_Postal" name="Code_Postal">
                            </div>
                            <label class="control-label col-sm-2" for="pays">Pays:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Pays" name="Pays" >
                            </div>
                            <label class="control-label col-sm-3" for="Num_Client">Numéro de telephone du client:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="Num_Client" name="Num_Client">
                            </div>
                        </div>

                        <hr class="style1">
                            
                        <!-- paiement-->
                        <h3 class="text-center">Paiement</h3>
                        <div class="form-group">
                            <div class="d-block my-3 text-center">
                                <div class="custom-control custom-radio">
                                    <label class="control-label" for="mdpa">Moyen de Paiement:</label>
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <label class="control-label col-sm-2" for="Num_CB">Numero:</label>
                            <div class="col-sm-10">
                                <input id="Num_CB" type="number" placeholder="XXXX-XXXX-XXXX-XXXX" class="form-control" name="Num_CB">
                            </div>
                            <label class="control-label col-sm-2" for="Nom_CB">Nom:</label>
                            <div class="col-sm-10">
                                <input id="Nom_CB" type="text" placeholder="Nom inscrit sur la carte" class="form-control" name="Nom_CB">
                            </div>
                            <label class="control-label col-sm-3" for="Date_Exp">date d'expiration:</label>
                            <div class="col-sm-9">
                                <input id="Date_Exp" type="text" placeholder="jj/mm" class="form-control" name="Date_Exp">
                            </div>
                            <label class="control-label col-sm-2" for="ccc">Code:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="ccc" placeholder="CCC" name="ccc">
                            </div>
                        </div>  
                      

                        <!-- Button d'appel au Modal -->
                        <div class="text-right">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Valider</button>
                        </div>

                        <!-- Modal clause client -->
                        <div class="modal fade" id="myModal" tabindex="-1">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Clause Client</h4>
                                        <p>Vous y êtes presque, veuillez accepter la clause client afin de finaliser la création de votre compte.</p>
                                    </div>
                                    <div class="modal-body">
                                        <h4>"Si le client fait une offre sur un article,
                                            il est sous contrat legal pour acheter l'article
                                            si le vendeur accepte l'offre."</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-toggle="modal"data-target="#e_mail" data-dismiss="modal">Accepter</button>
                                    </div>                                     
                                </div>
                            </div>
                        </div>

                        <!--Modal email validation-->
                        <div id="e_mail" class="modal fade" role="dialog">
                            <div class="modal-dialog">                  
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h3>Un E-mail de validation vous à été envoyé.</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <!--  <button type="button" data-dismiss="modal" class="btn btn-default">Terminer</button> -->
                                        <input type="submit" name="formulaireacheteurconnect" value="Terminer">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-left">
                            <input type="submit" onclick="window.location.href='connexion_acheteur.php';" value="Vous allez être redirigé vers la page d'accueil du site.">
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <footer class="page-footer">
            <div class="footer-copyright text-center">
                &copy; 2020 Copyright | Droit d'auteur: Noor&Tiffanie + nos précieuses sources
            </div>
        </footer>
    </div>
    
</body>
</html>