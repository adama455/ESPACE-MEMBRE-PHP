<?php
  // Vérifie qu'il provient d'un formulaire
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //identifiants mysql
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "espacemembre";
    
    $matricule = $_POST["matricule"];
    $nom = $_POST["nom"]; 
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $tel = $_POST["tel"];

    if (!isset($matricule)){
      die("S'il vous plaît entrez le matricule");
    }
    if (!isset($nom)){
      die("S'il vous plaît entrez le nom du membre");
    } 
    if (!isset($prenom)){
        die("S'il vous plaît entrez le prénom du membre");
      }  
    if (!isset($adresse)){
    die("S'il vous plaît entrez le l'adresse du membre");
    }
    if (!isset($tel)){
    die("S'il vous plaît entrez le téléphone du membre");
    }

    //Ouvrir une nouvelle connexion au serveur MySQL
    $mysqli = new mysqli($host, $username, $password, $database);
    
    //Afficher toute erreur de connexion
    if ($mysqli->connect_error) {
      die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }  
    
    //préparer la requête d'insertion SQL
    $statement = $mysqli->prepare("INSERT INTO membre (matricule, nom, prenom, adresse, tel) VALUES(?, ?, ?, ?, ?)"); 
    //Associer les valeurs et exécuter la requête d'insertion
    $statement->bind_param('sssss', $matricule, $nom, $prenom, $adresse, $tel); 
    
    if($statement->execute()){
      print "Salut M." . $nom . "!, vous êtes le membre numéro ". $matricule;
    }else{
      print $mysqli->error; 
    }
  }

  header('location:listemembre.php');
?>