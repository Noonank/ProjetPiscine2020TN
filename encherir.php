<?php
session_start();

   try{
   

    $enchere= $_POST['enchere'];
    $articlechoisi = $_POST['IDarticlechoisi'];
    //identifier le nom de base de données
    $database = new PDO("mysql:host=localhost; dbname=projet", 'root', '');
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$sql= "UPDATE articles set Prix= Prix + $enchere WHERE ID=$articlechoisi" ;   
    echo $sql ; 
    $database->exec($sql);
   
   header("Location:achatEnchere.php");

   }
   catch (PDOException $e)
   {
        echo $sql . "<br>" . $e.getMessage();
   }

   $database = null ; 
    

  ?>
