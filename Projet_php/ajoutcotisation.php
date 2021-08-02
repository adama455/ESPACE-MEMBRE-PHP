<?php
require_once('connexiondb.php');
    $idm=isset($_GET['idM'])?$_GET['idM']:"0";
    $requete="select * from membre where id=$idm";
    $result=$pdo->query($requete);
    $membre=$result->fetch();
    $matricule=$membre['matricule'];        
    $nom=$membre['nom'];
    $prenom=$membre['prenom'];
    $adresse=$membre['adresse'];
    $tel=$membre['tel'];    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Feuille de style -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
    
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
    rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <title>SaisieCotisation</title>
</head>
<body style="background-color: rgb(221, 220, 220);">


   <div class="container col-sm-7 mt-5">
   <form method="post" action="controlcotisation.php" class="form-control">
   <br><h2 class="text-center">COTISATION</h2><br>
   
   <label for="matricule"><b>Identifiant : <?php echo $idm?></b></label><br>
   <label for="matricule"><b><?php echo $prenom?>&nbsp;<?php echo $nom?></b></label><br>
   <label for="matricule"><b>Matricule : <?php echo $matricule?></b></label>
    <br><br>
   
        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">N° Cotisation</label>
        <div class="col-sm-10 ">
        <input type="text" class="form-control" name="numcotis">
        </div>
        </div>
    
        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Date</label>
        <div class="col-sm-10">
        <input type="date" class="form-control" name="date">
        </div>
        </div>

        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Mois</label>
        <div class="col-sm-10">
            <select class="select" name="mois">
                    <option value=""></option>
                    <option value="Janvier">Janvier</option>
                    <option value="Février">Février</option>
                    <option value="Mars">Mars</option>
                    <option value="Avril">Avril</option>
                    <option value="Mai">Mai</option>
                    <option value="Juin">Juin</option>
                    <option value="Juillet">Juillet</option>
                    <option value="Août">Août</option>
                    <option value="Septembre">Septembre</option>
                    <option value="Octobre">Octobre</option>
                    <option value="Novembre">Novembre</option>
                    <option value="Decembre">Decembre</option>
            </select>
        </div>
        </div>

        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Motif</label>
        <div class="col-sm-10">
        <select class="select" name="motif">
                <option value=""></option>
                <option value="inscription">Inscription</option>
                <option value="mensualité">Mensualité</option>
                </select>
        </div>
        </div>

        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Montant</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="montant">
        </div>
        </div>

        <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Matricule</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="matricule" value="<?php echo $matricule ?>">
        </div>
        </div>

              

         <!-- Submit button -->
            <input type="submit" name="submit" id="button" class="btn btn-primary btn-block" value="Enregistrer">
            <button type="reset" class="btn btn-secondary btn-block">Annuler</button>

    </form>
   </div>
    

    




    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
    ></script>
</body>
</html>