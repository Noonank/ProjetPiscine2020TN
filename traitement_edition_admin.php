<?php         
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
                     $avatar_upd = $database->prepare('INSERT INTO identificationadmins(Avatar) VALUES(?)');
                     $avatar_upd->execute(array($file_name, $file_dest));   
                 }
             }
             else
             {
                 echo "Le format de l'avatar n'est pas le bon. Veuillez réessayer s'il vous plaît.";
             }
             
         }
         ?>
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

