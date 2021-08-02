<?php
     //connection à la base de données
    require_once('connexiondb.php');
    
    //requête suppression d'un membre
            $idm=isset($_GET['idM'])?$_GET['idM']:0;
                    
                $requete="delete from membre where id=?";
                $params=array($idm);
                $result=$pdo->prepare($requete);
                $result->execute($params);

                 //redirection sur la liste des membres
                    header('location:listemembre.php');
          
                    
?>
