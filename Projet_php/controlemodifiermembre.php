<?php


require_once('connexiondb.php');


           if(isset($_POST['update'])){
               $idm=$_POST['idM'];
               $matricule=$_POST['matricule'];
               $nom=$_POST['nom'];
               $prenom=$_POST['prenom'];
               $adresse=$_POST['adresse'];
               $tel=$_POST['tel'];
               
               $sql= "update membre set matricule=?, nom=?, prenom=?, adresse=?, tel=? where id=?";
               $stmtinsert= $pdo->prepare($sql);
               $result= $stmtinsert->execute([$matricule,$nom,$prenom,$adresse,$tel,$idm]);
           }
           
         
                     header('location:listemembre.php');
       ?>
