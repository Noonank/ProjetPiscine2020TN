
<?php
  
   try{
  
  $Pseudo = $_POST["pseudo"];
  $Nom =  $_POST["Nom"] ; 
   $email = $_POST["email"] ; 
   $MDP = $_POST["MDP"] ; 
  
$profil_name = $_FILES['Avatar']['name'];
$profil_type = $_FILES['Avatar']['type'];
$profil_tmp_name = $_FILES['Avatar']['tmp_name'];
$profil_error = $_FILES['Avatar']['error'];
$profil_size = $_FILES['Avatar']['size'];
$type=substr($profil_type, strpos($profil_type,'/')+strlen('/'));//récupère le format du fichier ex:'png'
$photo_profil ='image/bdd/pp'.$Pseudo.'_Vendeur.'.$type;
move_uploaded_file($profil_tmp_name, $photo_profil);
echo('je suis la');

$profil_name = $_FILES['Fond']['name'];
$profil_type = $_FILES['Fond']['type'];
$profil_tmp_name = $_FILES['Fond']['tmp_name'];
$profil_error = $_FILES['Fond']['error'];
$profil_size = $_FILES['Fond']['size'];
$type=substr($profil_type, strpos($profil_type,'/')+strlen('/'));//récupère le format du fichier ex:'png'
$photo_fond='image/bdd/fond'.$Pseudo.'_Vendeur.'.$type;
move_uploaded_file($profil_tmp_name, $photo_fond);
echo('je suis la22222');
    //identifier le nom de base de données
    $database = new PDO("mysql:host=localhost; dbname=projet", 'root', '');
    
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql="INSERT INTO identificationvendeurs(email,MDP,Pseudo,Nom,Avatar,Photo_fond) VALUES ('$email','$MDP','$Nom', '$Pseudo', '$photo_profil','$photo_fond')";
    
    echo $sql ; 
    $database->exec($sql);
    echo $sql ; 
    echo ("ajout oklm");
   header("Location: connexion_vendeur.php");

   }
   catch (PDOException $e)
   {
        echo $sql . "<br>" . $e.getMessage();
   }

   $database = null ; 
    

  ?>
