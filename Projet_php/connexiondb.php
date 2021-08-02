<?php
    try{
        $pdo=new PDO("mysql:host=localhost;dbname=espacemembre",'root','');
    }
        catch(PDOException $e){
            echo $e->getMessage();
    }

                
?>