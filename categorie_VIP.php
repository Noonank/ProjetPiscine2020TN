<?php    
session_start();

    $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
?>

<html>

  <head>
    <link rel="icon" href="Icon.ico">
    <title> Accessoire VIP </title>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="styles.css">
 
    <link href="form-validation.css" rel="stylesheet">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script type="text/javascript">
    
    $(document).ready(function(){
    $('.header').height($(window).height());
    });

    </script>
</head>

  <!-- DEBUT DU BODY -->
  <body>
    <div class="page">
      <header class="page-header">

        <!-- DEBUT BANNIERE EN HAUT -->
               <!-- DEBUT BANNIERE EN HAUT -->
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
                    <li class="nav-item-active">
                      <h8> <?php echo $Pseudo=$_SESSION['Pseudo']; ?> </h8>
                    <li class="nav-item">
                      <a class="nav-link" href="admin_login.php"
                      >Admin</a></li>
                    <li class="nav-item">
                      <a class="nav-link" href=
                      "connexion_vendeur.php"
                      >Vendeur</a></li>
                    <li class="nav-item">
                      <a class="nav-link" href=
                     "connexion_acheteur.php"             >Acheteur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" title="Mon Compte">Mon compte</a></li>
                     

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
            <a class="nav-link" href="categorie_FER.php" title="FER">Ferraille ou Trésor</a></li>                          
            <li ><a class="nav-link" href="categorie_MUS.php" title="MUS">Bon pour le Musée</a></li>
            <li class = "active_onglet" ><a class="nav-link" href="categorie_VIP.php" title="VIP" >Accessoires VIP</a></li>
        </ul>
    </div>
</div>
</nav>
<!-- FIN BANNIERE EN HAUT -->
      </header>

      <main class="page-content">
        <div class="col-sm-2" ></div>
            <div class="col-sm-8 text-left">     

<?php

try
{
  
   $categorie = 3;
   $database = new PDO('mysql:host=localhost; dbname=projet', 'root', '');
   
   $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   $sql = "SELECT * From articles WHERE IDcategorie=$categorie";
$reponse = $database->query($sql);
   
   
   while ($data = $reponse->fetch())
   { ?>

            <!-- AFFICHAGE DES IMAGES : 3 IMAGES PAR LIGNE ET INFORMATION SUR LE NOM DU VENDEUR -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="carteborder text-center">
                    <div class="card_cat">
                        
                     <img  src ="<?php echo $data['Photo'] ?>" > 
                        </a>
                    <div class="card-body">
                    <h4 class="card-title">                                            
                    <a href="#">Nom de l'article : <?php echo $data['Nom'] ?></a>
                    </h4>
                    <h5>Prix de l'article : <?php echo $data['Prix'] ?>€</h5>
                   
                           
                    <a href=
                    <?php 
                    $id=$data['ID'];
                    if ($data['IDpaiement']== 1)
                    {
                      { echo "achatImmediat.php?id=$id" ;}
                    }
                    if ($data['IDpaiement']==2)
                    {
                      { echo "achatEnchere.php?id=$id" ;}
                    }
                      ?> >
                    <button class="btn btn-primary-light" type="submit" 
                    >Acheter
                    </button>
                  </a>
                                    <button class="btn btn-primary-light" type="submit">Panier</button>
                    </div>
                    
                  </div>
        </div>
    </div>
    <!-- FIN DE L'AFFICHAGE DES IMAGES -->
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

     
    </div>
  </body>
</html>