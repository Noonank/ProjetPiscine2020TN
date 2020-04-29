


<?php
  // $Pseudo = isset ($_POST["Prenom"])? $_POST["Prenom"] : ""; 
  // $Nom = isset ($_POST["Nom"])? $_POST["Nom"] : ""; 
   //$email = isset ($_POST["email"])? $_POST["email"] : ""; 
   //$MDP = isset ($_POST["MDP"])? $_POST["MDP"] : ""; 

   try{
    echo('tout v        z');
    $Prenom = $_POST['Prenom'];
    $Nom = $_POST['Nom'];
    $email = $_POST['email'];
    $MDP = $_POST['MDP'];
    $address_line1 = $_POST['adress_line1'];
    $address_line2 = $_POST['adress_line2'];
    $Ville = $_POST['Ville'];
    $Code_Postal = $_POST['Code_Postal'];
    $Pays = $_POST['Pays'];
    $Num_Client = $_POST['Num_Client'];
    $Num_CB = $_POST['Num_CB'];
    $Nom_CB = $_POST['Nom_CB'];
    $Date_Exp = $_POST['Date_Exp'];
    $ccc = $_POST['ccc'];

   echo('tout v');

    //identifier le nom de base de données
    $database = new PDO("mysql:host=localhost; dbname=projet", 'root', '');
    
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql="INSERT INTO identificationacheteurs(email,MDP,Prenom,Nom,adress_line1,adress_line2,Ville,Code_Postal,Pays,Num_Client,Num_CB,Nom_CB,Date_Exp,ccc) VALUES ('$email','$MDP','$Prenom','$Nom','$address_line1','$address_line2','$Ville','$Code_Postal','$Pays','$Num_Client','$Num_CB','$Nom_CB','$Date_Exp','$ccc')";
    
    echo $sql ; 
    $database->exec($sql);
    echo $sql ; 
    echo ("ajout oklm");
   header("Location: connexion_acheteur.php");

   }
   catch (PDOException $e)
   {
        echo $sql . "<br>" . $e.getMessage();
   }

   $database = null ; 
    

  ?>

