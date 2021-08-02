<?php
  // Vérifie qu'il provient d'un formulaire
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //identifiants mysql
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "espacemembre";
    
    $numcotis = $_POST["numcotis"];
    $date = $_POST["date"];
    $mois = $_POST["mois"];
    $motif = $_POST["motif"];
    $montant = $_POST["montant"];
    $matricule = $_POST["matricule"];

    
    if (!isset($numcotis)){
      die("S'il vous plaît entrez le numéro de cotisation");
    } 
    if (!isset($date)){
        die("S'il vous plaît entrez la date de cotisation");
      }  
    if (!isset($mois)){
    die("S'il vous plaît entrez le mois");
    }
    if (!isset($montant)){
    die("S'il vous plaît entrez le montant");
    }
    if (!isset($matricule)){
        die("S'il vous plaît entrez le matricule");
      }

    //Ouvrir une nouvelle connexion au serveur MySQL
    $mysqli = new mysqli($host, $username, $password, $database);
    
    //Afficher toute erreur de connexion
    if ($mysqli->connect_error) {
      die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }  
    
    //préparer la requête d'insertion SQL
    $statement = $mysqli->prepare("INSERT INTO cotisation (numcotis, datecotis, mois, motif, montant, matricule) VALUES(?, ?, ?, ?, ?, ?)"); 
    //Associer les valeurs et exécuter la requête d'insertion
    $statement->bind_param('ssssss', $numcotis, $date, $mois, $motif, $montant, $matricule); 
    
    if($statement->execute()){
      print "Bravo vous avez bien effectué la cotisation N°". $numcotis;
    }else{
      print $mysqli->error; 
    }
  }

    header('location:listecotisation.php');

?>