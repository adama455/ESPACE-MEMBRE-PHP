<?php
    require_once('connexiondb.php');
    

            $idc=isset($_GET['idC'])?$_GET['idC']:0;
                    
                $requete="delete from cotisation where id=?";
                $params=array($idc);
                $result=$pdo->prepare($requete);
                $result->execute($params);
                
                    header('location:listecotisation.php');
          
                    
?>
