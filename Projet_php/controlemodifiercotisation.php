<?php


require_once('connexiondb.php');


           if(isset($_POST['update'])){
               $idc=$_POST['idC'];
               $numcotis=$_POST['numcotis'];
               $date=$_POST['date'];
               $mois=$_POST['mois'];
               $motif=$_POST['motif'];
               $montant=$_POST['montant'];
               $matricule=$_POST['matricule'];
               
               $sql= "update cotisation set numcotis=?, datecotis=?, mois=?, motif=?, montant=?, matricule=? where id=?";
               $stmtinsert= $pdo->prepare($sql);
               $result= $stmtinsert->execute([$numcotis,$date,$mois,$motif,$montant,$matricule,$idc]);
           }
           
         
                     header('location:listecotisation.php');
       ?>
