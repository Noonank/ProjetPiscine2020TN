<?php

   try{
    echo('tout v        z');
    $email_vendeur = $_POST["email_vendeur"];
    $num_id = $_POST['num_id'];
    $Nom = $_POST['Nom'];
   
    $Video = $_POST['Video'];
    $Description = $_POST['descript'];
    $Prix = $_POST['Prix'];
    $Categorie = $_POST["Idcategorie"];
    $Paiement = $_POST["Idpaiement"];
echo('tout v');

$profil_name = $_FILES['Photo']['name'];
$profil_type = $_FILES['Photo']['type'];
$profil_tmp_name = $_FILES['Photo']['tmp_name'];
$profil_error = $_FILES['Photo']['error'];
$profil_size = $_FILES['Photo']['size'];
$type=substr($profil_type, strpos($profil_type,'/')+strlen('/'));//récupère le format du fichier ex:'png'
$photo_ter='image/bdd/'.$num_id.'_Vendeur.'.$type;
move_uploaded_file($profil_tmp_name, $photo_ter);
echo('je suis la');

$profil_name = $_FILES['Photo2']['name'];
$profil_type = $_FILES['Photo2']['type'];
$profil_tmp_name = $_FILES['Photo2']['tmp_name'];
$profil_error = $_FILES['Photo2']['error'];
$profil_size = $_FILES['Photo2']['size'];
$type=substr($profil_type, strpos($profil_type,'/')+strlen('/'));//récupère le format du fichier ex:'png'
$photo_bis ='image/bdd/bis'.$Nom.'_Vendeur.'.$type;
move_uploaded_file($profil_tmp_name, $photo_bis);


    //identifier le nom de base de données
    $database = new PDO("mysql:host=localhost; dbname=projet", 'root', '');
    
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql="INSERT INTO articles(email_vendeur,num_id,Nom,Photo,Photo2,Video,descript,Prix,IDcategorie,IDpaiement) VALUES ('$email_vendeur','$num_id','$Nom','$photo_ter','$photo_bis','$Video','$Description','$Prix','$Categorie','$Paiement')";
    
    echo $sql ; 
    $database->exec($sql);
    echo 'on est laaaaa';
    echo $sql ; 
    echo ("ajout oklm");
    
   header("Location:profil.php");

   }
   catch (PDOException $e)
   {
        echo $sql . "<br>" . $e.getMessage();
   }

   $database = null ; 
    

  ?>
