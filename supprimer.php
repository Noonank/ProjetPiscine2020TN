<?php
session_start();

   try{
   

    $IDarticlesuppr= $_POST['IDarticlechoisi'];
    
    //identifier le nom de base de données
    $database = new PDO("mysql:host=localhost; dbname=projet", 'root', '');
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$sql= "DELETE FROM articles WHERE ID=$IDarticlesuppr" ;   
    echo $sql ; 
    $database->exec($sql);
   
   header("Location:profil.php");

   }
   catch (PDOException $e)
   {
        echo $sql . "<br>" . $e.getMessage();
   }

   $database = null ; 
    

  ?>
