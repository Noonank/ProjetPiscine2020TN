<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="Icon.ico">
        <title>Panier</title>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        
        <link href="form-validation.css" rel="stylesheet">
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="panier.css" >
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
                      <li>
                          <a class="nav-link" href="categorie_FER.php"title="FER">Ferraille ou Trésor</a></li>
                      <li>
                          <a class="nav-link" href="categorie_MUS.php" title="MUS">Bon pour le Musée</a></li>
                      <li >
                          <a class="nav-link" href="categorie_VIP.php" title="VIP" >Accessoires VIP</a></li>
                  </ul>
              </div>
          </div>
            </nav>
                           <!-- FIN BANNIERE EN HAUT -->

            </header>
        
            <main class="page-content">
                <div id="contenu" class="container-fluid"> 
                    <div class="row content" >
                        <div  id=""class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a> 
                            <i class="fa fa-info"></i>
                            <a href="connexion_acheteur.php">Connectez_vous</a>
                        </div>
                        <div class="col-sm">
                            <div class="cart-wrap">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="main-heading">Votre Panier</div>
                                            <div class="table-cart">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Article</th>
                                                            <th>Quantité</th>
                                                            <th>Total</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="display-flex align-center">
                                                                    <div class="img-product">
                                                                        <img src="https://www.91-img.com/pictures/laptops/asus/asus-x552cl-sx019d-core-i3-3rd-gen-4-gb-500-gb-dos-1-gb-61721-large-1.jpg" alt="" class="mCS_img_loaded">
                                                                    </div>
                                                                    <div class="name-product">
                                                                        Apple iPad Mini
                                                                        <br>G2356
                                                                    </div>
                                                                    <div class="price">
                                                                        $1,250.00
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="product-count">
                                                                <form action="#" class="count-inlineflex">
                                                                    <div class="qtyminus">-</div>
                                                                    <input type="text" name="quantity" value="1" class="qty">
                                                                    <div class="qtyplus">+</div>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <div class="total">
                                                                    $6,250.00
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#" title="">
                                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="display-flex align-center">
                                                                    <div class="img-product">
                                                                        <img src="https://www.91-img.com/pictures/laptops/asus/asus-x552cl-sx019d-core-i3-3rd-gen-4-gb-500-gb-dos-1-gb-61721-large-1.jpg" alt="" class="mCS_img_loaded">
                                                                    </div>
                                                                    <div class="name-product">
                                                                        Apple iPad Mini
                                                                        <br>G2356
                                                                    </div>
                                                                    <div class="price">
                                                                        $1,250.00
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="product-count">
                                                                <form action="#" class="count-inlineflex">
                                                                    <div class="qtyminus">-</div>
                                                                    <input type="text" name="quantity" value="1" class="qty">
                                                                    <div class="qtyplus">+</div>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <div class="total">
                                                                    $6,250.00
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="#" title="">
                                                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="coupon-box">
                                                    <form action="#" method="get" accept-charset="utf-8">
                                                        <div class="coupon-input">
                                                            <input type="text" name="coupon code" placeholder="Coupon Code">
                                                            <button type="submit" class="round-btn">Activer le coupon</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.table-cart -->
                                        </div>
                                        <!-- /.col-lg-8 -->
                                        <div class="col-lg-4">
                                            <div class="cart-totals">
                                                <h3>Cart Totals</h3>
                                                <form action="#" method="get" accept-charset="utf-8">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td>Subtotal</td>
                                                                <td class="subtotal">$2,589.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tax (5%)</td>
                                                                <td class="val-tax" id="panier-tax">3.6</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Shipping</td>
                                                                <td class="free-shipping">Free Shipping</td>
                                                            </tr>
                                                            <tr class="total-row">
                                                                <td>Total</td>
                                                                <td class="price-total">$1,591.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="btn-cart-totals">
                                                        <a href="#" class="maj round-btn" title="">Mettre à jour le panier</a>
                                                        <a href="#" class="continue round-btn" title="">Poursuive son shopping</a>
                                                        <a href="#" class="fin round-fin-btn" title="">Finaliser achat</a>
                                                    </div>
                                                    <!-- /.btn-cart-totals -->
                                                </form>
                                                <!-- /form -->
                                            </div>
                                            <!-- /.cart-totals -->
                                        </div>
                                        <!-- /.col-lg-4 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </main>

            <!-- Footer -->
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